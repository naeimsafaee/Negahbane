@extends('index')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    <div class="center-div flex-box">
                        <img class="logo-icon" src="{{ asset('assets/photo/Union.png') }}">
                        <h6 class="pay-done">
                            پرداخت با موفقیت انجام شد
                        </h6>
                        <a class="btn-icon flex-box main-btn shrink" href="intent://{{ $success === true ? "1" : "0" }}#Intent;scheme=negahbansite;package=karo.studio.negahbansite;end">
                            <img src="{{ asset('assets/icon/send-code.svg') }}">
                            بازگشت به اپلیکیشن
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
