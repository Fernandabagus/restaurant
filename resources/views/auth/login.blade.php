<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('login-template/images/icons/favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('login-template/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-template/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-template/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-template/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-template/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-template/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-template/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-template/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-template/css/main.css') }}">
    <!-- Font Awesome for Google icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        <x-application-logo />
                        Login to continue
                    </span>

                    <!-- Email Address -->
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz" autocomplete="one-time-code">
                        <input class="input100" type="email" name="email" id="email" value="{{ old('email') }}" required autofocus autocomplete="one-time-code">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                        @error('email')
                            <div class="alert-validate" data-validate="{{ $message }}"></div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" id="password" required autocomplete="one-time-code">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                        @error('password')
                            <div class="alert-validate" data-validate="{{ $message }}"></div>
                        @enderror
                    </div>

                    <!-- Remember Me and Forgot Password -->
                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="remember_me" type="checkbox" name="remember">
                            <label class="label-checkbox100" for="remember_me">
                                Remember me
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <div>
                                <a class="txt1" href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <!-- Google Login Button -->
                    <div class="text-center p-t-20 p-b-20">
                        <span class="txt2">
                            Or login with
                        </span>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('auth.google') }}" class="btn btn-danger btn-block">
                            <i class="fab fa-google mr-2"></i> Login with Google
                        </a>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            Don't have an account? 
                        </span>
                        <a href="{{ route('register') }}" class="txt2">
                            Register
                        </a>
                    </div>
                </form>
                <div class="login100-more" style="background-image: url('{{ asset('login-template/images/bg-01.jpg') }}');"></div>
            </div>
        </div>
    </div>

    <script src="{{ asset('login-template/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('login-template/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('login-template/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('login-template/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login-template/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('login-template/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('login-template/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('login-template/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('login-template/js/main.js') }}"></script>
</body>
</html>