@extends('index')

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
                                        "monitor_id": selected_row,
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

    <div class="modal negahban-modal" tabindex="-2" role="dialog" aria-labelledby="basicModal"
         aria-hidden="true">

        <div class="modal-dialog">

            <!-- Modal Content: begins -->
            <div class="modal-content country-box">

                <!-- Modal Header -->


                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="body-message">
                        <div class="massage">
                            در بسته فعلی شما فقط {{ fa_number($licence->website) }} سایت میتوانید اضافه کنید برای افزودن
                            سایت جدید
                            بسته نگهبان خود را ارتقا دهید.
                        </div>

                        @each('components.licence_1' , \App\Models\Licence::query()->where('state' , 'buy')->get() , 'licence')

                    </div>
                </div>
                <button type="button" class="web close-item" data-dismiss="modal"><img
                        src="assets/icon/modal-close.svg">
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
                        <div class="row title-row" id="main_row_of_page">
                            <div class="massage-row flex-box col-lg-7 col-md-6 col-sm-12">
                                <div class="image-box flex-box">
                                    <img src="{{ asset('assets/icon/Union.svg') }}">
                                </div>
                                <div>
                                    <h2 id="state_all">

                                    </h2>
                                    <p>
                                        {{ $count }} سایت فعال
                                        از {{ auth()->guard('client')->user()->licence->website  }} سایت
                                        دارید
                                    </p>
                                </div>
                            </div>
                            <div class="web-item col-lg-5 col-md-6 col-sm-12">
                                <img class="title-massage" src="assets/photo/massage.svg">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row search-row">
                            <div class="col-lg-7 col-md-6 col-sm-12">
                                <a @if($count >= $licence->website) data-toggle="modal" data-target=".negahban-modal"
                                   @endif
                                   class="btn-icon flex-box main-btn shrink" href="{{ route('guard.create') }}">
                                    <img src="assets/icon/send-code.svg">
                                    افزودن نگهبان جدید
                                </a>
                            </div>

                            <div class="col-lg-5 col-md-6 col-sm-12" id="row_of_search">
                                <form>
                                    <div class="input-row">
                                        <img src="assets/icon/search.svg">
                                        <input oninput="get_monitors()" id="name_of_monitor"
                                               placeholder="جستجو در نگهبان ها" type="text">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12" id="row_of_data">
                        <table>
                            <thead>
                            <tr>
                                <th width="15%"> نام سرویس</th>
                                <th width="15%">دامین یا ip</th>
                                <th width="15%">وضعیت سرویس</th>
                                <th width="15%"> تعداد دان تایم</th>
                                <th class="space"></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="table_of_content">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        let selected_row = -1;

        function get_monitors() {

            console.log("getting monitors");

            $.ajax({
                "url": "{{ route('monitor.index') }}",
                "method": "GET",
                'headers': {
                    'Authorization': 'Bearer {{ $token }}'
                },
                "data": {
                    "search": $("#name_of_monitor").val(),
                },
                "mimeType": "multipart/form-data",
            }).done(function (response) {
                // $("#table_of_content").empty();

                response = JSON.parse(response).data;
                // console.log(response);

                if (response.length === 0) {
                    $("#row_of_data").hide();
                    // $("#row_of_search").hide();
                } else {
                    $("#row_of_data").show();
                    $("#row_of_search").show();
                }

                let bad_state = 0;
                let template = "";

                for (let i = 0; i < response.length; i++) {

                    const monitor = response[i];

                    // console.log(monitor.status);

                    monitor.destination = monitor.destination.replace("https://", "");
                    monitor.destination = monitor.destination.replace("http://", "");

                    let status = -1;

                    if (monitor.info.last_log == null)
                        status = "چک نشده";
                    else if (monitor.info.last_log.status === 0) {
                        status = "حالش خرابه";
                        bad_state++;
                    } else if (monitor.info.last_log.status === 1){
                        if(monitor.info.last_log.is_alive){
                            status = "حالش خوبه";
                        } else {
                            status = "حالش خرابه";
                            bad_state++;
                        }
                    }

                    // console.log(monitor.destination.substr(-1));

                    if(monitor.destination.substr(-1) === "/"){
                        monitor.destination = monitor.destination.substr(0 , monitor.destination.length - 1);
                    }

                    template += `<tr class="${monitor.info.last_log == null ? '' : (monitor.info.last_log.is_alive ? '' : 'damage-tr')}">
                                <td width="15%" aria-label="نام سرویس">
                                    <img src="${monitor.info.last_log == null ? 'assets/icon/little-logo.svg' : (monitor.info.last_log.is_alive ?  'assets/icon/little-logo.svg' : 'assets/icon/damage-logo.svg')}">
                                    ${monitor.name}
                                </td>
                                <td width="15%" aria-label="دامین یا ip">${monitor.destination}</td>
                                <td class="${monitor.info.last_log == null ? 'green' : (monitor.info.last_log.is_alive? 'green' : 'red')}" width="15%" aria-label="وضعیت سرویس">${status}</td>
                                <td width="15%" aria-label="تعداد دان تایم">${monitor.info.down_times.length}</td>
                                <td class="space"></td>
                                <td aria-label="کپی لینک">
                                    <a class="shrink flex-box copy-link" onclick="copyToClipboard('{{ route('guard') }}/${monitor.link}')">
                                        <img src="assets/icon/copy-link.svg">
                                        کپی لینک
                                    </a>
                                </td>
                                ${
                        monitor.is_locked ?
                            `<td aria-label="وضعیت"><a class="shrink flex-box lock-item" href="{{ route('remove_password') }}/${monitor.id}"><img src="{{ asset('assets/icon/lock.svg') }}">قفل</a></td>`
                            :
                            `<td data-toggle="modal" data-target=".lock-modal" aria-label="وضعیت" onclick="select_row(${monitor.id})"><a class="shrink flex-box unlock-item" href="#"><img src="{{ asset('assets/icon/unlock.svg') }}">آزاد</a></td>`
                    }

                                <td aria-label="مشاهده سرویس">
                                    <a class="shrink flex-box see-service" href="{{ route('guard') }}/${monitor.id}">
                                        <img src="assets/icon/see-service.svg">
                                        مشاهده سرویس
                                    </a>
                                </td>
                            </tr>`;


                }

                $("#table_of_content").html(template);


                if (bad_state > 1) {
                    $("#state_all").text("حال چنتا نگهبان خوب نیست");
                    $("#main_row_of_page").addClass("error-title-row");
                } else if (bad_state > 0) {
                    $("#state_all").text("یکی حالش خرابه");
                    $("#main_row_of_page").addClass("error-title-row");
                } else {
                    $("#state_all").text("تا حالا خاموشی نداشتیم");
                    $("#main_row_of_page").removeClass("error-title-row");
                }

            });

        }

        function select_row(id) {
            selected_row = id;
        }

        get_monitors();

        setInterval(get_monitors,
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

