<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EziETransactionsController extends Controller
{
    //
    public function getCheckOutPayment(Request $request)
    {
        
        $sessionParams = ['error' => 'Transaction cancelled.', 'success' => 'Payment successfull'];

        $confirmUrl = url('admin/settings', session(['success' => 'Payment successfull']));

        // $cancelUrl = redirect('admin/settings')->with('error', 'Transaction cancelled.');


        $cancelUrl = url('admin/settings', session(['error' => 'Transaction cancelled.']));

        // dd($cancelUrl);
     
        $response = $this->makePayment(50.0, 'EzirentGH Checkout', $confirmUrl, $cancelUrl);

        // print_r($array); // Output: Array ( [fruits] => Array ( [0] => apple [1] => banana [2] => orange ) )
                
                
        $url = $response['data']['checkoutDirectUrl'];
        $segments = explode('/', $url);
        array_pop($segments);
        $new_url = implode('/', $segments) . '/';
        
        // dd($response);
        // // Handle the response
        if ($response['status'] == 'Success') {
            $data = $response;
            // Do something with the $data
            // dd($data);
               
            // $request->session()->flush('success', 'Task was successful!');
            
            // $request->session()->flush('error', 'Task was successful!');


            return redirect($new_url);
        } else {
            // Handle errors
            // dd($response);
               
            $request->session()->flush('success', 'Task was successful!');
    
            $request->session()->flush('error', 'Task was successful!');

            return redirect()->back()->with('error', 'Failed transaction, try again.');
        }
        
        // Redirect with success message
        return redirect()->back()->with('success', 'Post created successfully!');
    }
    // responseCode

    private function makePayment($total_amount, $descrption, $confirmUrl, $cancelUrl, ) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://payproxyapi.hubtel.com/items/initiate',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
                "totalAmount": '.$total_amount.',
                "description": "'.$descrption.'",
                "callbackUrl": "https://webhook.site/861ec496-12ee-4dc0-9158-b4ae7d8dc025",
                "returnUrl": "'.$confirmUrl.'",
                "merchantAccountNumber": "2023577",
                "cancellationUrl": "'.$cancelUrl.'",
                "clientReference": "'.$this->generateRandomString(30).'"
            }',
        CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Basic RFlMTVozNjo5MTQzMzlhMTYzZmQ0YTRmYWUxZDQxMTY3YTA3OTNiOQ=='
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // dd($response);
        
        $strings = $response;
        $resp_array = json_decode($strings, true);

        return $resp_array;

    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
    
        return $randomString;
    }



    

    public function full_path()
    {
        $s = &$_SERVER;
        $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
        $sp = strtolower($s['SERVER_PROTOCOL']);
        $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
        $port = $s['SERVER_PORT'];
        $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
        $host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
        $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
        $uri = $protocol . '://' . $host . $s['REQUEST_URI'];
        $segments = explode('?', $uri, 2);
        $url = $segments[0];
        return $url;
    }


}
