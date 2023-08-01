<div class="col-lg-3 col-md-3 col-sm-6 col-12">
    <div class="package-item flex-box">
        @if($licence->id != \App\Models\Licence::all()->last()->id)
            <div class="lines"></div>
        @endif
        <div class="package-details flex-box">
            <div class="icon-box flex-box">
                <img src={{Voyager::image($licence->image)}}>
                @php
                    $clientLicence = \App\Models\Client::query()->findOrFail(auth()->guard('client')->id())->licence_id;
                @endphp
                @if($clientLicence == $licence->id)
                    <div class="active-package">
                        بسته فعال شما
                    </div>
                @endif
            </div>
            <h2>
                {{ $licence->title }}
            </h2>
            <ul>
                <li>
                    {{ fa_number($licence->sms) }} پیامک رایگان در ماه
                </li>
                <li>
                    {{ fa_number($licence->email) }} ایمیل رایگان در ماه
                </li>
                <li>
                    {{ fa_number($licence->website) }} سایت رایگان
                </li>
            </ul>
            @if($clientLicence != $licence->id)
                @if($licence->price != 0)
                    <img class="yearly-btn" src="{{ asset('assets/icon/yearly.svg') }}">
                    <h5>
                        {{ fa_number($licence->price) }}  تومان
                    </h5>
                @endif
            @endif
        </div>
        @if($clientLicence != $licence->id)
            @if($licence->state == "buy")
                <a class="flex-box main-btn shrink" href="{{ route('pay',$licence->id) }}">
                    پرداخت آنلاین
                </a>
            @elseif($licence->state == "call")
                <a class="flex-box main-btn shrink" href="{{ route('contact_us.index') }}">
                    تماس بگیرید
                </a>
            @endif
        @endif
    </div>
</div>
