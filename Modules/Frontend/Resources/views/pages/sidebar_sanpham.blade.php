<div class="left-menu-title menu-news">Sản phẩm nổi bật</div>
<ul class="left-menu-image">
    @foreach($sanphamnoibat as $item)
    <li>
        <img src="{{ cxl_asset($item['image']['url']) }}" alt="{{ $item['title'] }}">
        <span>
            <a href="{{ route('sanpham.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">
                {{ $item['title'] }}
            </a>
        </span>
    </li>
    @endforeach
</ul>

