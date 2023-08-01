@extends('index')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p>
                                    {{ setting("site.how_telegram") }}
                                </p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="input-row">
                                            <label>
                                                کد تایید تلگرام
                                            </label>
                                            <input id="telegram_code" type="text" placeholder=" کد تایید تلگرام " required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button class="btn-icon flex-box main-btn shrink" type="submit" onclick="submit()">
                                            <img src="{{ asset('assets/icon/send-code.svg') }}">
                                            تایید نهایی
                                        </button>
                                    </div>
                                </div>

                                <span id="result" style="color: green;display: none">تلگرام شما با موفقیت متصل شد</span>
                            </div>
                        </div>

                    </div>
                    <div class="web-item col-lg-6 col-md-6 col-sm-12 flex-box">
                        <img class=" Union" src="{{ asset('assets/icon/Union.svg') }}">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>


        function submit() {
            console.log("submit");

            let telegram_code = $("#telegram_code").val();

            if (telegram_code.length === 0)
                return;

            let setting = {
                "code": telegram_code,
                "client_id": {{ auth()->guard('client')->user()->id }},
                "type": "Telegram"
            };

            $.ajax({
                "url": "{{ config('constants.NODE_API') }}client/notify",
                "method": "POST",
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "mimeType": "multipart/form-data",
                "data": setting
            }).done(function (response) {
                console.log(response);
                $("#result").text("تلگرام شما با موفقیت متصل شد").css("color" , "green").show();
            }).fail(function (err) {
                $("#result").text("کد تلگرام صحیح نمی باشد").css("color" , "red").show();
            });
            return false;

        }

    </script>

@endsection


