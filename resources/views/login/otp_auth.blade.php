@php
    $segments = Request::segment(1);


    // echo '<h1>'.$segments.'</h1>';
@endphp

<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="utf-8" />
  <title>Ezirent Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="EziRent Site" name="description" />
  <meta content="Segitech" name="author" />

  
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ url('public/assets/img/misc/logo.png') }}">
  <meta name="robots" content="noindex, nofollow">

  <!-- Favicons -->
  <link href="{{ url('public/assets/img/misc/logo.png') }}" rel="icon">
  <link href="{{ url('public/assets/img/misc/logo.png') }}" rel="apple-touch-icon">


  <!-- Vendor CSS Files -->
  <link href="{{ url('public/assets/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <style>
            
    h1 { 
    font-family: helvetica;
    text-align:center;
    }

    .pin-code{ 
    padding: 0; 
    margin: 0 auto; 
    display: flex;
    justify-content:center;
    
    } 
    
    .pin-code input { 
    border: 1px solid #c9b5f5;
    text-align: center; 
    width: 44px;
    height:44px;
    font-size: 30px; 
    background-color: #e6e3e3;
    margin-right:8px;
    border-radius: 5px;
    } 




    .pin-code input:focus { 
    border: 1px solid #8a60df;
    outline:none;
    } 


    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>


<link rel="stylesheet" href="{{ url('public/assets/css/opt_login.css')}}">
  
</head>

    <body class="">

{{--  style="background-color: color-mix(in srgb, var(--main-color), transparent 60%);" --}}

        <div class="limiter">
            <div class="container-login100" style="background-image: url('public/assets/img/bg/bg-01.jpg');">
                
                <div class="container py-5 h-100">
                
                    <div class="container">
                        <section id="formHolder" style="background-color: transparent !important;">
                    
                            <div class="row">
                        
                                <!-- Brand Box -->
                                <div class="col-sm-6 brand">
                                    <a href="javascript:void(0);" class="logo"><img src="{{ url('public/assets/img/misc/logo.png') }}" height="50px" alt="" srcset=""></a>
                        
                                    <div class="heading">
                                        <h2>EzirentGH</h2>
                                        <p>Your Right Choice</p>
                                    </div>
                        
                                    <div class="success-msg">
                                        <p>Great! You are one of our members now</p>
                                        <a href="#" class="profile">Your Profile</a>
                                    </div>
                                </div>
                        
                        
                                <!-- Form Box -->
                                <div class="col-sm-6 form">
                        
                                    <!-- Login Form -->
                                    <div class="login form-peice" id="login">
                                        <form method="POST" action="{{ url('verify_otp') }}">
                                            @csrf
                                            
                                            <div class="text-center mb-5">
                                                <div class="d-flex justify-content-center">
                                                    <h5 class="mb-2">Verify OTP - </h5>
                                                    <h5 class="mb-4"> {{ $title }}</h5>
                                                </div>
                                                
                                                @include('agents.layouts._my_alerts')
              
                                                <h6>Please enter the one time password to verify your account.</h6>
                                                <p>You are almost there! A verification code has been sent to <small>{{ $otp_number }}</small></p>
                                                {{-- <p class="mb-4">Please check your phone message and enter the verification code below to verify your phone number and activate your account</p> --}}
                                            </div>


                                                        
                                            <input type="hidden" name="otp_number" value="{{ $otp_number }}">
                                    
                                            <p class="text-center mb-5"></p>
                                    
                                            <!-- Email input -->
                                            <div data-mdb-input-init class="form-outline mb-3">
                                            
                                                <div class="pin-code mb-3">
                                                    <input id="pin1" class="pins mx-2" name="pin1" required="" type="text" value="" maxlength="1" autofocus>
                                                    <input id="pin2" class="pins mx-2" name="pin2" required="" type="text" value="" maxlength="1">
                                                    <input id="pin4" class="pins mx-2" name="pin3" required="" type="text" value="" maxlength="1">
                                                    <input id="pin5" class="pins mx-2" name="pin4" required="" type="text" value="" maxlength="1">
                                                </div>

                                            
                                            </div>
                                            <p class="form-label text-center mb-2" for="phone_otp">Pin Code</p>


                            
                                            <div class="CTA">
                                                 <!-- Submit button -->
                                                 <input type="submit" data-mdb-ripple-init class="login_btn" value="Verify"/>
                                        
                                                {{-- <a href="{{ url('login') }}" class="">I'm New</a> --}}
                                            </div>

                                            <div class="content d-flex justify-content-center align-items-center mt-3"> 
                                                <span>Didn't get the code</span> 
                                                <a href="javascript:void(0);" class="text-decoration-none ms-3">Resend(1/3)</a> 
                                            </div> 
                                        </form>
                                    </div>
                                    <!-- End Login Form -->
                        
                        
                                    <!-- Signup Form -->
                                    <div class="signup form-peice switched">
                                        {{-- <form method="POST" action="">
                                           
                                            <div class="text-center mb-1"><p class="">Sign up with:</p></div>
                                        

                                            <div class="form-group">
                                                <label for="f_name">First Name</label>
                                                <input type="text" id="f_name" name="f_name" class="f_name" required autofocus />
                                                <span class="error"></span>
                                            </div>
                            
                                            <div class="form-group">
                                                <label for="l_name">Last Name</label>
                                                <input type="text" id="l_name" name="l_name" class="l_name" required />
                                                <span class="error"></span>
                                            </div>
                            
                                            <div class="form-group">
                                                <input type="tel" id="register_otp" name="register_otp" class="form-control" required/>
                                               
                                            </div>
                            
                                           
                                             <!-- Name input -->
                                             <div data-mdb-input-init class="form-outline my-4 row">
                                                <div class="col-12">
                                                    <select class="nice-select form-control wide" name="user_type" id="user_type" required>
                                                        <option value="" disabled selected>Select User Type</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                    
                            
                                            <div class="CTA">
                                                <input type="submit" value="Signup Now" id="submit">
                                                <a href="#" class="switch">I have an account</a>
                                            </div>
                                        </form> --}}
                                    </div>
                                    <!-- End Signup Form -->
                                </div>
                            </div>
                        
                        </section>
                    
                    
                        <footer>
                            <h5>
                                Back To User Login / Register: <a href="{{ url('login')}}"><span class="text-white">Click Here</span></a>
                            </h5>
                        </footer>
                    
                    </div>
                    
                </div>
              
            </div>
        </div>
                



        <script src="{{ url('public/assets/js/jquery-3.7.1.js') }}"></script>
        {{-- <script data-cfasync="false" src="{{ url('public/assets/vendors/email-decode/email-decode.min.js') }}"></script>
        <script src="{{ url('public/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('public/assets/vendors/php-email-form/validate.js') }}"></script>
        <script src="{{ url('public/assets/vendors/aos/aos.js') }}"></script> --}}
        <script src="{{ url('public/assets/js/pincode.js') }}"></script>

    </body>
      
      
</html>