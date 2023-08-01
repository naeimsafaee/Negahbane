@extends('layouts.main')
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
<div class="col-lg-12 col-md-12 col-sm-12">
    <footer class="footer flex-box ">
        <h5>
            کلیه حقوق مادی و معنوی برای نگهبان سایت محفوظ است
        </h5>
        <div class="footer-details">
            <a href="#" class="shrink footer-btn">
                <img src="assets/icon/google-play.svg">
            </a>
            <a href="#" class="shrink footer-btn">
                <img src="assets/icon/apple-store.svg">
            </a>

        </div>

    </footer>
</div>
</div>
</div>
@endsection
