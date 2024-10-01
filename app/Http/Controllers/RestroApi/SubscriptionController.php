<?php

namespace App\Http\Controllers\RestroApi;

use App\Http\Controllers\Controller;
use App\Models\ReferEarn;
use App\Models\Restaurant;
use App\Models\RestroSubcription;
use App\Models\Transaction;
use App\Models\Wallet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function subscription()
    {
        $Subcriptions = RestroSubcription::where('status', 1)->get();
        return response()->json(['success' => true, 'data' => ['result' => $Subcriptions, 'message' => 'success.']], 200);
    }

    public function mysubscription() {

        $Restro = Auth::guard('restroapi')->user();
        $Restaurant = Restaurant::find($Restro->restro_id);
        if($Restaurant->subscription_status == 1) {
            $Transactions = Transaction::with(['RestroSubscription'])->where('status', 1)->where('tr_type', 3)->where('restro_id', $Restro->restro_id)->orderBy('id', 'desc')->first();
        } else{
            $Transactions = [];
        }
        return response()->json(['success' => true, 'data' => ['result' => $Transactions, 'message' => 'success.']], 200);
    }

    public function purchasehistory()
    {
        $Restro = Auth::guard('restroapi')->user();
        $result = Transaction::with(['RestroSubscription'])->where('status','<>', 0)->where('tr_type', 3)->where('restro_id', $Restro->restro_id)->orderBy('id', 'desc')->get();
        return response()->json(['success' => true, 'data' => ['result' => $result, 'message' => 'success.']], 200);
    }

    public function wallethistory()
    {
        $Restro = Auth::guard('restroapi')->user();
        $Wallets = Wallet::where('restro_id', $Restro->restro_id)->where('type', 1)->where('status', 1)->orderBy('id', 'desc')->get();
        return response()->json(['success' => true, 'data' => ['result' => $Wallets, 'message' => 'success.']], 200);
    }

    public function generateOrderNo(Request $request)
    {
        try {
            $User = Auth::guard('restroapi')->user();
            $type = $request->tr_type;
            $v_GroupCode = 'GR'. date('y');

            $v_StartNo1 = DB::select("SELECT
                CONCAT('$v_GroupCode', LPAD(CAST(MAX(RIGHT(order_no, 3)) + 1 AS CHAR), 3, '0')) AS MaxNumber
                FROM transactions where order_no LIKE '$v_GroupCode%'");
            $OrderNo = $v_StartNo1[0]->MaxNumber != null ? $v_StartNo1[0]->MaxNumber : 0;
            if($v_StartNo1[0]->MaxNumber == null){
                $OrderNo = $v_GroupCode.'0001';
            }
            // $OrderNo = 'GR240001';
            $Transaction = Transaction::create([
                'restro_id' => $User->restro_id,
                'order_no' => $OrderNo,
                'amount' => $request->amount,
                'tr_type' => $type,
                'status' => 0,
            ]);
            return response()->json(['success' => true, 'data' => ['result' => $Transaction, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function subscribe(Request $request)
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $validator = Validator::make($request->all(),[
                'subscription_id' => ['required'],
                'order_no' => ['required'],
                'amount' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }
            $Subscription = RestroSubcription::find($request->subscription_id);
            $startdate = date('y-m-d');
            $enddate = date('Y-m-d', strtotime("+365 day", strtotime($startdate)));
            Transaction::find($request->id)->update([
                'restro_id' => $Restro->restro_id,
                'restro_subcription_id' => $request->subscription_id,
                'transaction_id' => $request->transaction_id ?? null,
                'order_no' => $request->order_no,
                'amount' => $request->amount,
                'tr_type' => 3,
                'status' => $request->status,
                'start_date' => $startdate,
                'end_date' => $enddate
            ]);
            if($request->status == 1){

                $Restaurant = Restaurant::find($Restro->restro_id);
                if($Subscription->compliment_coin == 1) {
                    $Restaurant->gr_coin = $Restaurant->gr_coin + $Subscription->gr_coin;
                }
                $Restaurant->subscription_status = 1;
                $Restaurant->expire_date = $enddate;
                $Restaurant->gift_send = $Subscription->gift_send;
                $Restaurant->event_details = $Subscription->event_details;
                $Restaurant->compliment_coin = $Subscription->compliment_coin;
                $Restaurant->staff_allocation = $Subscription->staff_allocation;
                $Restaurant->save();

                Wallet::create([
                    'restro_id' => $Restro->restro_id,
                    'amount'  => $Subscription->gr_coin,
                    'status' => 1,
                    'type' => 1
                ]);
            }
            $Restaurant = Restaurant::find($Restro->restro_id);

            // Whatsapp
            if($request->status == 1){
                $to = $Restaurant->mobile;
                $recipient_type = "individual";
                $template_name = "membership";
                $language_code = "en_US";
                $parameters = [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $Restaurant->name],
                            ["type" => "text", "text" => $Subscription->name],
                        ]
                    ]
                ];
                sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters);
            }
            // End Whatsapp
            return response()->json(['success' => true, 'data' => ['result' => $Restaurant, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function wallet() {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $Restaraunt = Restaurant::find($Restro->restro_id);
            $User = $Restaraunt->gr_coin;
            $refPerUser = ReferEarn::find(1);
            return response()->json(['success' => true, 'data' => ['wallet' => $User, 'refPerUser'=>$refPerUser, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function addcoin(Request $request)
    {
        try {
            $Restro = Auth::guard('restroapi')->user();
            $Refer = ReferEarn::first();
            $validator = Validator::make($request->all(),[
                'restro_id' => ['required'],
                'order_no' => ['required'],
                'amount' => ['required'],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }
            $coin = round($request->amount / $Refer->value_of_coin);
            Transaction::create([
                'restro_id' => $Restro->restro_id,
                'order_no' => $request->order_no,
                'transaction_id' => $request->transaction_id ?? null,
                'amount' => $request->amount,
                'tr_type' => 4,
                'gr_coin' => $coin,
                'status' => $request->status,
            ]);
            if($request->status == 1){
                $Us = Restaurant::find($Restro->restro_id);
                $Wallet = $Us->gr_coin;
                $Wallet = $Wallet + $coin;

                Wallet::create([
                    'restro_id' => $Us->id,
                    'amount'  => $request->amount,
                    'status' => 1,
                    'coin' => $coin,
                    'type' => 1
                ]);
                $Us->gr_coin = $Wallet;
                $Us->save();
            }
            $Restro = Restaurant::find($request->restro_id);

            return response()->json(['success' => true, 'data' => ['result' => $Restro, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

}
