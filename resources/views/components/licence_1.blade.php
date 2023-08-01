
<a href="{{ route('pay',$licence->id) }}" class="flex-box items">
    <div class="flex-box">
        <div class="icon-box flex-box">
            <img src="{{ Voyager::image($licence->image) }}">
        </div>
        <div>
            <h2>
                {{ $licence->title }}
            </h2>
            <p>
                {{ fa_number($licence->website) }} پیامک در ماه
            </p>
        </div>
    </div>
    <div class="items-details">
        <img class="yearly" src="{{ asset('assets/icon/yearly.svg') }}">
        <h5>
            {{ fa_number($licence->price) }}  تومان
        </h5>
    </div>
</a>
