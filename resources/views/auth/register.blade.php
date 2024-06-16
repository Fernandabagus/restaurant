<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
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
    <!-- Include custom CSS file -->
    <link rel="stylesheet" type="text/css" href="{{ asset('login-template/css/custom.css') }}">
</head>
<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('register') }}" class="login100-form validate-form" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        <!-- Include the application logo component -->
                        <x-application-logo />
                        Register to continue
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Image is required">
                        <div class="file-input-wrapper">
                            <button type="button" class="file-input-button">Choose Image</button>
                            <input class="file-input @error('profile-image') error @enderror" type="file" name="img" id="img" value="{{ old('profile-image') }}" required autofocus autocomplete="off">
                            <span class="file-input-label" id="file-name">No file chosen</span>
                        </div>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Image</span>
                        @error('profile-image')
                            <span class="alert-validate" data-validate="{{ $message }}"></span>
                        @enderror
                    </div>

                    <!-- Fullname -->
                    <div class="wrap-input100 validate-input" data-validate="Fullname is required">
                        <input class="input100 @error('name') error @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder=" " required autofocus autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Fullname</span>
                        @error('name')
                            <span class="alert-validate" data-validate="{{ $message }}"></span>
                        @enderror
                    </div>

                    <!-- Username -->
                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <input class="input100 @error('username') error @enderror" type="text" name="username" id="username" value="{{ old('username') }}" placeholder=" " required autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Username</span>
                        @error('username')
                            <span class="alert-validate" data-validate="{{ $message }}"></span>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100 @error('email') error @enderror" type="email" name="email" id="email" value="{{ old('email') }}" placeholder=" " required autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                        @error('email')
                            <span class="alert-validate" data-validate="{{ $message }}"></span>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="wrap-input100 validate-input" data-validate="Phone number is required">
                        <input class="input100 @error('phone') error @enderror" type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder=" " required autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Phone Number</span>
                        @error('phone')
                            <span class="alert-validate" data-validate="{{ $message }}"></span>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="wrap-input100 validate-input" data-validate="Address is required">
                        <input class="input100 @error('address') error @enderror" type="text" name="address" id="address" value="{{ old('address') }}" placeholder=" " required autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Address</span>
                        @error('address')
                            <span class="alert-validate" data-validate="{{ $message }}"></span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100 @error('password') error @enderror" type="password" name="password" id="password" placeholder=" " required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                        @error('password')
                            <span class="alert-validate" data-validate="{{ $message }}"></span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="wrap-input100 validate-input" data-validate="Password confirmation is required">
                        <input class="input100 @error('password_confirmation') error @enderror" type="password" name="password_confirmation" id="password_confirmation" placeholder=" " required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Confirm Password</span>
                        @error('password_confirmation')
                            <span class="alert-validate" data-validate="{{ $message }}"></span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <a class="txt2" href="{{ route('login') }}">
                            Already registered?
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
   
