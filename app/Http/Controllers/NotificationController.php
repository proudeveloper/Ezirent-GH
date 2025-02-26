<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NotificationController extends Controller
{


    // public function sendOTP($message, $recipients)
    // {
    //     $sender_id = config('services.hubtel.sender_id');
    //     $client_id = config('services.hubtel.client_id');
    //     $client_secret = config('services.hubtel.client_secret');
    //     $auth_token = config('services.hubtel.auth_token');

    //     $client = new Client(['verify' => false]);

    //     $url = "https://sms.hubtel.com/v1/messages/send";
    //     $payload = [
    //         'clientid' => $client_id,
    //         'clientsecret' => $client_secret,
    //         'from' => $sender_id,
    //         'to' => $recipients,
    //         'content' => $message,
    //     ];

    //     try {
    //         $response = $client->request('POST', $url, [
    //             'headers' => [
    //                 'Authorization' => 'Basic ' . $auth_token,
    //                 'Content-Type' => 'application/json',
    //             ],
    //             'json' => $payload,
    //         ]);

    //         $body = json_decode($response->getBody(), true);

    //         // Log the response
    //         Log::info("Hubtel SMS sent to $recipients", ['response' => $body]);

    //         return $body;
    //     } catch (\Exception $e) {
    //         // Log error
    //         Log::error('Hubtel SMS sending failed', ['error' => $e->getMessage()]);
    //         return false;
    //     }
    // }


    public function sendOTP($message, $recipients)
    {
        $sender_id = config('services.hubtel.sender_id');
        $client_id = config('services.hubtel.client_id');
        $client_secret = config('services.hubtel.client_secret');
        $auth_token = config('services.hubtel.auth_token');

        $client = new Client(['verify' => false]);

        $url = "https://sms.hubtel.com/v1/messages/send";
        $queryParams = [
            'clientsecret' => $client_secret,
            'clientid' => $client_id,
            'from' => $sender_id,
            'to' => $recipients,
            'content' => $message,
        ];

        try {
            $response = $client->request('GET', $url, [
                'headers' => [
                    'Authorization' => 'Basic ' . $auth_token,
                ],
                'query' => $queryParams,
            ]);

            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // public function sendOTP($message, $recipients)
    // {
    //     $sender_id = config('services.hubtel.sender_id');
    //     $client_id = config('services.hubtel.client_id');
    //     $client_secret = config('services.hubtel.client_secret');

    //     $connected = @fsockopen("www.example.com", 80);
    //     if ($connected) {
    //         fclose($connected);
    //         return Http::retry(2, 10)->get("https://sms.hubtel.com/v1/messages/send?clientsecret=$client_secret&clientid=$client_id&from=$sender_id&to=$recipients&content=$message");
    //     } else {
    //         return back()->with('error', 'SMS not sent. Check internet connection');
    //     }
    // }



    function connected()
    {
        $connected = @fsockopen("www.example.com", 80);
        //website, port  (try 80 or 443)
        if ($connected) {
            $is_conn = true; //action when connected
            fclose($connected);
        } else {
            $is_conn = false; //action in connection failure
        }
        return $is_conn;
    }
}
