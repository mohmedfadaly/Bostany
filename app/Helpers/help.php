<?php
use App\Models\Customer;
use App\Models\Social;
use carbon\carbon;
use Modules\Setting\Entities\Setting;

function NotiForTopic($title,$body,$data,$image,$topic)
{
    $fcm_server_key ='AAAAcsvkuRY:APA91bFQhRPSwsl7ZUsz8UGF0BgdfgeEGT4w9qUXow4ZfpM49EC0xFl3wfUzb9KoK1bmagpbYp4jOBA50RXGLL_FzkGjfZj_uJRDIwUEZ0t1KsMb7clfe8dHE5gQzZsKDrsV5jK5ryEJ';

    // prep the bundle
    $fields = array
    (
        'data'          => $data,
        'priority'      => 'high',
        "to"            => '/topics/'.$topic,
        'notification'  => array(
            'title'     => $title,
            'body'      => $body,
            'image'     => $image ?? ""
        )
    );
     
    $headers = array
    (
        'Authorization: key=' . $fcm_server_key,
        'Content-Type: application/json'
    );
     
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
    curl_close( $ch );
    return $result;
}

// function notiByTokenUser($title, $body, $token = null, $data, $image=null)
// {
//     $fcm_server_key = 'AAAAcLp96-U:APA91bHcJKHtNhP8plDK6PPvm8wuACU1HhjoWYLirHhnOuJwVB2ayiFLJc35McgTJhHMTc8032qxC-OCjHWQ_OU3z8YAWPycyrma78e-4yl66tcYbtFW2UTtQfMmZjiUv3uc-htsqWx9';

//     $registrationIds = $token;
    

//     // prep the bundle
//     $msg = $data;

//     $fields = array
//     (
//         'registration_ids'   => $registrationIds,
//         'data'               => $msg,
//         'priority'           => 'high',
//         'notification'       => array(
//             'title'          => $title,
//             'body'           => $body,
//             'image'          => $image ?? ""
//         )
//     );
     
//     $headers = array
//     (
//         'Authorization: key=' .$fcm_server_key,
//         'Content-Type: application/json'
//     );
     
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send'); 
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
//     $result = curl_exec($ch);
    

//     curl_close( $ch );
//     return $result;
// }

function pagination_response($data)
{
    return [
        'current_page'      => $data->currentPage(),
        'last_page'         => $data->lastPage(),
        'total'             => $data->total(),
        'next_page_url'     => $data->nextPageUrl(),
        'previous_page_url' => $data->previousPageUrl(),
    ];
}

function Socials()
{
    return [
        'phone',
        'google',
        'apple',
        'facebook',
    ];
}

function CurrentAuth()
{
    if(auth()->guard('customer')->check())
    {
        return auth()->guard('customer')->user();
    }else{
        return false;
    }
}

function CheckAuth()
{
    if(!is_null(request()->header('Authorization')))
    {
        $token = request()->header('Authorization'); 
        $token = explode(' ',$token);
        if(count( $token) == 2)
        {
            $customer = Customer::where('access_token',$token[1])->first();
            if($customer)
            {
                return $customer;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function SendMail($to,$subject,$title,$body = null,$cc = null,$bcc = null)
{
    $fromName = '7Roads';
    $from     = 'info@7roadsapp.com';
    $title    = '<h2>'.$title.'</h2>';

    $headers  = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
    $headers .= "Return-Path:".$to."\r\n";
    // if($cc !== null)
    // {
    //     $headers .= "CC: ".$cc."\r\n";
    // }
    if($bcc !== null)
    {
        $headers .= "BCC: ".$bcc."\r\n";
    }
    $socials_html = '';
    $socials = Social::get();
    foreach( $socials as  $social)
    {
        $socials_html .='<a href="'.$social->page_url.'">'.
        '<img src="'.asset('uploads/socials/'.$social->icon).'" style="width: 35px;">'.
        '</a>';
    }
    $htmlContent = ' 
    <html> 
        <head> 
            <title>7Roads</title> 
        </head> 
        <body> 
            <div style="border: 6px solid #061787;width: 90%;padding:10px;margin:auto;text-align:center"> 
                <img src="'.asset('logo.png').'" style="width:150px;margin: 15px 0 15px 0;background: #000;">'.
                '<h4 style="margin: 4px;color: #f7941c;">'.Date::parse(carbon::now())->format('h:m / Y-m-d').'</h4>'.
                '<h4 style="margin: 4px;color: #f7941c;">Welcome</h4>'.
                '<h3 style="color:#f7941c ;">'.$body.'</h3>'.

                '</p>'.
                $socials_html.
            '</div>
        </body> 
    </html>'; 

    return mail($to,$subject,$htmlContent,$headers);
}

function WeekDayes()
{
    return [
        'Saturday'  => 'السبت',
        'Sunday'    => 'الاحد',
        'Monday'    => 'الاثنين',
        'Tuesday'   => 'الثلاثاء',
        'Wednesday' => 'الأربعاء',
        'Thursday'  => 'الخميس',
        'Friday'    => 'الجمعة',
    ];
}

function Setting(){
    return  Setting::latest()->first();
}