<x-guest-layout>
    <style>
       .otp-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border: 2px solid #ff8c00;
            border-radius: 5px;
            outline: none;
            transition: all 0.2s ease-in-out;
        }

        .otp-input:focus {
            border-color: #d26900;
            box-shadow: 0 0 5px rgba(210, 105, 0, 0.5);
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }

        .btn-primary {
            background-color: #ff8c00;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #d26900;
        }

        .btn-secondary {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .btn-secondary:hover {
            background-color: #333;
        }

        .resend-container {
            text-align: center;
            margin-top: 15px;
        }
    </style>

    {{-- <!-- Session Status -->
    <div class="mb-4 text-gray-600 text-center">
        <p>We have sent a One-Time Password (OTP) to your phone number. Please enter the 6-digit code below to verify your login.</p>
    </div> --}}

    <!-- Success Message -->
    @if (session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show mb-3 text-center" role="alert" style="
        background-color: #dff0d8; 
        color: #3c763d; 
        border-left: 5px solid #4caf50; 
        padding: 12px 20px; 
        font-size: 16px; 
        font-weight: bold; 
        display: flex; 
        justify-content: space-between; 
        align-items: center;">
        
        <span>{{ session('success') }}</span>
        
        <button type="button" class="close" aria-label="Close" onclick="closeAlert()" style="
            background: none; 
            border: none; 
            font-size: 20px; 
            color: #3c763d; 
            cursor: pointer;">
            &times;
        </button>
    </div>
@endif


    <!-- OTP Form -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">Verify OTP</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('verify-otp') }}">
                            @csrf
                            <div class="form-group text-center">
                                <div class="otp-container">
                                    <input type="text" class="otp-input" name="otp[]" maxlength="1" required autofocus>
                                    <input type="text" class="otp-input" name="otp[]" maxlength="1" required>
                                    <input type="text" class="otp-input" name="otp[]" maxlength="1" required>
                                    <input type="text" class="otp-input" name="otp[]" maxlength="1" required>
                                    <input type="text" class="otp-input" name="otp[]" maxlength="1" required>
                                    <input type="text" class="otp-input" name="otp[]" maxlength="1" required>
                                </div>
                                @error('otp')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                                <div class="btn-container">
                                    <button type="submit" class="btn-primary">Verify</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Resend OTP -->
                <div class="resend-container">
                    <p>Didn't receive the code?</p>
                    <form method="POST" action="{{ route('resend-otp') }}">
                        @csrf
                        <button type="submit" class="btn-secondary">Resend OTP</button>
                    </form>
                </div>

                <!-- Back to Login -->
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

<!-- jQuery for OTP Auto-Focus -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.otp-input').on('input', function () {
            if (this.value.length === this.maxLength) {
                $(this).next('.otp-input').focus();
            }
        });

        $('.otp-input').on('keydown', function (e) {
            if (e.key === "Backspace" && this.value.length === 0) {
                $(this).prev('.otp-input').focus().val('');
            }
        });
    });

    function closeAlert() {
            document.getElementById('success-alert').style.display = 'none';
        }
</script>
