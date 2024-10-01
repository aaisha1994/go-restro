<?php

namespace App\Http\Controllers\RestroApi;

use App\Http\Controllers\Controller;
use App\Models\QrGenerate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QrController extends Controller
{
    public function QrList() {
        $Restro = Auth::guard('restroapi')->user();
        $QrGenerate = QrGenerate::where('restro_id', $Restro->restro_id)->where('status', 1)->get();
        return response()->json(['success' => true, 'data' => ['result' => $QrGenerate, 'message' => 'success.']], 200);
    }

    public function LinkQr(Request $request) {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $validator = Validator::make($request->all(),[
                'qr_code' => ['required'],
                'type' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }
            $QrGenerate = QrGenerate::where('qr_code', $request->qr_code)->first();
            if($QrGenerate) {
                if($QrGenerate->status == 1) {
                    return response()->json(['success' => false, 'error' => ['message' => 'This QR already link']], 422);
                } else {
                    QrGenerate::where('restro_id', $Restro->restro_id)->where('type', $request->type)->update(['status' => 2]);
                    $QrGenerate->restro_id = $Restro->restro_id;
                    $QrGenerate->type = $request->type;
                    $QrGenerate->status = 1;
                    $QrGenerate->save();
                }
                return response()->json(['success' => true, 'data' => ['result' => $QrGenerate, 'message' => 'success.']], 200);
            } else {
                return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Invalid QR Code']], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }
}
