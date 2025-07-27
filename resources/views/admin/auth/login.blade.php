<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title></title>

        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
              rel="stylesheet"/>

        <!-- FAVICON -->
        <link href="assets/img/favicon.png" rel="shortcut icon"/>
        @vite(['resources/sass/admin.scss'])
    </head>
</head>
<body id="body">
<div class="container d-flex flex-column justify-content-between vh-100">
        <div class="col-xl-5 col-lg-6 col-md-10">
            <div class="card login-admin">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="hero">
                    <div class="main-box">
                        <div class="form-box">
                            <span class="brand-name">CRM Admin</span>

                            <div class="button-box">
                                <div id="btn"></div>
                                <button id="log" type="button" class="toggle-btn" onclick="login()">Log in</button>
                                <button id="reg" type="button" class="toggle-btn" onclick="register()">Register</button>
                            </div>
                            <form method="POST" action="{{ route('admin.login') }}" id="login" class="input-group" >
                                @csrf
                                <input type="email" name="email" class="input-field"
                                       aria-describedby="emailHelp" placeholder="Email">
                                <input id="pwd" type="password" class="input-field" name="password"
                                       placeholder="Password">


                                <input type="submit" class="submit-btn" value="Log in">
                            </form>
                            <p><a class="text-blue" href="{{ route('password.request') }}">Forgot Your
                                Password?</a></p>
                            <form id="register" class="input-group">
                                <input type="text" class="input-field" placeholder="User" required>
                                <input type="email" class="input-field" placeholder="Email" required>
                                <input id="pwd" type="Password" class="input-field" placeholder="Password" required>

                                <input type="submit" class="submit-btn" value="Register">
                            </form>
                        </div>
                        <span class="sp sp-t"></span>
                        <span class="sp sp-r"></span>
                        <span class="sp sp-b"></span>
                        <span class="sp sp-l"></span>
                    </div>
                </div>

            </div>
        </div>

</div>

<script>
    let x = document.getElementById("login");
    let y = document.getElementById("register");
    let z = document.getElementById("btn");
    let log = document.getElementById("log");
    let reg = document.getElementById("reg");
    let after = document.getElementById("after");

    function register() {
        x.style.left = "-500px";
        y.style.left = "0px";
        z.style.left = "110px";
        log.style.color = "rgb(234, 234, 235)";
        reg.style.color = "#252525";
        after.style.left = "0";
        after.style.top = "0";
    }
    function login() {
        x.style.left = "0px";
        y.style.left = "500px";
        z.style.left = "0px";
        reg.style.color = "rgb(234, 234, 235)";
        log.style.color = "#252525";
        after.style.left = "50%";
        after.style.top = "0";

    }
</script>
</body>
</html>
