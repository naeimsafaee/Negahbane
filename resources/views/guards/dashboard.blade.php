@extends('layouts.main')
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
                            <form>
                                <div class="input-row">
                                    <label>
                                        یه پسورد انتخاب کن لینک رو خصوصی کن
                                    </label>
                                    <input class="input" placeholder="" type="password">
                                </div>
                                <button class="btn-icon flex-box main-btn shrink">
                                    <img src="assets/icon/white-lock.svg">
                                    قفل کن
                                </button>
                            </form>


                        </div>


                    </div>
                </div>
                <button type="button" class="web close-item" data-dismiss="modal"><img src="assets/icon/modal-close.svg">
                    <span>بستن</span>
                </button>

            </div>


        </div>

    </div>
    <div class="modal negahban-modal" tabindex="-2" role="dialog" aria-labelledby="basicModal"
         aria-hidden="true">

        <div  class="modal-dialog">

            <!-- Modal Content: begins -->
            <div class="modal-content country-box">

                <!-- Modal Header -->


                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="body-message">
                        <div class="massage">
                            در بسته فعلی شما فقط ۱ سایت میتوانید اضافه کنید برای افزودن سایت جدید بسته نگهبان خود را ارتقا دهید.
                        </div>
                        <a href="#"  class="flex-box items">
                            <div class="flex-box">
                                <div class="icon-box flex-box">
                                    <img src="assets/icon/green-logo.svg">
                                </div>
                                <div >
                                    <h2>
                                        نگهبان سبز
                                    </h2>
                                    <p>
                                        ۱۰۰ پیامک در ماه
                                    </p>
                                </div>

                            </div>
                            <div class="items-details">
                                <img class="yearly" src="assets/icon/yearly.svg">
                                <h5>
                                    ۴۳ هزار تومان
                                </h5>
                            </div>

                        </a>
                        <a href="#"  class="flex-box items">
                            <div class="flex-box">
                                <div class="icon-box flex-box">
                                    <img src="assets/icon/blue-logo.svg">
                                </div>
                                <div >
                                    <h2>
                                        نگهبان آبی
                                    </h2>
                                    <p>
                                        ۱۰۰ پیامک در ماه
                                    </p>
                                </div>

                            </div>
                            <div class="items-details">
                                <img class="yearly" src="assets/icon/yearly.svg">
                                <h5>
                                    ۴۳ هزار تومان
                                </h5>
                            </div>

                        </a>
                    </div>
                </div>
                <button type="button" class="web close-item" data-dismiss="modal"><img src="assets/icon/modal-close.svg">
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
                    <div class="row title-row">
                        <div class="massage-row flex-box col-lg-7 col-md-6 col-sm-12">
                            <div class="image-box flex-box">
                                <img src="assets/icon/Union.svg">
                            </div>
                            <div>
                                <h2>
                                    حال همه چی خوبه
                                </h2>
                                <p>
                                    ۴۲ سایت فعال از ۱۰۰  سایت دارید
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
                            <a data-toggle="modal" data-target=".negahban-modal"  class="btn-icon flex-box main-btn shrink">
                                <img src="assets/icon/send-code.svg">
                                افزودن نگهبان جدید

                            </a>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <form>
                                <div class="input-row">
                                    <img src="assets/icon/search.svg">
                                    <input placeholder="جستجو در نگهبان ها" type="text">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <table>
                        <thead>
                        <tr>
                            <th width="15%"> نام سرویس</th>
                            <th  width="15%">دامین یا ip</th>
                            <th  width="15%">وضعیت سرویس</th>
                            <th  width="15%"> تعداد دان تایم </th>
                            <th class="space"> </th>
                            <th> </th>
                            <th> </th>
                            <th>  </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td width="15%" aria-label="نام سرویس">
                                <img  src="assets/icon/little-logo.svg">
                                کارو استودیو
                            </td>
                            <td width="15%" aria-label="دامین یا ip">karo.studio</td>
                            <td class="green" width="15%" aria-label="وضعیت سرویس">حالش خوبه</td>
                            <td width="15%" aria-label="تعداد دان تایم">۲۴ بار </td>
                            <td class="space"></td>
                            <td aria-label="کپی لینک">
                                <a class="shrink flex-box copy-link" href="#">
                                    <img src="assets/icon/copy-link.svg">
                                    کپی لینک
                                </a>
                            </td>

                            <td aria-label="وضعیت">
                                <a data-toggle="modal" data-target=".lock-modal" class="shrink flex-box lock-item" href="#">
                                    <img src="assets/icon/lock.svg">
                                    قفل
                                </a>
                            </td>
                            <td aria-label="مشاهده سرویس">
                                <a class="shrink flex-box see-service" href="#">
                                    <img src="assets/icon/see-service.svg">
                                    مشاهده سرویس
                                </a>
                            </td>
                        </tr>
                        <tr class="damage-tr">
                            <td width="15%" aria-label="نام سرویس">
                                <img  src="assets/icon/damage-logo.svg">
                                کارو استودیو
                            </td>
                            <td width="15%" aria-label="دامین یا ip">karo.studio</td>
                            <td class="red" width="15%" aria-label="وضعیت سرویس">حالش خرابه</td>
                            <td width="15%" aria-label="تعداد دان تایم">۲۴ بار </td>
                            <td class="space"></td>
                            <td aria-label="کپی لینک">
                                <a class="shrink flex-box copy-link" href="#">
                                    <img src="assets/icon/copy-link.svg">
                                    کپی لینک
                                </a>
                            </td>
                            <td data-toggle="modal" data-target=".lock-modal" aria-label="وضعیت">
                                <a class="shrink flex-box unlock-item" href="#">
                                    <img src="assets/icon/unlock.svg">
                                    آزاد
                                </a>
                            </td>
                            <td aria-label="مشاهده سرویس">
                                <a class="shrink flex-box see-service" href="#">
                                    <img src="assets/icon/see-service.svg">
                                    مشاهده سرویس
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%" aria-label="نام سرویس">
                                <img  src="assets/icon/little-logo.svg">
                                کارو استودیو
                            </td>
                            <td width="15%" aria-label="دامین یا ip">karo.studio</td>
                            <td class="green" width="15%" aria-label="وضعیت سرویس">حالش خوبه</td>
                            <td width="15%" aria-label="تعداد دان تایم">۲۴ بار </td>
                            <td class="space"></td>
                            <td aria-label="کپی لینک">
                                <a class="shrink flex-box copy-link" href="#">
                                    <img src="assets/icon/copy-link.svg">
                                    کپی لینک
                                </a>
                            </td>
                            <td aria-label="وضعیت">
                                <a data-toggle="modal" data-target=".lock-modal" class="shrink flex-box unlock-item" href="#">
                                    <img src="assets/icon/unlock.svg">
                                    آزاد
                                </a>
                            </td>
                            <td aria-label="مشاهده سرویس">
                                <a class="shrink flex-box see-service" href="#">
                                    <img src="assets/icon/see-service.svg">
                                    مشاهده سرویس
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%" aria-label="نام سرویس">
                                <img  src="assets/icon/little-logo.svg">
                                کارو استودیو
                            </td>
                            <td width="15%" aria-label="دامین یا ip">karo.studio</td>
                            <td class="green" width="15%" aria-label="وضعیت سرویس">حالش خوبه</td>
                            <td width="15%" aria-label="تعداد دان تایم">۲۴ بار </td>
                            <td class="space"></td>
                            <td aria-label="کپی لینک">
                                <a class="shrink flex-box copy-link" href="#">
                                    <img src="assets/icon/copy-link.svg">
                                    کپی لینک
                                </a>
                            </td>
                            <td aria-label="وضعیت">
                                <a data-toggle="modal" data-target=".lock-modal" class="shrink flex-box unlock-item" href="#">
                                    <img src="assets/icon/unlock.svg">
                                    آزاد
                                </a>
                            </td>
                            <td aria-label="مشاهده سرویس">
                                <a class="shrink flex-box see-service" href="#">
                                    <img src="assets/icon/see-service.svg">
                                    مشاهده سرویس
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%" aria-label="نام سرویس">
                                <img  src="assets/icon/little-logo.svg">
                                کارو استودیو
                            </td>
                            <td width="15%" aria-label="دامین یا ip">karo.studio</td>
                            <td class="green" width="15%" aria-label="وضعیت سرویس">حالش خوبه</td>
                            <td width="15%" aria-label="تعداد دان تایم">۲۴ بار </td>
                            <td class="space"></td>
                            <td aria-label="کپی لینک">
                                <a class="shrink flex-box copy-link" href="#">
                                    <img src="assets/icon/copy-link.svg">
                                    کپی لینک
                                </a>
                            </td>
                            <td aria-label="وضعیت">
                                <a data-toggle="modal" data-target=".lock-modal" class="shrink flex-box unlock-item" href="#">
                                    <img src="assets/icon/unlock.svg">
                                    آزاد
                                </a>
                            </td>
                            <td aria-label="مشاهده سرویس">
                                <a class="shrink flex-box see-service" href="#">
                                    <img src="assets/icon/see-service.svg">
                                    مشاهده سرویس
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%" aria-label="نام سرویس">
                                <img  src="assets/icon/little-logo.svg">
                                کارو استودیو
                            </td>
                            <td width="15%" aria-label="دامین یا ip">karo.studio</td>
                            <td class="green" width="15%" aria-label="وضعیت سرویس">حالش خوبه</td>
                            <td width="15%" aria-label="تعداد دان تایم">۲۴ بار </td>
                            <td class="space"></td>
                            <td aria-label="کپی لینک">
                                <a class="shrink flex-box copy-link" href="#">
                                    <img src="assets/icon/copy-link.svg">
                                    کپی لینک
                                </a>
                            </td>
                            <td aria-label="وضعیت">
                                <a data-toggle="modal" data-target=".lock-modal" class="shrink flex-box unlock-item" href="#">
                                    <img src="assets/icon/unlock.svg">
                                    آزاد
                                </a>
                            </td>
                            <td aria-label="مشاهده سرویس">
                                <a class="shrink flex-box see-service" href="#">
                                    <img src="assets/icon/see-service.svg">
                                    مشاهده سرویس
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%" aria-label="نام سرویس">
                                <img  src="assets/icon/little-logo.svg">
                                کارو استودیو
                            </td>
                            <td width="15%" aria-label="دامین یا ip">karo.studio</td>
                            <td class="green" width="15%" aria-label="وضعیت سرویس">حالش خوبه</td>
                            <td width="15%" aria-label="تعداد دان تایم">۲۴ بار </td>
                            <td class="space"></td>
                            <td aria-label="کپی لینک">
                                <a class="shrink flex-box copy-link" href="#">
                                    <img src="assets/icon/copy-link.svg">
                                    کپی لینک
                                </a>
                            </td>
                            <td aria-label="وضعیت">
                                <a data-toggle="modal" data-target=".lock-modal" class="shrink flex-box unlock-item" href="#">
                                    <img src="assets/icon/unlock.svg">
                                    آزاد
                                </a>
                            </td>
                            <td aria-label="مشاهده سرویس">
                                <a class="shrink flex-box see-service" href="#">
                                    <img src="assets/icon/see-service.svg">
                                    مشاهده سرویس
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="panigation">
                        <div class=" refrence">
                            8 of 3012.
                        </div>
                        <a class="Ellipse active">
                            1
                        </a>
                        <a class="Ellipse">
                            2
                        </a>
                        <a class="Ellipse ">
                            3
                        </a>
                        <a class="Ellipse">
                            ...
                        </a>
                        <div class="Ellipse custom-selects" >
                            <select>
                                <option value="0">8</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                    </div>
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
