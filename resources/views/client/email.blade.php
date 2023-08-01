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
                                        تغییر ایمیل
                                    </h5>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <form action="{{ route('email.store') }}" method="POST" class="login">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="input-row">
                                                    <label>
                                                        ایمیل جدید
                                                    </label>
                                                    @if($client->email_verified_at)
                                                    <a class="forget-pass submit-number">
                                                        ایمیل {{ $client->email }} تایید شده
                                                    </a>
                                                    @else
                                                        <a class="forget-pass submit-number" style="color: red !important;">
                                                            ایمیل {{ $client->email }} تایید نشده
                                                        </a>
                                                    @endif

                                                    <input name="email" type="text" placeholder="ایمیل جدید">
                                                    @error('email')
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


