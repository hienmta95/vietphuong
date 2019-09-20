<div class="left-menu-title menu-news">Tin tức nổi bật</div>
<ul class="left-menu-image">
    @foreach($tintucnoibat as $item)
    <li>
        <img src="{{ cxl_asset($item['image']['url']) }}" alt="{{ $item['title'] }}">
        <span>
            <a href="{{ route('tintuc', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">
                {{ $item['title'] }}
            </a>
        </span>
    </li>
    @endforeach
</ul>


<div class="left-menu-title menu-news">Vietphuong Pharma</div>
<ul class="left-menu-image">
    <img style="margin-top: 5px; width: 100%" src="{{ cxl_asset('frontend/images/bg_hoidap2.png') }}" alt="">
</ul>
