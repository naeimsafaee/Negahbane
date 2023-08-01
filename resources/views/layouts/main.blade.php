<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Negahbane Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href={{asset("assets/css/bootstrap.css")}} rel="stylesheet">
    <link href={{asset("assets/css/master.css")}} rel="stylesheet">
    <script src={{asset("assets/js/JQUERY.js")}}></script>
    <script src={{asset("assets/js/BOOTSTRAP.js")}}></script>
    <script src={{asset("assets/js/ajax.js")}}></script>
</head>
<body>
<div class="container-fluid">
    <img class="Ellipse1" src={{asset("assets/photo/Ellipse%202.png")}}>
    <img class="Ellipse2" src={{asset("assets/photo/Ellipse%203.png")}}>
    <div class="overlay"></div>
    <div class="mobile-nav flex-box mobile-items">
        <img class="close" src={{asset("assets/icon/close.svg")}}>
        <a class="" href="{{route('setting')}}">تنظیمات</a>

        <a class="flex-box" href="{{route('licence.index')}}">
            ارتقا حساب
        </a>


        <a class="flex-box" href="{{ route('guard.index') }}">
            نگهبان ها
        </a>


        <a class="flex-box" href="{{ route('logout_client') }}">
            <img src={{asset("assets/icon/log-out.svg")}}>
            خروج از حساب
        </a>
    </div>
    <div class="row man-row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <nav class="navigation flex-box">
                <a href="/" class="flex-box">
                    <div class="logo">
                        <img src={{asset("assets/photo/logo.png")}}>
                    </div>
                    <div class="logo-text">
                        <h2>
                            نگهبانه سایت
                        </h2>
                        <h6>
                            مانیتورینگ سرور و سایت
                        </h6>
                    </div>

                </a>
                <a id="mobile-menu" class="flex-box">
                    <span></span>
                    <span></span>
                    <span></span>

                </a>
                <div class="flex-box nav-menu web-item">


                    <a class="" href="{{route('setting')}}">تنظیمات</a>

                    <a class="flex-box" href="{{route('licence.index')}}">
                        ارتقا حساب
                    </a>


                    <a class="flex-box" href="{{ route('guard.index') }}">
                        نگهبان ها
                    </a>
                    <form id="logout" method="POST" action="{{route('logout')}}">@csrf</form>

                    <a class="flex-box" href="{{ route('logout_client') }}">
                        <img src={{asset("assets/icon/log-out.svg")}}>
                        خروج از حساب
                    </a>
                    <script>
                        function log() {
                            document.getElementById('logout').submit();
                        }
                    </script>

                </div>
            </nav>
        </div>
        @yield('content')
<script src={{asset("assets/js/master.js")}}></script>
</body>
</html>
