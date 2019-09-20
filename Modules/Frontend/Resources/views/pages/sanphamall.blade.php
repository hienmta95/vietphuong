@extends('frontend::master')

@section('page_title', 'Sản phẩm của Việt Phương pharma')

@section('seo_title')
    Việt Phương Pharma
@endsection

@section('seo_url')
    {{ \Request::url() }}
@endsection

@section('seo_description')
    Vietphuong pharma luôn phấn đấu vì sức khỏe và hạnh phúc của mọi người bằng những sản phẩm có chất lượng tốt nhất. Danapha hoạt động với mục tiêu hàng đầu là hướng tới sức khỏe của bạn
@endsection

@section('seo_keyword')
    vietphuongpharma, duoc pham, nganh duoc, dong duoc, thuoc, san xuat thuoc, ha noi, vietnam, cong ty duoc vietphuongpharma, kinh doanh duoc, xuat khau duoc, GMP, GMP-WHO, GLP
@endsection

@section('seo_image')
    {{ cxl_asset('frontend/images/header-logo.png') }}
@endsection

@section('content')

    <section class="about section">
        <div class="container">

            <div class="row">
                <div class="breadcrum">
                    <span>Việt Phương pharma / </span>
                    <span class="text-green">Danh sách sản phẩm</span>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-hidden">
                    <div class="left-menu-title">Sản phẩm</div>
                    <ul class="left-menu">
                        @foreach($loaisanpham as $item)
                        <li class="active" id="{{ $item['id'] }}">
                            <a href="{{ route('loaisanpham.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

                    @foreach($sanpham as $item)
                    <div class="product-item">
                            <span class="product-item-img">
                                <img src="{{ cxl_asset($item['image']['url']) }}" alt="{{ $item['title'] }}" class="img-responsive">
                                <a href="{{ route('sanpham.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}" class="mask"></a>
                            </span>
                        <h4>{{ $item['title'] }}</h4>
                        <p>
                            {{ $item['description'] }}
                        </p>
                        <a href="{{ route('sanpham.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}" class="read-more btn-success btn">Xem thêm</a>
                    </div>
                    @endforeach

                    {{ $sanpham->links() }}
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pc-hidden">
                    <div class="left-menu-title">Sản phẩm</div>
                    <ul class="left-menu">
                        @foreach($loaisanpham as $item)
                            <li class="active" id="{{ $item['id'] }}">
                                <a href="{{ route('loaisanpham.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection
