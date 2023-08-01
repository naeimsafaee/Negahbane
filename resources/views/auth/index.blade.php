<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{setting('site.title')}}</title>
    <meta name="description" content="{{setting('site.description')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href={{asset("assets/css/bootstrap.css")}} rel="stylesheet">
    <link href={{asset("assets/css/master.css")}} rel="stylesheet">
    <script src={{asset("assets/js/JQUERY.js")}}></script>
    <script src={{asset("assets/js/BOOTSTRAP.js")}}></script>
    <script src={{asset("assets/js/ajax.js")}}></script>
    <link rel="shortcut icon" type="image/png"  href="{{ Voyager::image(setting('site.logo')) }}"/>

    @yield('style')
</head>
<body>
<div class="container-fluid">
    <img class="Ellipse1" src={{asset("assets/photo/Ellipse%202.png")}}>
    <img class="Ellipse2" src={{asset("assets/photo/Ellipse%203.png")}}>

    @if (\Session::has('success'))

        <div class="error-message">
            <div style="width: 100% ; direction: rtl; color: white; margin-right: 40px">
                {!! \Session::get('success') !!}
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="container">
                <div class="login-form">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <a href="{{route('home')}}" class="login-form-logo">
                                <img src={{ Voyager::image(setting('site.logo')) }}>
                            </a>
                            <h2 class="text-center">
                                {{ setting('site.icon-title') }}
                            </h2>
                            <h6 class="text-center">
                                {{ setting('site.icon-desc') }}
                            </h6>


                        </div>

                        @yield('content')
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <a href="{{route('home')}}" class="shrink main-box back-home">
                                بازگشت به صفحه اصلی
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src={{asset("assets/js/master.js")}}></script>
<script src={{asset("assets/js/dropdown.js")}}></script>
@yield('script')

</body>
</html>


