@extends('index')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    <div class="center-div flex-box">
                        <img class="logo-icon" src="{{ asset('assets/photo/Union.png') }}">
                        <h6 class="pay-error">
                            یه مشکلی تو پرداخت داشتیم مجدد بررسی کنید
                        </h6>
                        {{--todo <a class="btn-icon flex-box main-btn shrink">
                            <img src="assets/icon/send-code.svg">
                            تلاش دوباره برای پرداخت

                        </a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
