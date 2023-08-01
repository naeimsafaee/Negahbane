@extends('auth.index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="main-box login-form-details register-box">
            <h2 class="text-center">
                ثبت نام در نگهبان
            </h2>
            <form action="{{route('register')}}" method="POST" class="login">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-row">
                            <label>
                                ایمیل
                            </label>
                            <input class="input" type="email" id="email" name="email" :value="old('email')" required>
                            <img src={{asset("assets/icon/email.svg")}}>

                        </div>
                    </div>
                    @error('email')
                    <div class="p-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-row">
                            <label>
                                رمز عبور
                            </label>
                            <input class="pass input" type="password" id="password" name="password">
                            <img src={{asset("assets/icon/pass.svg")}}>

                        </div>
                    </div>
                    @error('password')
                    <div class="p-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-row">
                            <label>
                                تکرار رمز عبور
                            </label>
                            <input class="pass input" type="password" name="password_confirmation" id="password_confirmation">
                            <img src={{asset("assets/icon/pass.svg")}}>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button class="flex-box second-btn shrink" type="submit">
                            ثبت نام در نگهبان سایت
                        </button>
                    </div>
                </div>

            </form>
            <div class="line">

            </div>
            <a href="{{ route('login') }}" class="btn-icon flex-box main-btn shrink">
                <img src={{asset("assets/icon/key.svg")}}>
                ورود به حساب
            </a>
        </div>
    </div>
@endsection
