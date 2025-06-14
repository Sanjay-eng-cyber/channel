<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ url('') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}" type="image/x-icon">
    <title>Reset Password - Vission EMR</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="backend/css/cms.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .cubold {
            font-weight: 600
        }

        .body-bg {
            background: linear-gradient(180deg, rgba(0, 175, 239, 0.0145) 0%, rgba(0, 175, 239, 0.29) 100%);
            background-repeat: no-repeat;

            /* Set the height of the container */
        }

        .bg-pink-color {
            background-color: #EC268F;
            border-radius: 12.666px;
            color: white;
            transition: none;
            /* Remove default transition effect */

        }

        .bg-pink-color:hover {
            background-color: transparent;
            color: #EC268F;
            border: 2px solid #EC268F;
        }

        input[data-custom-attribute="channels-login"] {
            background: #FFFFFF;
            box-shadow: 8.03325px 11.6847px 15.3362px 1.46059px rgba(0, 0, 0, 0.13);
            border-radius: 10.9544px;

        }

        .text-cl {
            color: #000000;
        }
    </style>
</head>

<body class="auth-page-bg">
    <div class="container">

        <div class="auth-form px-2 mx-auto" style="max-width:550px">
            <img class="d-block mx-auto w-100 mt-5" style="max-width:250px"
                src="backend/images/vission-eye-logo-circle.svg" alt="">
            <h1 class="text-center h3 mt-5 auth-text-primary cubold text-cl">Reset Password</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input class="form-control" type="text" name="token" value="{{ $request->route('token') }}"
                    required hidden data-custom-attribute="channels-login">
                <div class="auth-form-input mt-5">
                    <img class="icon" src="backend/images/icon-user.svg" draggable="false">
                    <input class="form-control" placeholder="E-mail or Username " id="email" name="email"
                        type="email" minlength="8" maxlength="30" value="{{ request('email') }}" readonly required
                        data-custom-attribute="channels-login">
                </div>
                @if ($errors->has('email'))
                    <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                @endif
                <div class="auth-form-input mt-4">
                    <img class="icon eye-show-pass" src="backend/images/icon-eye.svg" draggable="false">
                    <input class="form-control password" type="password" placeholder="Password" id="password"
                        name="password" minlength="8" maxlength="16" required>
                </div>
                <div class="auth-form-input mt-4">
                    <img class="icon eye-show-pass" src="backend/images/icon-eye.svg" draggable="false">
                    <input class="form-control password" type="password" placeholder="Password" id="password2"
                        name="password_confirmation" minlength="8" maxlength="16" required
                        data-custom-attribute="channels-login">
                </div>
                @if ($errors->has('password'))
                    <div class="text-danger" role="alert">{{ $errors->first('password') }}</div>
                @endif

                <button type="submit" class="form-control btn-lg  h-auto mt-3 auth-bg-primary font-bold bg-pink-color">
                    Login
                </button>

            </form>
            <div class="text-center text-muted mt-3">
                <small>
                    &copy;
                    {{ date('Y') }} All Rights Reserved | Powered by
                    <a href="http://acetrot.com" class="text-muted text-underline" target="_blank">
                        Acetrot.com
                    </a>
                </small>
            </div>
            <img class="mt-5 w-100" src="backend/images/login-bg.png" draggable="false" alt="">
        </div>
    </div>

    <script src="backend/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="backend/bootstrap/js/popper.min.js"></script>
    <script src="backend/bootstrap/js/bootstrap.min.js"></script>
    <script>
        var eyeIcon = document.querySelectorAll(".eye-show-pass");
        var passwordInput = document.querySelectorAll(".password");
        eyeIcon.forEach(icons => {
            icons.addEventListener('click', function(e) {
                passwordInput.forEach(inputs => {
                    if (inputs.type === "password") {
                        inputs.type = "tepasswordInputt";
                    } else {
                        inputs.type = "password";
                    }
                });
            })
        });
    </script>
</body>

</html>
