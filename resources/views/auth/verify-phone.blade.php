<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        .card-body {
            padding: 30px;
        }
        .otp-input {
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 18px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-right: 5px;
        }
        .otp-input:last-child {
            margin-right: 0;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .resend-form {
            margin-top: 20px;
        }
        .resend-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .resend-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="page-title-box d-flex align-items-center justify-content-center">
            @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                            {{session('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            @endif
        </div>

        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Verify using OTP</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('verify-otp') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="otp" class="col-md-4 col-form-label text-md-right" style="margin-left: -1rem ">Enter OTP:</label>

                                <div class="col-md-8">
                                    <div class="d-flex justify-content-between">
                                        <input type="text" class="form-control otp-input" name="otp[]" maxlength="1" required autofocus>
                                        <input type="text" class="form-control otp-input" name="otp[]" maxlength="1" required>
                                        <input type="text" class="form-control otp-input" name="otp[]" maxlength="1" required>
                                        <input type="text" class="form-control otp-input" name="otp[]" maxlength="1" required>
                                        <input type="text" class="form-control otp-input" name="otp[]" maxlength="1" required>
                                        <input type="text" class="form-control otp-input" name="otp[]" maxlength="1" required>
                                    </div>
                                    @error('otp')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0" style="margin-left: 63%">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="resend-btn">Verify</button>
                                    {{-- <button type="submit" class="btn btn-primary">Verify</button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 text-center">
                <p>Did not receive code?</p>
                <form method="POST" action="{{ route('resend-otp') }}" class="resend-form">
                    @csrf
                    <button type="submit" class="resend-btn">Resend OTP</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.otp-input').keyup(function() {
            if (this.value.length === this.maxLength) {
                $(this).next('.otp-input').focus();
            }
            updateHiddenOTP();
        });

        function updateHiddenOTP() {
            var otpValue = '';
            $('.otp-input').each(function() {
                otpValue += $(this).val();
            });
            $('#otp').val(otpValue);
        }
    });
</script>
<!-- jQuery  -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
</html>
