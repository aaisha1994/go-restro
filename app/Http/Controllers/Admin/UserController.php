<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Passport;
use App\Models\User;
use App\Models\UserCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users', Auth::guard('admin')->user()->role_details)) {
            $Users = User::orderBy('id', 'desc')->get();
            return view('Admin.user.index', compact('Users'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function create()
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users', Auth::guard('admin')->user()->role_details)) {
            return view('Admin.user.create');
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'mobile' => 'required|digits:10',
        ],[
            'name' => 'Name field is required.',
            'mobile' => 'Mobile field is required.',
            'email.required' => 'Email field is required.',
        ]);

        $randomString = Str::random(7);
        $ref_code = strtoupper('GR'. $randomString);
        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->mobile = $request->mobile;
        $User->date_of_birth = $request->date_of_birth;
        $User->other_date = [$request->other_date];
        $User->ref_code = $ref_code;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/user', $filename);
            $User->image = $filename;
        }
        // dd($User);
        $User->save();

        return redirect(route('admin.user.index'))->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users', Auth::guard('admin')->user()->role_details)) {
            $User = User::findOrFail($id);
            return view('Admin.user.edit', compact('User'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function view($id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users', Auth::guard('admin')->user()->role_details)) {
            $User = User::findOrFail($id);
            $UserRestro = Passport::where('user_id', $id)->where('status', 1)->get();
            $UserCoupons = UserCoupon::where('user_id', $User->id)->where('status','<>',2)->get();
            return view('Admin.user.view', compact('User','UserRestro','UserCoupons'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function update(Request $request, $id)
    {
        $User = User::findOrFail($id);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->mobile = $request->mobile;
        $User->date_of_birth = $request->date_of_birth;
        $User->other_date = [$request->other_date];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/user', $filename);
            $User->image = $filename;
        }
        $User->save();
        return redirect(route('admin.user.index'))->with('success', 'User Updated successfully');
    }

    public function destroy($id)
    {
        $User = User::findOrFail($id);
        if ($User) {
            $User->delete();
            return response(['status' => true, 'message' => 'User deleted successfully']);
        } else {
            return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
        }
    }

    public function status($id)
    {
        $User = User::findOrFail($id);
        if ($User) {
            if($User->status == 1){
                $User->update(['status'=> 2]);
                $status = 'Deactive';
            } else{
                $User->update(['status'=> 1]);
                $status = 'Active';
            }
            return response(['status' => true, 'message' => 'Status '.$status.' successfully']);
        }
        return response(['status' => false, 'message' => 'somthing went wrong please try again letter']);
    }
    public function filter(Request $request, $id)
    {
        if(Auth::guard('admin')->user()->is_admin == 1 || in_array('Users', Auth::guard('admin')->user()->role_details)) {
            $UserCoupons = UserCoupon::where('user_id', $id);
            if($request->status != 0) {
                if($request->status == 1) {
                    $UserCoupons = $UserCoupons->where('status', 0);
                }
                if($request->status == 2) {
                    $UserCoupons = $UserCoupons->where('status', 1);
                }
                if($request->status == 3) {
                    $UserCoupons = $UserCoupons->where('end_date','<', date('Y-m-d'));
                }
            }
            if($request->restro_id != 0) {
                $Passport = Passport::where('restro_id', $request->restro_id)->where('user_id', $id)->where('status', 1)->first();
                $UserCoupons = $UserCoupons->where('passport_id', $Passport->id);
            }
            $UserCoupons = $UserCoupons->where('status','<>',2)->orderBy('id', 'desc')->get();
            return view('Admin.user.filter', compact('UserCoupons'));
        } else{
            return redirect()->back()->with('error', 'Permission denied');
        }
    }

    public function export() {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
