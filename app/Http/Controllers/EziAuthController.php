<?php

namespace App\Http\Controllers;

use App\Models\Agent\EziUserModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;


class EziAuthController extends Controller
{
    //

    
    public function postOTPPage(Request $request) {

        $opt_number = $request->phone_otp;

        $paths = '';

        $digits = 4;
        $randomNum = substr(str_shuffle("0123456789"), 0, $digits);

        $user = EziUserModel::getSingleUser($opt_number);

        if (!empty($user)) {

            // $result = $this->sendMyOTPMessage("Your login code is ".$randomNum.".\n WARNING: Do not share this code with anyone.", $opt_number);

            $hhh =  "Your login OTP code is ".$randomNum.". WARNING: Do not share this code with anyone.";
            
            $variation = str_replace(" ", "+", $hhh);
            $result = $this->hubtelSendOTPMessage($variation, $opt_number);
            $selected_item = json_decode($result, true);

            // dd($selected_item);

            if (!empty($selected_item)) {
                    
                if ($selected_item['status'] == 0) {
                    
                    $user->otp_code = $randomNum;
                    $user->update();
                    
                    
                    $data['title'] = 'Login';
                    $data['success'] = $selected_item['status'] == 0 ? 'success' : 'error';
                    $data['message'] = $selected_item['statusDescription'];
                    $data['otp_number'] = $opt_number;

                    return view('login.otp_auth', $data);
                } else {
                    
                    $notification = array(
                        'title' => 'Login',
                        'message' => $selected_item['statusDescription'],
                        'alert-type' => $selected_item['status'] == 0 ? 'success' : 'danger',
                        'icon' => 'alert'
                    );

                    return redirect()->back()->with($notification);

                }
                
            } else {
                                    
                $notification = array(
                    'title' => 'Login',
                    'message' => 'Server is down. Please check your internet connection or system Admin.',
                    'alert-type' => 'danger',
                    'icon' => 'alert'
                );

                ###############################################################################################################################################################
                ###############################################################################################################################################################
                ##################################################      COMMENT OUT THIS SECTION WHEN INTERNET IS BACK ON       ##########s#####################################

                //     $data['title'] = 'Login';
                //     $data['success'] = 'success';
                //     $data['message'] = 'Great work done.';
                //     $data['otp_number'] = $opt_number;

                // return view('login.otp_auth', $data);
                ################################################################################################################################################################
                return redirect()->back()->with($notification);

            }
            

        } else {

            $data['title'] = 'Login';
            $data['success'] = 'success';
            $data['otp_number'] = $request->phone_otp;

            // return view('login.otp_auth', $data);
            $notification = array(
                'title' => 'Login',
                'message' => "User does not exist. Please register with a vailid phone number.",
                'alert-type' => 'danger',
                'page' => 'exists',
                'icon' => 'alert'
            );

            return redirect()->back()->with($notification);
        }
        
    }


    public function postRegisterOTPNumber(Request $request) {
        // dd($request->all());

        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $email = $request->email;
        $user_type = $request->user_type;
        $opt_number = $request->register_otp;

        // $data['title'] = 'Register';
        // $data['success'] = 'success';
        // $data['otp_number'] = $opt_number;

        // $randToken = Str::random(50);
        $digits = 4;
        $randomNum = substr(str_shuffle("0123456789"), 0, $digits);

        $db_user = EziUserModel::getSingleUser($opt_number);
        $email_user = EziUserModel::getSingleUserByEmail($email);

        $h_pass = Hash::make('ezirent');

        if (empty($db_user)) {

            $user_model    = new EziUserModel();

            if (!empty($email_user)) {
                $notification = array(
                    'title' => 'Registration',
                    'message' => "User email already exist. Please register with a new vailid phone number.",
                    'alert-type' => 'danger',
                    'icon' => 'alert'
                );
    
                return redirect()->back()->with($notification);
            } else {
                            
                // $result = $this->sendMyOTPMessage("Your registration code is $randomNum\n Do not share this code with anyone.", $opt_number);

                $hhh =  "Your registration OTP code is ".$randomNum.". WARNING: Do not share this code with anyone.";
                
                $variation = str_replace(" ", "+", $hhh);
                $result = $this->hubtelSendOTPMessage($variation, $opt_number);
                $selected_item = json_decode($result, true);

                if ($selected_item['status'] == 0) {
              
                    $user_model->f_name     = $f_name;
                    $user_model->l_name     = $l_name;
                    $user_model->email      = $email;
                    $user_model->phone      = $opt_number;
                    $user_model->otp_code   = $randomNum;
                    $user_model->user_type  = $user_type;
                    $user_model->save();
                    
                    
                    $data['title'] = 'Registration';
                    $data['success'] = $selected_item['status'] == 0 ? 'success' : 'error';
                    $data['message'] = $selected_item['statusDescription'];

                    $data['otp_number'] = $opt_number;

                    return view('login.otp_auth', $data);

                } else {
                    
                    $notification = array(
                        'title' => 'Registration',
                        'message' => $selected_item['statusDescription'],
                        'alert-type' => $selected_item['status'] == 0  ? 'success' : 'danger',
                        'icon' => 'alert'
                    );

                    return redirect()->back()->with($notification);

                }
                
            }
            

        } else {
            
            $notification = array(
                'title' => 'Registration',
                'message' => "User number already exist. Please register with a new vailid phone number.",
                'alert-type' => 'danger',
                'icon' => 'alert'
            );

            return redirect()->back()->with($notification);
        }
        
    }



    public function postLoginOTPNumber(Request $request) {

        $h_pass = Hash::make('ezirent');
        $my_pass = 'ezirent';

        // dd($h_pass);

        // $currentUser = Auth::user();
        // $data['getUserType'] = EziUserTypeModel::getAllUserTypes();

        // $db_user = User::getUserByEmail($request->email);

        $opt_number = $request->otp_number;
        $fig1       = $request->pin1;
        $fig2       = $request->pin2;
        $fig3       = $request->pin3;
        $fig4       = $request->pin4;

        $otp_code   = $fig1.$fig2.$fig3.$fig4;

        // dd($opt_number);


        // $remember = $request->remember == 'on' ? true : false;
    
        $user = new User();

        $db_user = $user::where('phone', '=', $opt_number)->first();

        // dd($db_user);

        if(empty($db_user)) {

            $notification = array(
                'title' => 'Login Denied! ',
                'message' => 'User does not exist. Contact Admin.',
                'alert-type' => 'danger',
                'icon' => 'block-helper'
            );

            return redirect()->back()->with($notification);
        } else {

            if($otp_code != $db_user->otp_code) {
                $notification = array(
                    'title' => 'Login Denied! ',
                    'message' => 'Sorry, you have entered a wrong OTP code. Try again.',
                    'alert-type' => 'danger',
                    'icon' => 'alert-outline'
                );

                return redirect('login')->with($notification);

            } else {

                if(Auth::attempt(['phone' => $opt_number, 'password'=> $my_pass, 'otp_code' => $otp_code, 'user_type' => $db_user->user_type, 'is_deleted' => 0])) {

                    // dd($data->all());
                    $groupName = '';
                    
                    if ($db_user->user_type == 1) {
                        $groupName = 'tenant';
                    }

                    if ($db_user->user_type == 2) {
                        $groupName = 'agent';
                    }

                    if ($db_user->user_type == 3) {
                        $groupName = 'agent';
                    }

                    if ($db_user->user_type == 4) {
                        $groupName = 'admin';
                    }

                    $mf_name = !empty($db_user->f_name) ? $db_user->f_name : '';
                    $ml_name = !empty($db_user->l_name) ? ' '.$db_user->l_name : '';
                    $full_name = $mf_name.$ml_name;

                    $notification = array(
                        'title' => 'Login Success',
                        'message' => 'You are welcome '.$full_name,
                        'alert-type' => 'success',
                        'icon' => 'check-bold'
                    );

                    return redirect($groupName.'/dashboard')->with($notification);
        
                } else {

                    $notification = array(
                        'title' => 'Login Denied!',
                        'message' => 'Error login, please try again.',
                        'alert-type' => 'danger',
                        'icon' => 'alert'
                    );
        
                    return redirect('login')->with($notification);
                }

            }
        }
         





 
         if (!empty($db_user)) {
            if ($db_user->remember_token == $request->pincode) {
                 $notification = array(
                     'title' => 'New Password',
                     'message' => 'Create New Password',
                     'success' => 'success',
                 );
         
                 $selected_item = response()->json($notification);
         
                 return $selected_item;
            } else {
                 $notification = array(
                     'title' => 'New Password',
                     'message' => 'User does not exist',
                     'success' => 'failed',
                 );
         
                 $selected_item = response()->json($notification);
         
                 return $selected_item;
            }
         }
 


        $opt_number = $request->phone_otp;

        $data['title'] = 'Login';
        $data['success'] = 'success';
        $data['otp_number'] = $request->opt_number;

        return view('agents.dashboard', $data);

    }

    
    public function postAdminLogin(Request $request) {

        $h_pass = Hash::make('ezirent');
        $my_pass = 'ezirent';

        // dd($request->all());

        // $currentUser = Auth::user();
        // $data['getUserType'] = EziUserTypeModel::getAllUserTypes();

        // $db_user = User::getUserByEmail($request->email);

        $email          = $request->email;
        $password       = $request->password;
        $rem_pass       = $request->rem == 'on' ? true : false;

        // dd($email);


        // $remember = $request->remember == 'on' ? true : false;
    
        $user = new User();

        $db_user = $user::where('email', '=', $email)->first();

        // dd($db_user);

        if(empty($db_user)) {

            $notification = array(
                'title' => 'Login',
                'message' => 'User does not exist. Contact Admin.',
                'alert-type' => 'danger',
                'icon' => 'block-helper'
            );

            return redirect()->back()->with($notification);
        } else {

            if(!password_verify($password, $db_user->password)) {
                $notification = array(
                    'title' => 'Login',
                    'message' => 'Sorry, you have entered a wrong password. Try again.',
                    'alert-type' => 'danger',
                    'icon' => 'alert-outline'
                );

                return redirect()->back()->with($notification);

            } else {

                if(Auth::attempt(['email' => $email, 'password'=> $password, 'user_type' => 4, 'is_deleted' => 0], $rem_pass)) {

                    // dd($data->all());
                    $groupName = '';
                    
                    if ($db_user->user_type == 1) {
                        $groupName = 'tenant';
                    }

                    if ($db_user->user_type == 2) {
                        $groupName = 'agent';
                    }

                    if ($db_user->user_type == 3) {
                        $groupName = 'agent';
                    }

                    if ($db_user->user_type == 4) {
                        $groupName = 'admin';
                    }

                    $mf_name = !empty($db_user->f_name) ? $db_user->f_name : '';
                    $ml_name = !empty($db_user->l_name) ? ' '.$db_user->l_name : '';
                    $full_name = $mf_name.$ml_name;

                    $notification = array(
                        'title' => 'Login',
                        'message' => 'You are welcome '.$full_name,
                        'alert-type' => 'success',
                        'icon' => 'check-bold'
                    );

                    return redirect($groupName.'/dashboard')->with($notification);
        
                } else {

                    $notification = array(
                        'title' => 'Login',
                        'message' => 'Error login, you are not an admin.',
                        'alert-type' => 'danger',
                        'icon' => 'alert'
                    );
                    return redirect()->back()->with($notification);
                }

            }
        }
         

    }




    public function auth_logout() {
    
        Auth::logout();
        return  redirect('login'); 
    }


    private function sendMessage($message, $recipients) {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $company = 'Ezirent GH';
        $client = new Client($account_sid, $auth_token);
        $my_messages = $client
                        ->messages
                        ->create($recipients, ['from' => $twilio_number, 'body' => $message]);


    }




    private function sendMyOTPMessage($message, $recipients) {

        $responses = '';
        $sender_id = 'EzirentGHs';

        $key = "336bf3ae-33a9-4ea1-8983-9ad28f28e656"; //your unique API key;
        $message = urlencode($message); //encode url;

        /*******************API URL FOR SENDING MESSAGES********/
        $url = "https://clientlogin.bulksmsgh.com/smsapi?key=$key&to=$recipients&msg=$message&sender_id=$sender_id";

        /****************API URL TO CHECK BALANCE****************/
        $urls = "https://clientlogin.bulksmsgh.com/api/smsapibalance?key=$key";

        $result = file_get_contents($url); //call url and store result;

        // if ($result = "1000") {
        //     # code...
        // } else {
        //     # code...
        // }
        


        return $result;
    }

    private function hubtelSendOTPMessage($message, $recipients) {
   
        $sender_id = 'EzirentGH';
        $client_id = 'ltifibvw'; //ltifibvw

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://sms.hubtel.com/v1/messages/send?clientsecret=smtrdjqv&clientid=$client_id&from=$sender_id&to=$recipients&content=$message",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic RFlMTVozNjo5MTQzMzlhMTYzZmQ0YTRmYWUxZDQxMTY3YTA3OTNiOQ=='
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;

        return $response;
    }

    
}
