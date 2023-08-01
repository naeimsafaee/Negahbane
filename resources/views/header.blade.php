<div class="container-fluid">
    <img class="Ellipse1" src={{asset("assets/photo/Ellipse%202.png")}}>
    <img class="Ellipse2" src={{asset("assets/photo/Ellipse%203.png")}}>
    <div class="overlay"></div>
    <div class="mobile-nav flex-box mobile-items">
        <img class="close" src={{asset("assets/icon/close.svg")}}>
        <a class="" href="{{route('setting')}}">تنظیمات</a>

        <a class="flex-box" href="{{route('licence.index')}}">
            ارتقا حساب
        </a>


        <a class="flex-box" href="{{ route('guard.index') }}">
            نگهبان ها
        </a>


        <a class="flex-box" href="{{ route('logout_client') }}">
            <img src={{asset("assets/icon/log-out.svg")}}>
            خروج از حساب
        </a>
    </div>
    <div class="row man-row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <nav class="navigation flex-box">
                <a href="@if(auth()->guard('client')->check()) {{ route('guard.index') }} @else {{ route('home') }} @endif"
                   class="flex-box">
                    <div class="logo">
                        <img src={{ Voyager::image(setting('site.logo')) }}>
                    </div>
                    <div class="logo-text">
                        <h2>
                            {{ setting('site.icon-title') }}
                        </h2>
                        <h6>
                            {{ setting('site.icon-desc') }}
                        </h6>
                    </div>

                </a>
                <a id="mobile-menu" class="flex-box">
                    <span></span>
                    <span></span>
                    <span></span>

                </a>
                @php
                    $s = $is_guest ?? -1;

                    if($s === -1){
                        $s = true;
                    } else {
                        $s = !$is_guest;
                    }

                @endphp

                @if($s)
                    <div class="flex-box nav-menu web-item">

                        {{ menu('header','components.header-item') }}
                        <form id="logout" method="POST" action="{{route('logout')}}">@csrf</form>

                        <a class="flex-box" href="{{ route('logout_client') }}"
                           onclick="this.preventDefault();document.getElementById('logout').submit();">
                            <img src={{asset("assets/icon/log-out.svg")}}>
                            خروج از حساب
                        </a>
                    </div>
                @endif
            </nav>
        </div>
