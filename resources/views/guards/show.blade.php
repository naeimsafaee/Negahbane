@extends('index')

@section('style')
    <script src="{{ asset('assets/js/chart.js') }}"></script>
@endsection

@section('content')

    <div class="modal lock-modal" tabindex="-2" role="dialog" aria-labelledby="basicModal"
         aria-hidden="true">

        <div id="modal-dialog2" class="modal-dialog">

            <!-- Modal Content: begins -->
            <div class="modal-content country-box">

                <!-- Modal Header -->


                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="body-message">
                        <div class="row">
                            <div class="input-row">
                                <label>
                                    یه پسورد انتخاب کن لینک رو خصوصی کن
                                </label>
                                <input class="input" placeholder="" id="password" type="password">
                            </div>
                            <button class="btn-icon flex-box main-btn shrink" onclick="set_password()">
                                <img src="{{ asset('assets/icon/white-lock.svg') }}">
                                قفل کن
                            </button>
                            <span id="response" style="color: green">
                            </span>

                        </div>
                        <script>

                            function set_password() {

                                let password = $("#password").val();

                                if (password.length === 0)
                                    return;

                                $.ajax({
                                    "url": "{{ route('set_password') }}",
                                    "method": "POST",
                                    "data": {
                                        "password": password,
                                        "monitor_id": {{ $monitor->id }},
                                        "_token": "{{ csrf_token() }}",
                                    },
                                }).done(function (response) {
                                    $("#response").text("رمز عبور با موفقیت ست شد و نگهبان شما قفل شد");
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1000)
                                });
                            }

                        </script>
                    </div>
                </div>
                <button type="button" class="web close-item" data-dismiss="modal"><img
                        src="{{ asset('assets/icon/modal-close.svg') }}">
                    <span>بستن</span>
                </button>

            </div>


        </div>

    </div>

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row title-row " id="title_row_name">
                            <div class="massage-row flex-box col-lg-7 col-md-6 col-sm-12">
                                <div class="image-box flex-box">
                                    <img src={{asset("assets/icon/Union.svg")}}>
                                </div>
                                <div>
                                    <h2 id="status_of_monitor">

                                    </h2>
                                    <p id="downtime_off">

                                    </p>
                                </div>
                            </div>
                            <div class="web-item col-lg-5 col-md-6 col-sm-12">
                                <img class="title-massage" src={{asset("assets/photo/massage.svg")}}>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="flex-box monitoring-row">
                            <p id="date_text">

                            </p>

                            <div class="monitoring-details">

                                @if(!$is_guest)

                                    <span><a class="shrink flex-box see-service"
                                             href="{{ route('delete_guard' , $monitor->id) }}">
                                        <img src="{{ asset('assets/icon/delete.svg') }}">حذف</a>
                                </span>

                                    <span aria-label="کپی لینک">
                                    <a class="shrink flex-box copy-link"
                                       onclick="copyToClipboard('{{ route('guard' , $monitor->link) }}')">
                                        <img src="{{ asset('assets/icon/copy-link.svg') }}">
                                        کپی لینک
                                    </a>
                                </span>
                                    @if($monitor->is_locked)
                                        <span><a class="shrink flex-box lock-item" href="{{ route('remove_password' , $monitor->id) }}"><img
                                                    src="{{ asset('assets/icon/lock.svg') }}">قفل</a></span>
                                    @else
                                        <span data-toggle="modal" data-target=".lock-modal" aria-label="وضعیت"><a
                                                class="shrink flex-box unlock-item" href="#"><img
                                                    src="{{ asset('assets/icon/unlock.svg') }}">آزاد</a></span>
                                    @endif
                                @endif


                                <h6 id="monitor_name" style="margin-right: 10px">
                                </h6>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="padding-item col-lg-4 col-md-5 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="statius-item">
                                            <p>
                                                وضعیت آپ تایم
                                            </p>
                                            <div class="line"></div>
                                            <div class="flex-box">
                                                <h6>
                                                    ۲۴ ساعت گذشته
                                                </h6>
                                                <h6 class="green" id="percent_of_24_hour">
                                                </h6>
                                            </div>
                                            <div class="flex-box">
                                                <h6>
                                                    ۷ روز گذشته
                                                </h6>
                                                <h6 class="green" id="percent_of_7_days">
                                                </h6>
                                            </div>
                                            <div class="flex-box">
                                                <h6>
                                                    ۳۰ روز گذشته
                                                </h6>
                                                <h6 class="green" id="percent_of_30_days">
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="statius-item" id="downtimes">
                                            <p>
                                                آرشیو آخرین دان تایم ها
                                            </p>
                                            <div class="line"></div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="padding-item col-lg-8 col-md-7 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="flex-box details-title">
                                            <h2>Uptime</h2>
                                            <p>
                                                در ۲۴ ساعت گذشته
                                            </p>
                                        </div>
                                        <div class="Uptime-row" id="uptime_row">

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="flex-box details-title">
                                            <h2 id="ping_in_24"></h2>
                                            <p>
                                                در ۲۴ ساعت گذشته
                                            </p>
                                        </div>
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');

        function get_monitor() {
            console.log("getting monitor");

            $.ajax({
                "url": "{{ config('constants.NODE_API') }}monitor/{{ $monitor->id }}",
                "method": "GET",
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "mimeType": "multipart/form-data",
            })
                .done(function (response) {
                    // console.log(response);
                    response = JSON.parse(response);

                    set_data(response);

                })
                .fail(function (data, textStatus, xhr) {
                    console.log("error", data.status);
                    if (data.status === 403) {
                        window.location = "{{ route('guard') }}";
                    }
                });

        }

        function initial_chart(_data) {

            // console.log(_data);

            var myChart = new Chart(ctx, {
                type: 'line',

                data: {
                    labels: [1, 5, 10, 15, 20, 25, 30],
                    datasets: [{
                        pointBorderWidth: 0,
                        pointHoverRadius: 0,
                        pointRadius: 0,
                        label: '', // Name the series
                        data: _data, // Specify the data values array
                        fill: false,
                        borderColor: '#FF3A44', // Add custom color border (Line)
                        backgroundColor: '#FF3A44', // Add custom color background (Points and Fill)
                        borderWidth: 4 // Specify bar border width
                    }]
                },
                options: {
                    scales:
                        {
                            responsive: true,
                            maintainAspectRatio: false,
                            xAxes: [{
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    beginAtZero: false,
                                    fontSize: 14,
                                    fontColor: '#919191',
                                    padding: 10,
                                },
                            }],
                            yAxes: [{
                                gridLines: {
                                    drawBorder: false,
                                },
                                ticks: {
                                    beginAtZero: false,
                                    fontSize: 0,
                                    fontColor: '#fff',
                                    maxTicksLimit: 5,
                                    padding: 0,
                                }
                            }],
                        },
                    legend: {
                        display: false
                    },
                    responsive: true, // Instruct chart js to respond nicely.
                    maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height
                }
            });
        }

        const e2p = s => s.replace(/\d/g, d => '۰۱۲۳۴۵۶۷۸۹'[d])

        function set_data(response) {
            const monitor = {!! $monitor !!};

            const url = monitor.destination.replace("https://", "").replace("http://", "").replace("/" , "");

            $("#date_text").text("تاریخ شروع مانیتور {{ $monitor->shamsi_date }}")
            $("#monitor_name").text(url);


            if (response.status_in_last_log == null) {

            } else {
                const status = response.status_in_last_log.status;
                if (response.status_in_last_log.is_alive) {
                    $("#status_of_monitor").text('حالش خوبه دان تایم نداریم');
                } else {
                    $("#title_row_name").addClass('error-title-row');
                    $("#status_of_monitor").text('حالش خوب نیست دان تایم داریم');
                }
            }


            $("#ping_in_24").text(response.average_ping_in_24 + " ms");

            if (response.last_down_time) {
                $("#downtime_off").text(`آخرین خاموشی در تاریخ ${response.last_down_time.shamsi_date} در ساعت ${response.last_down_time.shamsi_time}`);
            } else {
                $("#downtime_off").text('دان تایم نداشتیم');
            }


            const down_times = response.down_times;

            $("#downtimes").empty();

            $("#downtimes").append(`
             <p>
                آرشیو آخرین دان تایم ها
             </p>
                <div class="line"></div>`
            );

            if (down_times.length === 0) {
                $("#downtimes").append(`<h6>تاکنون رکوردی از دان تایم ثبت نشده</h6>`).hide().fadeIn(300);
            }

            for (let i = 0; i < down_times.length; i++) {

                const template = `  <div class="flex-box"><h6>
                                            ${down_times[i].shamsi_date}
                                        </h6></div>`;

                $("#downtimes").append(template).hide().fadeIn(300);
            }


            const _24_hour = response._24_hour;

            let average = 0;

            $("#uptime_row").empty();

            for (let i = 0; i < _24_hour.length; i++) {

                const time = _24_hour[i].shamsi_time.split(" ");

                const template = `<span class="${_24_hour[i].is_alive ? 'green' : 'red'}" tooltip="${time} ساعت " flow="up"></span>`;

                $("#uptime_row").append(template).hide().fadeIn(300);

                if (_24_hour[i].is_alive)
                    average++;
            }

            if (_24_hour.length != 0)
                $("#percent_of_24_hour").text(e2p((average / _24_hour.length * 100).toFixed(2) + "") + "%");
            else
                $("#percent_of_24_hour").text(e2p("0") + "%");

            $("#percent_of_7_days").text(e2p(response.average_7_day + "") + "%");
            $("#percent_of_30_days").text(e2p(response.average_30_day + "") + "%");

            initial_chart(response._5_days);
        }

        set_data({!! $body !!});

        get_monitor();

        setInterval(get_monitor,
            3 * 60 * 1000);


        function copyToClipboard(text) {
            var dummy = document.createElement("textarea");
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
        }

    </script>
@endsection
