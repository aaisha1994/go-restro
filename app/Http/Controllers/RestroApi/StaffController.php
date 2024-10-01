<?php

namespace App\Http\Controllers\RestroApi;

use App\Http\Controllers\Controller;
use App\Models\Restro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index()
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $Restro = Restro::where('restro_id', $Restro->restro_id)->where('is_admin','<>', 1)->get();
            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function store(Request $request)
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $validator = Validator::make($request->all(),[
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:restros,email'],
                'mobile' => ['required', 'numeric', 'unique:restros,mobile'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $Restros = new Restro();
            $Restros->restro_id = $Restro->restro_id;
            $Restros->name = $request->name;
            $Restros->email = $request->email;
            $Restros->mobile = $request->mobile;
            $Restros->role = $request->role;
            $Restros->is_admin = 2;
            $Restros->status = 1;
            $Restros->password = Hash::make($request->password);

            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/staff', $filename);
                $Restros->image = $filename;
            }
            $Restros->save();
            return response()->json(['success' => true, 'data' => ['result' => $Restros, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function view($id)
    {
        try {
            $Restro = Restro::findOrFail($id);
            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $Restro = Restro::findOrFail($id);
            $validator = Validator::make($request->all(),[
                'name' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $Restro->name = $request->name;
            $Restro->email = $request->email;
            $Restro->mobile = $request->mobile;
            $Restro->role = $request->role;

            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/staff', $filename);
                $Restro->image = $filename;
            }
            $Restro->save();
            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function destroy($id)
    {
        $Restro = Restro::findOrFail($id);
        if ($Restro) {
            $Restro->delete();
            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'Restro Staff Deleted successfully.']], 200);
        } else {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => 'Staff not found']], 422);
        }
    }
}
