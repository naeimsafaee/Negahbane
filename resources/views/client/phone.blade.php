@extends('index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        @if(!$verify)

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h5>
                                        افزودن شماره موبایل
                                    </h5>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <form action=" {{route('phone.store')}} " method="POST" class="login">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="input-row">
                                                    <label id="label-phone">
                                                        شماره موبایل
                                                    </label>
                                                    <input id="phonenum" name="phone" maxlength="11" onkeydown="return ( event.ctrlKey || event.altKey
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9)
                    || (event.keyCode>34 && event.keyCode<40)
                    || (event.keyCode==46) )" type="text" placeholder="شماره موبایل">
                                                    @error('phone')
                                                    <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button class="btn-icon flex-box main-btn shrink">
                                                    <img src={{asset("assets/icon/send-code.svg")}}>
                                                    ارسال کد تایید
                                                </button>
                                                {{--                                        <div class="m-3">--}}
                                                {{--                                            <span @if($verify)class="text-success" @endif id="result">@if($verify)شماره شما تایید شده است. @endif</span>--}}
                                                {{--                                        </div>--}}
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        @else
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h5>
                                        تغییر شماره موبایل
                                    </h5>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <form action="{{ route('phone.store') }}" method="POST" class="login">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="input-row">
                                                    <label>
                                                        شماره موبایل جدید
                                                    </label>
                                                    @if($phone)
                                                        <a class="forget-pass submit-number">
                                                            موبایل {{ fa_number($phone) }} تایید شده
                                                        </a>
                                                    @endif
                                                    <input name="phone" maxlength="11" onkeydown="return ( event.ctrlKey || event.altKey
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9)
                    || (event.keyCode>34 && event.keyCode<40)
                    || (event.keyCode==46) )" type="text" placeholder=" شماره موبایل جدید">
                                                    @error('phone')
                                                    <span style="color: red">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button class="btn-icon flex-box main-btn shrink">
                                                    <img src={{asset("assets/icon/send-code.svg")}}>
                                                    ارسال کد تایید
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="web-item col-lg-6 col-md-6 col-sm-12 flex-box">
                        <img class=" Union" src={{asset("assets/icon/Union.svg")}}>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


