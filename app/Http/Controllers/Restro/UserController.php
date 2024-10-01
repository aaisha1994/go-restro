<?php

namespace App\Http\Controllers\Restro;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Restro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $Restro = Auth::guard('restro')->user();
        $Users = DB::select("SELECT u.id, u.name, u.email, u.mobile, u.expire_date,
        (select t.start_date from transactions t where t.user_id=u.id and t.restro_id=$Restro->restro_id and t.status=1 and t.tr_type=1 order by t.id desc limit 1) as purchase_date
        from users u
        where u.id in(
            select p.user_id from passports p where p.restro_id=$Restro->restro_id group by p.user_id
        )");
        $Restaurant = Restaurant::find($Restro->restro_id);
        return view('Restro.user.index', compact('Users','Restaurant'));
    }

    // Staff
    public function user(){
        $Restro = Auth::guard('restro')->user();
        if($Restro->is_admin == 1) {
            $Restros = Restro::where('restro_id', $Restro->restro_id)->where('is_admin', 2)->get();
        } else {
            $Restros = [];
        }
        return view('Restro.profile.user', compact('Restros','Restro'));
    }

    public function userstore(Request $request)
    {
        $Restro = Auth::guard('restro')->user();
        if($Restro->Restaurant->staff_allocation == 1 && $Restro->Restaurant->subscription_status == 1) {
            $validator = Validator::make($request->all(),[
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:restros,email'],
                'mobile' => ['required', 'numeric', 'unique:restros,mobile'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return redirect(route('restro.profile.user'))->with('error', $messages);
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
            return redirect(route('restro.profile.user'))->with('success', 'Restro Staff created successfully');
        } else {
            return redirect()->back()->with('error', 'You can not use this features without subscription, Please subscribe your restaurant');
        }
    }

    public function useredit($id) {
        $Restro = Restro::findOrFail($id);
        return response(['status' => true, 'data'=> $Restro, 'message' => 'success']);
    }

    public function userupdate(Request $request, $id)
    {
        $Restro = Restro::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
        ]);
        if($validator->fails()){
            $messages = $validator->getMessageBag();
            return redirect(route('restro.profile.user'))->with('error', $messages);
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

        return redirect(route('restro.profile.user'))->with('success', 'Restro Staff updated successfully');
    }

    public function userdelete($id)
    {
        $Restro = Restro::findOrFail($id);
        if ($Restro) {
            $Restro->delete();
            return response(['status' => true, 'message' => 'Staff deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }
}
