<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('colorlib-wizard-14/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('colorlib-wizard-14/css/style.css') }}">
</head>
<body>
    <div class="main">
        <div class="container">
            <h2>Rebuild your profile</h2>
            <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data" action="{{ route('update.profile') }}">
            @csrf
                <h3>Picture</h3>
                <fieldset>
                    <div class="form-row">
                        <div class="form-file">
                            <input type="file" class="inputfile" name="img" id="your_picture" onchange="readURL(this);" data-multiple-caption="{count} files selected" multiple />
                            <label for="your_picture">
                                <figure>
                                    <img src="{{ asset( $user->img) }}" alt="{{ $user->img }}" class="your_picture_image">
                                </figure>
                                <span class="file-button">Choose picture</span>
                            </label>
                        </div>
                        <div class="form-group-flex">
                            <div class="form-group">
                                <input type="text" name="username" id="username" placeholder="Username" value="{{ $user->username }}" required />
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="Name" value="{{ $user->name }}" required />
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" placeholder="Phone" value="{{ $user->phone }}" required />
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>Address</h3>
                <fieldset>
                    <div class="form-row form-input-flex">
                        <div class="form-input">
                            <input type="text" name="address" id="address" placeholder="Address" value="{{ $user->address }}" required />
                        </div>
                        <div class="form-input">
                            <input type="email" name="email" id="email" placeholder="Email" value="{{ $user->email }}" required />
                        </div>
                    </div>
                </fieldset>

                <h3>Password</h3>
                <fieldset>
                    <div class="form-row form-input-flex">
                        <div class="form-input">
                            <input type="password" name="password" id="password" placeholder="Password"  />
                        </div>
                        <div class="form-input">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"  />
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('colorlib-wizard-14/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('colorlib-wizard-14/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('colorlib-wizard-14/vendor/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('colorlib-wizard-14/vendor/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('colorlib-wizard-14/js/main.js') }}"></script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.your_picture_image').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
