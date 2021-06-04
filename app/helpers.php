<?php

///////////// active menu function //////////////
if(! function_exists('active_menu'))
{
    function active_menu($link)
    {
        if(preg_match('/' .$link. '/', Request::segment(2)))
        {
            return ['active', 'display:block'];
        }else
        {
            return ['', '' ];
        }

    }
}


///////// SMS Misr Function /////////

///////////// active menu function //////////////
if(! function_exists('smsMisr'))
{
    function smsMisr($to, $message)
    {
        $url = 'https://smsmisr.com/api/webapi/?';

        $push_payload = array(

            "username"  => "1orqyQb7",
            "password"  => "VVZjItxj0i",
            "language"  => "2",
            "sender"    => "Developer",
            "mobile"    => "2" . $to,
            "message"    => $message,

        );

        $rest = curl_init();

        curl_setopt( $rest, CURLOPT_URL, $url.http_build_query( $push_payload ));
        curl_setopt( $rest, CURLOPT_POST, 1);
        curl_setopt( $rest, CURLOPT_POSTFIELDS, $push_payload);
        curl_setopt( $rest, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt( $rest, CURLOPT_HTTPHEADER,

            array(

                "Content-Type"  => "application/x-www-from-urlencoded"
            ));

        curl_setopt( $rest, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($rest);

        curl_close($rest);

        return $response;
    }
}



////////////////////////////////

function smsV($to, $mes)
{
    $basic  = new \Vonage\Client\Credentials\Basic("cf4b91bc", "85eiw73PuM632q0G");
    $client = new \Vonage\Client($basic);

    $response = $client->sms()->send(
        new \Vonage\SMS\Message\SMS($to, BRAND_NAME, $mes)
    );

    $message = $response->current();

    if ($message->getStatus() == 0) {
        echo "The message was sent successfully\n";
    } else {
        echo "The message failed with status: " . $message->getStatus() . "\n";
    }
}
