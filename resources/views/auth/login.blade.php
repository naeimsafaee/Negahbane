@extends('auth.index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="main-box login-form-details">
            <h2 class="text-center">
                ورود به حساب کاربری
            </h2>
            <form method="POST" action="{{ route('login') }}" class="login">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-row">
                            <label>
                                ایمیل
                            </label>
                            <input class="input" type="email" id="email" value="{{old('email')}}" name="email" required>
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
                            <a class="forget-pass" href="{{ route('forget') }}">
                                فراموشی رمز عبور
                            </a>
                            <input class="input input-padding" class="pass" type="password" id="password" name="password">
                            <img src={{asset("assets/icon/pass.svg")}}>
                        </div>
                    </div>
                    @error('password')
                    <div class="p-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button class="btn-icon flex-box main-btn shrink">
                            <img src={{asset("assets/icon/key.svg")}}>
                            ورود به حساب
                        </button>
                    </div>
                </div>
            </form>
            <div class="line">

            </div>
            <a href="{{ route('register')  }}" class="flex-box second-btn shrink">
                ثبت نام در نگهبان سایت
            </a>
        </div>
    </div>


@endsection
