<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="BETGURU - Web Exchange">
    <meta name="author" content="BETGURU">
    <title>BETGURU Login</title>
    <link rel="shortcut icon" href="/img/favicon/BetPro.ico">
    <link rel="stylesheet" type="text/css" href="/css/v3/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/v3/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="/css/v3/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/css/v3/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/css/v3/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="/css/v3/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/css/v3/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="/css/v3/css/util.css">
    <link rel="stylesheet" type="text/css" href="/css/v3/css/main.css">
    <link href="/css/BetPro-login-style.css?11700" rel="stylesheet">
    <style>
        .bffooter {
            width: 135px;
            height: 30px;
        }
        @media screen and (max-width: 635px) {
            .bffooter {
                width: 100px;
                height: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('/img/bg-diamonds2.png');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="/login">
                    @csrf
                    <span class="login100-form-logo">
                        <a href="/"><i><img class="LG_Logo" style="border-radius:60px;" src="/css/v3/images/icons/b2.jpg"></i></a>
                    </span>

                    @if (session('success'))
                        <div class="alert alert-success text-center mb-3" role="alert" style="color: #4dbd74; font-size:16px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate="Enter username or email">
                        <input class="input100" type="text" required="" placeholder="Username or Email" id="login"
                            name="login" value="{{ old('login') }}">
                        <span class="focus-input100" data-placeholder=""></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" required="" placeholder="Password" id="password"
                            name="password">
                        <span class="focus-input100" data-placeholder=""></span>
                    </div>

                    <div class="text-left p-t-10 p-b-10">
                        <label style="color: #999;">
                            <input type="checkbox" name="remember" value="1"> Remember Me
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-10">
                        @if ($errors->any())
                            <div class="text-danger" id="errorBox" style="font-size:16px;">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
