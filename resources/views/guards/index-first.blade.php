@extends('index')
@section('style') @endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    <div class="center-div flex-box">
                        <img class="logo-icon" src="assets/photo/Union.png">
                        <h6>
                            شما هنوز نگهبان ایجاد نکردی
                        </h6>
                        <a class="btn-icon flex-box main-btn shrink" href="{{route('guard.create')}}">
                            <img src="assets/icon/send-code.svg">
                            اولین نگهبان رو بساز

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')@endsection
