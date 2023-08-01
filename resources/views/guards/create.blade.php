@extends('index')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <form class="login" method="POST" action="{{ route('guard.store') }}" id="main_form" onsubmit="return send_monitor(event)">
                                    @csrf
                                    <div class="row">
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                            <div class=" input-row">
                                                <label>
                                                    نام سرویس
                                                </label>
                                                <input type="text" placeholder=" نام سرویس " id="title_of_service"
                                                       name="name">
                                                @error('name')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="row">
                                                <div class="padding-item col-lg-8 col-md-8 col-sm-9 col-12">
                                                    <div class=" input-row">
                                                        <label>
                                                            آدرس سرویس
                                                        </label>
                                                        <input type="text" placeholder=" آدرس سرویس "
                                                               id="destination_of_service"
                                                               name="destination">
                                                    </div>
                                                </div>
                                                @error('destination')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                                <div class="padding-item col-lg-4 col-md-4 col-sm-3 col-12">
                                                    <div class=" input-row">
                                                        <label>
                                                            پورت (اختیاری)
                                                        </label>
                                                        <input type="text" placeholder=" پورت " name="port"
                                                               id="port_of_service">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                            <p style="margin: 0 0 5px 0">
                                                در صورتی که مانیتور شما از نوع پینگ است از قرار دادن http و https در
                                                ابتدای آدرس خودداری نمایید.
                                            </p>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="row">
                                                <div class="padding-item col-lg-8 col-md-12 col-sm-6 col-12">
                                                    <div class=" input-row">
                                                        <label>
                                                            نوع مانیتور
                                                        </label>
                                                        <div id="monitor-btn" class="monitor-btn flex-box active"
                                                             onclick="$('#select_box').show(); $('#is_ping').val(-1)">
                                                            <img src={{asset("assets/icon/black-Union.svg")}}>
                                                            Request
                                                        </div>
                                                        <div class="monitor-btn flex-box"
                                                             onclick="$('#select_box').hide();  $('#is_ping').val(1)">
                                                            <img src={{asset("assets/icon/black-Union.svg")}}>
                                                            Ping
                                                        </div>
                                                    </div>
                                                    <input name="is_ping" value="-1" id="is_ping" type="hidden"/>
                                                </div>
                                                <div class="padding-item col-lg-4 col-md-12 col-sm-6 col-12"
                                                     id="select_box">
                                                    <div class=" input-row">
                                                        <label>
                                                            متود ریکوئست:
                                                        </label>
                                                        <div class="request-metod custom-selects">
                                                            <select id="method_select" name="request_type">
                                                                <option value="1" selected>GET</option>
                                                                <option value="1">GET</option>
                                                                <option value="2">POST</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                            <a id="setting-btn" class="flex-box  shrink">
                                                <div class="minus-plus flex-box">
                                                    <img src="{{ asset('assets/icon/minus.svg') }}">
                                                    <img class="minus" src="{{ asset('assets/icon/minus.svg') }}">
                                                </div>
                                                تنظیمات پیشرفته
                                            </a>
                                        </div>
                                        <div class="more-setting col-lg-12 col-md-12 col-sm-12">
                                            <div class="row ">
                                                <div class=" col-lg-12 col-md-12 col-sm-12">
                                                    <div class="row add-items-row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="row">
                                                                <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <div class=" input-row">
                                                                        <div class="row">
                                                                            <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                                                <label >
                                                                                    نوع مانیتور
                                                                                </label>

                                                                            </div>
                                                                            <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                                                                                <div class="check-box-row flex-box">
                                                                                    <div class="check-box flex-box">
                                                                                        <img src="{{ asset('assets/icon/check.svg') }}">
                                                                                    </div>
                                                                                    دنبال کردن ریدایرکت
                                                                                </div>
                                                                                <div class="check-box-row flex-box">
                                                                                    <div class="check-box flex-box">
                                                                                        <img src="{{ asset('assets/icon/check.svg') }}">
                                                                                    </div>
                                                                                    چک کردن SSL
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                            <h5>
                                                                هدر ارسالی
                                                            </h5>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="clear-row row">
                                                                <div class="padding-item col-lg-5 col-md-8 col-sm-5 col-12">
                                                                    <div class=" input-row">
                                                                        <label>
                                                                            کلید
                                                                        </label>
                                                                        <input class="clear-data header_key" type="text" placeholder="  api-key  ">
                                                                    </div>
                                                                </div>
                                                                <div class=" padding-item col-lg-7 col-md-4 col-sm-7 col-12">
                                                                    <img class="clear shrink" src="{{ asset('assets/icon/clear.svg') }}">
                                                                    <div class=" input-row">
                                                                        <label>
                                                                            مقدار
                                                                        </label>
                                                                        <input class="clear-data header_value" type="text" placeholder=" مقدار  ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" col-lg-12 col-md-12 col-sm-12">

                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                        <a id="add-items" class="setting-btn  shrink">
                                                            <img src="{{ asset('assets/icon/add.svg') }}">
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                            <button class="btn-icon flex-box main-btn shrink"
                                                    type="submit">
                                                <img src={{asset("assets/icon/send-code.svg")}}>
                                                ایجاد نگهبان
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="web-item col-lg-6 col-md-5 col-sm-12 flex-box">
                        <img class=" Union" src={{asset("assets/icon/Union.svg")}}>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(
            $('.monitor-btn').click(function() {
                $(".monitor-btn").removeClass('active');
                $(this).addClass('active');
            })
        );
        $(document).ready(
            $('.check-box-row').click(function() {
                $(".check-box-row").removeClass('active');
                $(this).addClass('active');
            })
        );

        $('#setting-btn').click(function() {
            $('.more-setting').toggle();
            $(this).toggleClass('active');
        });
        $("#add-items").click(function(){
            $(".add-items-row").append("<div class=\"col-lg-12 col-md-12 col-sm-12\">\n" +
                "                                                                <div class=\"clear-row row\">\n" +
                "                                                                    <div class=\"padding-item col-lg-5 col-md-8 col-sm-5 col-12\">\n" +
                "                                                                        <div class=\" input-row\">\n" +
                "                                                                            <label>\n" +
                "                                                                                کلید\n" +
                "                                                                            </label>\n" +
                "                                                                            <input class=\"clear-data\" type=\"text\" placeholder=\"  api-key  \">\n" +
                "                                                                        </div>\n" +
                "                                                                    </div>\n" +
                "                                                                    <div class=\" padding-item col-lg-7 col-md-4 col-sm-7 col-12\">\n" +
                "                                                                        <img class=\"clear shrink\" src=\"assets/icon/clear.svg\">\n" +
                "                                                                        <div class=\" input-row\">\n" +
                "                                                                            <label>\n" +
                "                                                                                مقدار\n" +
                "                                                                            </label>\n" +
                "                                                                            <input class=\"clear-data\" type=\"text\" placeholder=\" مقدار  \">\n" +
                "                                                                        </div>\n" +
                "                                                                    </div>\n" +
                "                                                                </div>\n" +
                "                                                            </div>");

            $('.clear').click(function() {
                $(this).parent().parent().parent().hide()
            })
        });
        $(document).ready(
            $('.clear').click(function() {
                $(this).parent().parent().parent().hide()
            })
        );
        let type = 1;

        function send_monitor(e) {

            e.preventDefault();
            document.getElementById("main_form").submit();
        }

        $('method_select').change(function () {
            type = $(this).find('option:selected').val();
        });

    </script>
@endsection
