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
                                تعیین وضعیت اطلاعیه ها
                            </h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <form class="login">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="flex-box notif-items">
                                            <p>دریافت اطلاعیه از ایمیل</p>
                                            <label class="switch">
                                                <input id="emailinput" hidden type="checkbox"  @if($user->notif_email)checked @endif />
                                                <span class="slider round "></span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="flex-box notif-items">
                                            <p> دریافت اطلاعیه پیامکی</p>
                                            <label class="switch" >
                                                <input id="smsinput" hidden type="checkbox" @if($user->notif_sms) checked @endif/>
                                                <span class="slider round"></span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button class="btn-icon flex-box main-btn shrink" onclick="changeNotif(event)">
                                            <img src={{asset("assets/icon/send-code.svg")}}>
                                            ثبت تغییرات
                                        </button>
                                        <div class=" p-3">
                                            <span class="text-success" id="result"></span>
                                        </div>
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
@section('script')
    <script>
        function changeNotif(event) {
            event.preventDefault();

            $("#result").removeClass().text('');

            let sms = $('#smsinput').is(":checked") ? 1 : 0;
            let email = $('#emailinput').is(":checked") ? 1 : 0;

            $.ajax('{{route('notification.update')}}', {
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    sms: sms,
                    email: email
                },
                success: function (data) {

                    // data = JSON.parse(data);

                    if(data.message){
                        $("#result").addClass('text-danger').html('لطفا ابتدا شماره تلفن خود را وارد نمایید.' + '<a style="margin-right: 5px" href="{{ route('phone') }}">اضافه کردن شماره تلفن</a>');
                        $('#smsinput').prop('checked', false);
                    } else {
                        $("#result").addClass('text-success').text('اطلاعات با موفقیت بروز شد.');
                    }

                },
                error: function (xhr, textStatus, errorThrown) {
                    $("#result").addClass('text-danger').text("اطلاعات وارد شده معتبر نیست.");
                },
            });
        }
    </script>

@endsection
