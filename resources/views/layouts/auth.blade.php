<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Negahbane Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <script src="assets/js/JQUERY.js"></script>
    <script src="assets/js/BOOTSTRAP.js"></script>
    <script src="assets/js/ajax.js"></script>
</head>
<body>
<div class="container-fluid">
    <img class="Ellipse1" src="assets/photo/Ellipse%202.png">
    <img class="Ellipse2" src="assets/photo/Ellipse%203.png">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="container">
                <div class="login-form">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <a href="#" class="login-form-logo">
                                <img  src="assets/photo/logo.png">
                            </a>
                            <h2 class="text-center">
                                نگهبانه سایت
                            </h2>
                            <h6 class="text-center">
                                مانیتورینگ سرور و سایت
                            </h6>


                        </div>
                    @yield('content')
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <a href="#" class="main-box back-home">
                                بازگشت به صفحه اصلی
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
