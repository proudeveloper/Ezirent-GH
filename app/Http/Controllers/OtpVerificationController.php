<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Nexmo\Laravel\Facade as Nexmo;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OtpVerificationController extends Controller
{
    public function enterOtp(Request $request)
    {
        if (Auth::user()) {
            return redirect()->back();
        }

        return view('auth.verify-otp');
    }

    public function sendOtp(Request $request)
    {
        $previousUrl = url()->previous();
        $previousRoute = app('router')->getRoutes()->match(Request::create($previousUrl))->getName();

        if ($previousRoute === 'login') {
            $request->validate([
                'phone' => 'required|exists:users,phone',
            ], [
                'phone.exists' => 'The phone number is not registered in our system.',
            ]);

            $user = User::where('phone', $request->phone)->first();
        } elseif ($previousRoute === 'register') {

            $request->validate([
                'phone' => 'required|numeric|unique:users,phone',
                'firstname' => 'required|string',
                'lastname' => 'required|string',
            ], [
                'phone.unique' => 'This phone number is already registered.',
            ]);

            Session::put('registration_data', [
                'f_name' => $request->firstname,
                'l_name' => $request->lastname,
                'phone' => $request->phone,
            ]);
        }

        $otp = $this->generateOtp();

        if ($previousRoute === 'login' && isset($user)) {
            $user->otp_code = Hash::make($otp);
            $user->otp_expires_at = Carbon::now()->addMinutes(5);
            $user->save();
        }

        $this->sendOtpNotification($request->phone, $otp);

        return redirect()->route('enterOtp')->with('success', 'Please check your phone for the OTP to verify.');
    }



    public function resendOtp(Request $request)
    {
        if (!$request->session()->has('phone')) {
            return redirect()->route('login')->withErrors(['phone' => 'Session expired. Please start the process again.']);
        }

        $phone = $request->session()->get('phone');
        $lastRequest = $request->session()->get('otp_sent_at');
        $oneMinuteAgo = now()->subMinute();

        if ($lastRequest && $lastRequest->gt($oneMinuteAgo)) {
            return back()->withErrors(['otp' => 'Please wait one minute before requesting a new OTP']);
        }

        $otp = $this->generateOtp();

        $user = User::where('phone', $phone)->first();

        if ($user) {
            $user->otp_code = Hash::make($otp);
            $user->otp_expires_at = Carbon::now()->addMinutes(5);
            $user->save();
        } else {
            if (!$request->session()->has('registration_data')) {
                return redirect()->route('register')->withErrors(['otp' => 'Session expired. Please restart the registration.']);
            }
        }

        $this->sendOtpNotification($phone, $otp);

        return redirect()->route('enterOtp')->with('success', 'OTP resent successfully!');
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required',
        ]);

        $request->session()->regenerate();

        if (Auth::check()) {
            Log::info('User is already authenticated');
            return redirect()->back();
        }

        $otpDigits = $request->input('otp');
        $otp = implode('', $otpDigits);
        $phone = $request->session()->get('phone');

        if (!$phone) {
            return redirect()->route('login')->withErrors(['otp' => 'Session expired. Please request a new OTP.']);
        }

        $user = User::where('phone', $phone)->first();

        if ($user) {
            if (!$user->otp_code || !Hash::check($otp, $user->otp_code)) {
                Log::warning("Failed authentication attempt for phone: $phone from IP: " . $request->ip());
                return back()->withErrors(['otp' => 'Invalid OTP']);
            }

            if (Carbon::now()->greaterThan($user->otp_expires_at)) {
                Log::warning("OTP expired for phone: $phone from IP: " . $request->ip());
                return back()->withErrors(['otp' => 'OTP has expired. Please request a new one.']);
            }
        } else {
            $registrationData = $request->session()->get('registration_data');

            if (!$registrationData) {
                return redirect()->route('register')->withErrors(['otp' => 'Session expired. Please restart registration.']);
            }


            $user = User::create([
                'f_name' => $registrationData['f_name'],
                'l_name' => $registrationData['l_name'],
                'phone' => $registrationData['phone'],
                'role_id' => 3
            ]);
        }

        $user->update([
            'last_ip' => $request->ip(),
            'last_user_agent' => $request->header('User-Agent'),
            'otp_code' => null,
            'otp_expires_at' => null
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        $request->session()->forget(['phone', 'otp_sent_at', 'registration_data']);

        Log::info("Successful authentication for phone: $phone from IP: " . $request->ip());

        return redirect()->route('dashboard')->with('success', 'Login successful!');
    }


    private function generateOtp(): string
    {
        return str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    }
    


    private function sendOtpNotification(string $phone, string $otp)
    {
        $message = "Your OTP code is $otp. It will expire in 5 minutes. WARNING: Do not share this code with anyone.";

        (new NotificationController)->sendOTP($message, $phone);

        Session::put('otp_sent_at', now());
        Session::put('phone', $phone);
        Session::put('otp_debug', $otp);
    }
}
