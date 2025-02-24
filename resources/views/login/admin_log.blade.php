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

    
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ url('public/agents/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/agents/assets/css/font-awesome.min.css') }}">



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/css/intlTelInput.css">

  <link rel="stylesheet" href="{{ url('public/assets/css/login.css')}}">
  <style>
       
  </style>

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
                                        <form method="POST" action="{{ url('admin_login_form') }}">
                                            @csrf
                                            
                                            <div class="text-center mb-5">
                                                <p class="h4">Please login as an admin.</p>
                                
                                            </div>
                                    
                                            @if (session('title') == 'Login')
                                                @include('login.login_my_alerts')
                                            @endif
                                         
                                            <div class="form-group">
                                                <label for="loginemail">Email Adderss</label>
                                                <input type="email" id="loginemail" name="email" class="email" required />
                                            </div>

                                            <div class="form-group">
                                                <label for="loginPassword">Password</label>
                                                <input type="password" name="password" id="loginPassword" class="password" required/>
                                            </div>

                                            <div class="d-flex justify-content-between mb-2">
                                                <!-- Checkbox -->
                                                <div class="d-flex justify-content-start">
                                                    <input name="rem" type="checkbox" id="form2Example3" class="me-2" checked style="width: 20px;"/>
                                                    <span >Remember me </span>
                                                </div>
                                                <a href="javascript:void(0);" class="text-body">Forgot password?</a>
                                            </div>
                            
                                            <div class="CTA">
                                                 <!-- Submit button -->
                                                 <input type="submit" data-mdb-ripple-init class="login_btn" value="Login"/>
                                        
                                                <a href="{{ url('login') }}" class="">Create New Account</a>
                                            </div>

                                            
                                            <div class="row mt-4">
                                                <a href="{{ url('/') }}" data-mdb-ripple-init class="login_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                            </div>

                                        </form>
                                    </div>
                                    <!-- End Login Form -->
                        
                        
                                    <!-- Signup Form -->
                                    <div class="signup form-peice switched">
                                      
                                    </div>
                                    <!-- End Signup Form -->
                                </div>
                            </div>
                        
                        </section>
                    
                    
                        <footer>
                            <h5>
                                Back To User Login / Register: <a href="{{ url('login')}}"> <span class="text-white">Click Here</span></a>
                            </h5>
                        </footer>
                    
                    </div>
                    
                </div>
              
            </div>
        </div>
                



        <script src="{{ url('public/assets/js/jquery-3.7.1.js') }}"></script>

  
        <script type="text/javascript">
            /*global $, document, window, setTimeout, navigator, console, location*/
            $(document).ready(function () {

                'use strict';

                var usernameError = true,
                    emailError    = true,
                    passwordError = true,
                    passConfirm   = true;

                // Detect browser for css purpose
                if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
                    $('.form form label').addClass('fontSwitch');
                }

                // Label effect
                $('input').focus(function () {

                    $(this).siblings('label').addClass('active');
                });

                // Form validation
                $('input').blur(function () {

                    // User Name
                    if ($(this).hasClass('name')) {
                        if ($(this).val().length === 0) {
                            $(this).siblings('span.error').text('Please type your full name').fadeIn().parent('.form-group').addClass('hasError');
                            usernameError = true;
                        } else if ($(this).val().length > 1 && $(this).val().length <= 6) {
                            $(this).siblings('span.error').text('Please type at least 6 characters').fadeIn().parent('.form-group').addClass('hasError');
                            usernameError = true;
                        } else {
                            $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                            usernameError = false;
                        }
                    }
                    // Email
                    if ($(this).hasClass('email')) {
                        if ($(this).val().length == '') {
                            $(this).siblings('span.error').text('Please type your email address').fadeIn().parent('.form-group').addClass('hasError');
                            emailError = true;
                        } else {
                            $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                            emailError = false;
                        }
                    }

                    // PassWord
                    if ($(this).hasClass('pass')) {
                        if ($(this).val().length < 8) {
                            $(this).siblings('span.error').text('Please type at least 8 charcters').fadeIn().parent('.form-group').addClass('hasError');
                            passwordError = true;
                        } else {
                            $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                            passwordError = false;
                        }
                    }

                    // PassWord confirmation
                    if ($('.pass').val() !== $('.passConfirm').val()) {
                        $('.passConfirm').siblings('.error').text('Passwords don\'t match').fadeIn().parent('.form-group').addClass('hasError');
                        passConfirm = false;
                    } else {
                        $('.passConfirm').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                        passConfirm = false;
                    }

                    // label effect
                    if ($(this).val().length > 0) {
                        $(this).siblings('label').addClass('active');
                    } else {
                        $(this).siblings('label').removeClass('active');
                    }
                });


                // form switch
                $('a.switch').click(function (e) {
                    $(this).toggleClass('active');
                    e.preventDefault();

                    if ($('a.switch').hasClass('active')) {
                        $(this).parents('.form-peice').addClass('switched').siblings('.form-peice').removeClass('switched');
                    } else {
                        $(this).parents('.form-peice').removeClass('switched').siblings('.form-peice').addClass('switched');
                    }
                });


                // Form submit
                $('form.signup-form').submit(function (event) {
                    event.preventDefault();

                    if (usernameError == true || emailError == true || passwordError == true || passConfirm == true) {
                        $('.name, .email, .pass, .passConfirm').blur();
                    } else {
                        $('.signup, .login').addClass('switched');

                        setTimeout(function () { $('.signup, .login').hide(); }, 700);
                        setTimeout(function () { $('.brand').addClass('active'); }, 300);
                        setTimeout(function () { $('.heading').addClass('active'); }, 600);
                        setTimeout(function () { $('.success-msg p').addClass('active'); }, 900);
                        setTimeout(function () { $('.success-msg a').addClass('active'); }, 1050);
                        setTimeout(function () { $('.form').hide(); }, 700);
                    }
                });

                // Reload page
                $('a.profile').on('click', function () {
                    location.reload(true);
                });


            });

        </script>
        <!-- Vendor JS Files -->
        <script src="{{ url('public/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    </body>
      
      
</html>