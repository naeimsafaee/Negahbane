@extends('index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h5>
                                    تغییر رمز عبور
                                </h5>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <form action="{{ route('change_password.store') }}" method="POST" class="login">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-row">

                                                <input name="old_password" type="password" placeholder="رمز فعلی">
                                                @error('old_password')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror

                                                <br>

                                                <input name="new_password" type="password" placeholder="رمز جدید">
                                                @error('new_password')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror

                                                <br>

                                                <input name="re_new_password" type="password" placeholder="تکرار رمز جدید">
                                                @error('re_new_password')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button class="btn-icon flex-box main-btn shrink">
                                                <img src={{asset("assets/icon/send-code.svg")}}>
                                                تایید
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="web-item col-lg-6 col-md-6 col-sm-12 flex-box">
                        <img class=" Union" src={{asset("assets/icon/Union.svg")}}>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


