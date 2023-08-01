@extends('auth.index')

@section('content')



    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="main-box login-form-details">
            <h2 class="text-center">
                فراموشی رمز عبور
            </h2>
            <form method="POST" action="{{ route('forget') }}" class="login">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-row">
                            <label>
                                ایمیل
                            </label>
                            <input class="input" type="email" id="email" :value="old('email')" name="email" required>
                            <img src={{asset("assets/icon/email.svg")}}>
                        </div>
                    </div>
                    @error('email')
                    <div class="p-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button class="btn-icon flex-box main-btn shrink">
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
