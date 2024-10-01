<?php

use App\Models\Category;
use App\Models\Facility;
use App\Models\Fcm;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;


function Category()
{
    $parentArr = Category::where('status', 1)->get();
    return $parentArr;
}

function Facility()
{
    $parentArr = Facility::where('status', 1)->get();
    return $parentArr;
}

function sendNotification($UserId, $type, $body)
{
    if($type == 1) { // Restro
        $user_id = 'restro_id';
    } else if($type == 2) { // Affiliate
        $user_id = 'affiliate_id';
    } else if($type == 3) { // Admin
        $user_id = 'admin_id';
    } else if($type == 4) { // User
        $user_id = 'user_id';
    }
    $firebaseToken = Fcm::where($user_id, $UserId)->whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
    if(!empty($firebaseToken)){
        $SERVER_API_KEY = env('FCM_SERVER_KEY');
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => config('app.name'),
                "body" => $body,
            ]
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);

        // dd($response);
    }
}

function sendWhatsapp($to, $recipient_type, $template_name, $language_code, $parameters)
{
    // $to = "9510261450";
    // $recipient_type = "individual";
    // $template_name = "otp";
    // $language_code = "en";

    $data = [
        "to" => $to,
        "recipient_type" => $recipient_type,
        "type" => "template",
        "template" => [
            "language" => [
                "policy" => "deterministic",
                "code" => $language_code
            ],
            "name" => $template_name,
            "components" => $parameters
        ]
    ];

    $json_data = json_encode($data);

    $curl = curl_init();
    $WHATSAPP_SERVER_KEY = env('WHATSAPP_SERVER_KEY');

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crm.officialwa.com/api/meta/v19.0/273290265877775/messages',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $json_data,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '. $WHATSAPP_SERVER_KEY
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    // echo $response;
}
