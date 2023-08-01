@extends('index-home')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="row home-main-row">
                <div class="content-row col-lg-6 col-md-12 col-sm-12">
                    <h1>
                        {{ setting('site.index-h2') }}
                    </h1>
                    <h1 class="title">
                        {{ setting('site.index-h1') }}
                    </h1>
                    <h5>
                        مانیتور وضعیت سرور و سایت از ۵۰ سرور را <span>رایگان هر ۵ دقیقه</span> دریافت کنید
{{--                        {{ setting('site.index-h3') }}--}}
                    </h5>
                    <a class=" flex-box second-btn btn-icon shrink" href="{{ route('guard.index') }}">
                        <img src={{asset("assets/icon/start.svg")}}>
                        {{setting('site.index-btn')}}
                    </a>
                    <h5>
                        به {{ fa_number($clients) }} کاربر خوشحال بپیوندید
                    </h5>
                </div>
                <div class="web-item image-row col-lg-6 col-md-12 col-sm-12">
                    <img class="home-image" src={{asset("assets/photo/home.svg")}}>
                    <img class="circle" src={{asset("assets/photo/circle.svg")}}>

                    <img class="heart-2" src={{asset("assets/icon/heart-2.svg")}}>
                    <img class="heart-1" src={{asset("assets/icon/heart-1.svg")}}>
                    <img class="heart-3" src={{asset("assets/icon/heart-3.svg")}}>
                </div>
            </div>
        </div>
    </div>
@endsection

