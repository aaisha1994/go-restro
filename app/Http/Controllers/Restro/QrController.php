<?php

namespace App\Http\Controllers\Restro;

use App\Http\Controllers\Controller;
use App\Models\QrGenerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QrController extends Controller
{
    public function reedem() {
        $Restro = Auth::guard('restro')->user();
        $QrGenerate = QrGenerate::where('restro_id' ,$Restro->restro_id)->where('type', 1)->where('status', 1)->first();
        $path = public_path('assets/images/logo-sm-dark.png');

        $from = [66, 89, 105];
        $to = [237, 109, 85];
        return view('Restro.qr.reedem',compact('QrGenerate','path','from','to'));
    }

    public function invite() {
        $Restro = Auth::guard('restro')->user();
        $QrGenerate = QrGenerate::where('restro_id' ,$Restro->restro_id)->where('type', 1)->where('status', 1)->first();
        $path = public_path('assets/images/logo-sm-dark.png');

        $from = [66, 89, 105];
        $to = [237, 109, 85];
        return view('Restro.qr.invite',compact('QrGenerate', 'path','from','to'));
    }

    public function qrlink(Request $request)
    {
        $Restro = Auth::guard('restro')->user();
        $validator = Validator::make($request->all(),[
            'qr_code' => ['required'],
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error', 'QR Code is required');
        }

        $QrGenerate = QrGenerate::where('qr_code', $request->qr_code)->first();
        if($QrGenerate) {
            if($QrGenerate->status == 1) {
                return redirect()->back()->with('error', 'This QR already link');
            } else {
                QrGenerate::where('restro_id', $Restro->restro_id)->where('type', $request->type)->update(['status' => 2]);
                $QrGenerate->restro_id = $Restro->restro_id;
                $QrGenerate->type = $request->type;
                $QrGenerate->status = 1;
                $QrGenerate->save();
            }

            return redirect()->back()->with('success', 'QR Code link successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid QR Code');
        }
    }
}
