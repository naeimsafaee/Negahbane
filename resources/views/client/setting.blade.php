@extends('index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <div class="row">
                            <div class="padding-item col-lg-4 col-md-6 col-sm-4 col-12">
                                <a class=" setting-items shrink" href="{{ route('change_password') }}">
                                    <div class="flex-box inner-item">
                                        <img src="{{asset('assets/icon/pass-setting.svg')}}">
                                        <p>
                                            تغییر رمز عبور
                                        </p>
                                    </div>


                                </a>
                            </div>
                            <div class="padding-item col-lg-4 col-md-6 col-sm-4 col-12">
                                <a class=" setting-items shrink" href="{{ route('phone')  }}">
                                    <div class="flex-box inner-item">
                                        <img src="{{asset('assets/icon/manage-email.svg')}}">
                                        <p>
                                            مدیریت تلفن
                                        </p>
                                    </div>


                                </a>
                            </div>
                            <div class="padding-item col-lg-4 col-md-6 col-sm-4 col-12">
                                <a class=" setting-items shrink" href="{{ route('email') }}">
                                    <div class="flex-box inner-item">
                                        <img src="{{asset('assets/icon/email-setting.svg')}}">
                                        <p>
                                            مدیریت ایمیل
                                        </p>
                                    </div>


                                </a>
                            </div>
                            <div class="padding-item col-lg-4 col-md-6 col-sm-4 col-12">
                                <a class=" setting-items shrink" href="{{ route('telegram') }}">
                                    <div class="flex-box inner-item">
                                        <img src="{{asset('assets/icon/manag-telegram.svg')}}">
                                        <p>
                                            مدیریت بات تلگرام
                                        </p>
                                    </div>


                                </a>
                            </div>

                            <div class="padding-item col-lg-4 col-md-6 col-sm-4 col-12">
                                <a class=" setting-items shrink" href="{{ route('notification')  }}">
                                    <div class="flex-box inner-item">
                                        <img src="{{asset('assets/icon/manage-nitif.svg')}}">
                                        <p>
                                            مدیریت اطلاعیه ها
                                        </p>
                                    </div>


                                </a>
                            </div>

                        </div>

                    </div>
                    <div class="web-item col-lg-5 col-md-6 col-sm-12 flex-box">
                        <img class="Union" src="{{asset('assets/icon/Union.svg')}}">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
