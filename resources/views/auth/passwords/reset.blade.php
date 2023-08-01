@extends('auth.index')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="main-box login-form-details">
            <h2 class="text-center">
                فراموشی رمز عبور
            </h2>
            <form method="POST" action="{{ route('forget_password') }}" class="login">
                @csrf
                <div class="row">
                    <input type="hidden" name="reset_link" value="{{ $reset_link }}">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-row">
                            <label>
                                رمز جدید
                            </label>
                            <input class="input" type="password" id="password" value="{{old('password')}}" name="password" >
                            <img src={{asset("assets/icon/email.svg")}}>
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
تکرار رمز جدید
                            </label>
                            <input class="input" type="password" id="password2" value="{{old('password')}}" name="password2" >
                            <img src={{asset("assets/icon/email.svg")}}>
                        </div>
                    </div>
                    @error('password2')
                    <div class="p-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button class="btn-icon flex-box main-btn shrink" type="submit">
                            <img src={{asset("assets/icon/key.svg")}}>
                            تایید
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.error-message').css("transform", "translateY(0%)")

            }, 1000);
        });
        $('.error-message').click(function () {
            $('.error-message').css("transform", "translateY(-250%)")

        });
    </script>
@endsection
