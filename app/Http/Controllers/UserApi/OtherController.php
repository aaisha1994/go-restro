<?php

namespace App\Http\Controllers\UserApi;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Coupon;
use App\Models\DealDay;
use App\Models\Facility;
use App\Models\Passport;
use App\Models\Promotion;
use App\Models\ReferEarn;
use App\Models\Restaurant;
use App\Models\Restro;
use App\Models\RestroCategory;
use App\Models\RestroFacility;
use App\Models\RestroImage;
use App\Models\User;
use App\Models\UserCoupon;
use App\Models\Wallet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OtherController extends Controller
{
    public function dashboard(Request $request) {
        try {
            $User = Auth::guard('userapi')->user();
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $Promotion = Promotion::where('status',1)->where('start_date','<=', date('Y-m-d'))->where('end_date','>=', date('Y-m-d'))->get();
            $DealDay = DealDay::where('status',1)->where('date', date('Y-m-d'))->get();
            $Category = Category::where('status', 1)->get();
            $near = DB::select("SELECT
                r.*, round(3959 * acos(cos(radians(?)) * cos(radians(r.latitude)) * cos(radians(r.longitude) - radians(?)) + sin(radians(?)) * sin(radians(r.latitude))),2) AS distance,
                ifnull((select f.id from favorites f where f.restro_id=r.id and f.user_id=?),0) as favorite
                from restaurants r
                where deleted_at is null
                and r.status=1 and r.admin_status=1
                HAVING distance < 28
                order by distance;", [$latitude, $longitude, $latitude, $User->id]);
            $assoc_arr = [];
            foreach ($near as $key => $value) {
                $assoc_arr[] = $value->id;
            }
            $trending = Restaurant::whereIn('restaurants.id',$assoc_arr)->leftjoin('favorites', function($join) use($User)
            {
                $join->on('favorites.restro_id', '=', 'restaurants.id');
                $join->on('favorites.user_id', '=', DB::raw($User->id));
            })
            ->where('restaurants.status',1)->where('restaurants.admin_status',1)->where('restaurants.top_restro', 1)->take(5)
            ->select('restaurants.*',DB::raw('ifnull(favorites.id,0) as favorite'))->get();
            return response()->json(['success' => true, 'data' => ['result' => $Promotion, 'DealDay' => $DealDay, 'Category'=> $Category, 'NearBy' => $near, 'Trending'=> $trending, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Advertisement() {
        try {
            $Advertisement = Advertisement::where('status',1)->get();
            return response()->json(['success' => true, 'data' => ['result' => $Advertisement, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function restro(Request $request) {
        try {
            $User = Auth::guard('userapi')->user();
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $query = '';
            if($request->has('name')) {
                $query .= ' and r.name like "%'. $request->name .'%"';
            }
            if($request->has('new_arrivals')) {
                $query .= " and r.created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
            }
            if($request->has('pure_veg')) {
                $query .= " and r.meal_preference='$request->pure_veg'";
            }
            // if($request->has('lunch_special')) {
            //     $query .= " and r.meal_preference='. $request->name .'";
            // }
            if($request->has('cuisine')) {
                $query .= " and r.id IN (select rc.restro_id from restro_categories rc where rc.category_id IN (". $request->cuisine .") GROUP BY rc.restro_id)";
            }
            if($request->has('facilities')) {
                $query .= " and r.id IN (select rc.restro_id from restro_facilities rc where rc.facility_id IN (". $request->facilities .") GROUP BY rc.restro_id)";
            }
            // dd($query);
            $Restro = DB::select("SELECT
            r.*, round(3959 * acos(cos(radians(?)) * cos(radians(r.latitude)) * cos(radians(r.longitude) - radians(?)) + sin(radians(?)) * sin(radians(r.latitude))),2) AS distance,
            ifnull((select f.id from favorites f where f.restro_id=r.id and f.user_id=?),0) as favorite,
            ifnull((select count(t.id) from transactions t where t.restro_id=r.id and t.tr_type=1 and t.status=1),0) as soldout
            from restaurants r
            where r.deleted_at is null
            and r.status=1 and r.admin_status=1
            $query
            HAVING distance < 50
            order by distance;", [$latitude, $longitude, $latitude, $User->id]);
            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function restroview($id) {
        try {
            $User = Auth::guard('userapi')->user();
            $Restro = Restaurant::find($id);
            $MyPassport = [];
            $Pass = Passport::where('restro_id', $id)->where('user_id', $User->id)->where('status',1)->first();
            $PassportStatus = 0;
            $PurchaseStatus = 0;
            if($Pass) {
                $MyPassport = UserCoupon::with('Coupon')->where('user_id', $User->id)->where('passport_id', $id)->where('status','<>',2)->get();
                $co = UserCoupon::where('passport_id', $Pass->id)->whereNull('gift_id')->where('status', 1)->first();
                if($co) {
                    $PurchaseStatus = 0;
                } else {
                    $PurchaseStatus = 1;
                }
                $PassportStatus = 1;
            }
            $Category = RestroCategory::with('Category')->where('restro_id', $id)->get();
            $Facility = RestroFacility::with('Facility')->where('restro_id', $id)->get();
            $Images = RestroImage::where('restro_id', $id)->where('status', 1)->get();
            $Passport = Coupon::where('restro_id', $id)->where('status', 1)->get();
            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'User'=> $User, 'Category'=> $Category, 'Facility'=> $Facility, 'Images'=> $Images, 'Passport' => $Passport, 'PurchaseStatus'=> $PurchaseStatus, 'PassportStatus'=> $PassportStatus,'MyPassport'=> $MyPassport, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function nearby(Request $request) {
        try {
            $latitude = $request->latitude;
            $longitude = $request->longitude;

            $showResult = DB::select("SELECT
            `restaurants`.*, round(3959 * acos(cos(radians(?)) * cos(radians(restaurants.latitude)) * cos(radians(restaurants.longitude) - radians(?)) + sin(radians(?)) * sin(radians(restaurants.latitude))),2) AS distance from `restaurants`
            where deleted_at is null
            HAVING distance < 28
            order by distance;", [$latitude, $longitude, $latitude]);
            return response()->json(['success' => true, 'data' => ['result' => $showResult, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function AllRestro() {
        try {
            $showResult = Restaurant::where('status', 1)->where('admin_status', 1)->get();
            return response()->json(['success' => true, 'data' => ['result' => $showResult, 'message' => 'successfully.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function DeleteAccount() {
        try {
            $User = Auth::guard('userapi')->user();
            User::find($User->id)->delete();
            return response()->json(['success' => true, 'data' => ['result' => [], 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function wallet() {
        try {
            $User = Auth::guard('userapi')->user()->wallet;
            $refPerUser = ReferEarn::find(1);
            return response()->json(['success' => true, 'data' => ['wallet' => $User, 'refPerUser'=>$refPerUser, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function earningList() {
        try {
            $User = Auth::guard('userapi')->user();
            $Wallet = Wallet::where('user_id', $User->id)->whereNull('affiliate_id')->orderBy('id','desc')->get();
            return response()->json(['success' => true, 'data' => ['wallet' => $Wallet, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Category()
    {
        try {
            $category = Category::all();
            return response()->json(['success' => true, 'data' => ['result' => $category, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Facility()
    {
        try {
            $facility = Facility::all();
            return response()->json(['success' => true, 'data' => ['result' => $facility, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function ContactUs()
    {
        try {
            $facility = ContactUs::all();
            return response()->json(['success' => true, 'data' => ['result' => $facility, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }
}
