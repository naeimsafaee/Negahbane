<div class="container-fluid">
    <img class="Ellipse1" src="assets/photo/Ellipse%202.png">
    <img class="Ellipse2" src="assets/photo/Ellipse%203.png">
    <div class="row man-row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <nav class="navigation flex-box">
                <a href="" class="flex-box">
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
                <div class="flex-box">
                    <div class="flex-box nav-menu ">

                        {{ menu('index-header','components.header-item') }}

                    </div>
                    <a class="account-item flex-box main-btn shrink" href="{{route('guard.index')}}">
                        <img src={{asset("assets/icon/acount.svg")}}>
                        <p>
                            حساب کاربری
                        </p>
                    </a>
                </div>
            </nav>
        </div>
