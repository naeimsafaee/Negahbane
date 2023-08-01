@extends('index')

@section('content')
    @if($errors->any())

    <div class="modal submit-massage" tabindex="-2" role="dialog" aria-labelledby="basicModal"
         aria-hidden="true" id="error_modal" style="display: block">

        <div id="modal-dialog2" class="modal-dialog">

            <!-- green-bg -->
            <div class="modal-content country-box submit-massage red-bg">

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="body-message ">
                        <img src="{{ asset('assets/icon/white-logo.svg') }}">
                        <h5 class="text-center">
                            {!! implode('', $errors->all('<span style="color: white">:message</span><br>'))  !!}
                            <br>
                        </h5>
                        <a data-dismiss="modal" class="close-massage" onclick="document.getElementById('error_modal').style.display='none';">
                            باشه
                        </a>
                    </div>
                </div>


            </div>


        </div>

    </div>
    @endif

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h5>
                                    تماس با ما
                                </h5>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <form action="{{ route('contact_us.store') }}" method="post" class="login" id="contact_form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-row">
                                                <label>
                                                    نام شما
                                                </label>
                                                <input type="text" placeholder="نام شما " name="name" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-row">
                                                <label>
                                                    ایمیل شما
                                                </label>
                                                <input type="text" placeholder=" ایمیل شما " name="email" value="{{ old('email') }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-row">
                                                <label>
                                                    توضیحات درخواست
                                                </label>
                                                <textarea name="description" type="text" placeholder=" توضیحات درخواست ">{{ old('description') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">

                                            <button type="button"  class="btn-icon flex-box main-btn shrink" onclick="document.getElementById('contact_form').submit(); return false;">
                                                <img src="{{asset('assets/icon/send-code.svg')}}">
                                                ارسال پیام
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
