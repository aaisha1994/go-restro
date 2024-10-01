<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QrGenerate;
use App\Models\QrGenerateBunch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('QR Management', Auth::guard('admin')->user()->role_details)) {
            $QrGenerates = QrGenerateBunch::orderBy('id', 'desc')->get();
            return view('Admin.qr.index', compact('QrGenerates'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('QR Management', Auth::guard('admin')->user()->role_details)) {
            return view('Admin.qr.create');
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
        ],[
            'quantity' => 'Quantity field is required.',
        ]);

        $QrGenerateBunch = QrGenerateBunch::create([
            'quantity' => $request->quantity,
            'status' => 1
        ]);

        for ($i=0; $i < $request->quantity; $i++) {
            $randomString = Str::random(7);
            $qr_code = strtoupper('GR'. $randomString);

            $QrGenerate = new QrGenerate();
            $QrGenerate->qr_bunch_id = $QrGenerateBunch->id;
            $QrGenerate->qr_code = $qr_code;
            $QrGenerate->type = 0;
            $QrGenerate->status = 0;
            $QrGenerate->save();
        }
        return redirect(route('admin.qr.index'))->with('success', 'QR Generate created successfully');
    }

    public function view($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('QR Management', Auth::guard('admin')->user()->role_details)) {
            // $foregroundColors = ['#FF0000', '#00FF00', '#0000FF'];
            $foregroundColors = sscanf('#ED6D55', "#%02x%02x%02x");
            $backgroundColors = sscanf('#425969', "#%02x%02x%02x");

            // Generate QR code
            // $qrCode = QrCode::format('png')
            // ->merge(public_path('assets/images/logo-sm-dark.png'), 0.5, true)
            // ->size(200)
            // ->errorCorrection('H')
            // ->generate('SDFJISWE');
            // $qrCode = QrCode::size(200)
            // ->format('png')
            // ->merge(public_path('assets/images/logo-sm-dark.png'), 0.5, true)
            // ->errorCorrection('H')
            // ->generate('SDFJISWE');
            // dd($qrCode);


            $path = public_path('assets/images/logo-sm-dark.png');

            $from = [66, 89, 105];
            $to = [237, 109, 85];

            // return QrCode::size(200)->style('square')->eye('circle')->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'inverse_diagonal')->margin(1)->generate('sdfg');
            $QrGenerateBunch = QrGenerateBunch::find($id);
            $QrGenerate = QrGenerate::where('qr_bunch_id', $id)->get();
            return view('Admin.qr.view', compact('QrGenerate','QrGenerateBunch', 'from', 'to', 'path'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }
}
