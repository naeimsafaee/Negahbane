@extends('index')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    <div class="center-div profile-pass flex-box">
                        <img class="view-pass" src="{{ asset('assets/photo/pass.svg') }}">
                        <h1>
                            karo.studio
                        </h1>
                        <div class="line"></div>
                        <h5>
                            این صفحه محدود شده رمز عبور را وارد کنید
                        </h5>
                        <form action="{{ route('unlock') }}" method="POST" id="main_form">
                            @csrf
                            <div class="input-row">
                                <input class="pass" type="password" name="password" id="password" required>
                                <input class="pass" type="hidden" name="guard_id" value="{{ $monitor_id }}">
                            </div>
                            @error('password')
                                <span>{{ $message }}</span>
                            @enderror
                        </form>
                        <a class="btn-icon flex-box main-btn shrink" onclick="check_password()">
                            <img src="{{ asset('assets/icon/change-pass.svg') }}">
                            ورود به صفحه

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>

        const guard_id = "{{ $id }}";

        function check_password(){

            const password = document.getElementById('password').value;

            if(password.length === 0)
                return;

            document.getElementById('main_form').submit();

        }


    </script>

@endsection

