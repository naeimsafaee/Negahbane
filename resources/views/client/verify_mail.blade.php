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
                                    کد تایید ایمیل خود را وارد کنید
                                </h5>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <form  class="login" method="post" action="{{ route('email_verify_submit') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-row">
                                                <label>
                                                    کد تایید
                                                </label>
                                                <input type="text" placeholder=" کد تایید " name="code">
                                            </div>
                                        </div>
                                        @error('code')
                                        <span style="color: red">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button class="btn-icon flex-box main-btn shrink">
                                                <img src="{{asset('assets/icon/send-code.svg')}}">
                                                تایید نهایی
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="web-item col-lg-6 col-md-6 col-sm-12 flex-box">
                        <img class=" Union" src="{{asset('assets/icon/Union.svg')}}">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
