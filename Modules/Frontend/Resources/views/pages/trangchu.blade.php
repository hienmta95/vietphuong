@extends('frontend::master')

@section('page_title', 'Việt Phương pharma')

@section('seo_title')
    Trang chủ Việt Phương Pharma
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

    <h1 class="hide"></h1>
    <!-- Slid Sec -->
    <section class="banner section">
        <div class="swiper swiper-pagination-inside">
            <div class="swiper-container" data-plugin="swiper">
                <div class="swiper-wrapper">

                    @foreach($slide as $item)
                    <div class="swiper-slide" style="width: 100% !important; background-image:url({{ cxl_asset($item['image']['url']) }})">
                        <div class="container d-flex justify-content-md-end justify-content-center">
                            <div class="align-self-center text-center text-md-right">
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="about section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 left">
                    <img src="{{ cxl_asset($gioithieu['image']['url']) }}" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 right">
                    <h2 class="section-title text-uppercase">{{ $gioithieu['title1'].' '.$gioithieu['title2'] }}</h2>
                    <hr style="background:#008349;height:3px;width:70px;border:none">
                    <div class="content">
                        {!! $gioithieu['description'] !!}
                    </div>
                    <div class="text-left" style="margin-top: 25px;">
                        <a class="btn-round" href="{{ route('gioithieu') }}">Xem chi tiết <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product margin-top-60 margin-bottom-60 padding-top-60 padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title text-uppercase margin-top-0">Sản phẩm</h2>
                    <hr style="background:#008349;height:3px;width:70px;border:none;margin:20px auto;">
                    <div class="swiper-container product-slide margin-top-30">
                        <div class="swiper-wrapper">

                            @foreach($sanpham as $item)
                            <div class="swiper-slide swiper-slide-item">
                                <div class="image-swiper">
                                    <a href="{{ route('sanpham.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">
                                        <img src="{{ cxl_asset($item['image']['url']) }}">
                                    </a>
                                </div>
                                <div class="swiper-slide-content">
                                    <p class="name">
                                        <a href="{{ route('sanpham.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a>
                                    </p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- navigation buttons -->
                    <div style="" id="js-prev1" class="swiper-button-prev">
                        <i class="fa fa-caret-left" style="margin-left:2px;line-height:37px;color:#fff"></i>
                    </div>
                    <div style="" id="js-next1" class="swiper-button-next">
                        <i class="fa fa-caret-right" style="margin-left:2px;line-height:37px;color:#fff"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="article margin-top-60 margin-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title text-uppercase margin-top-0">Tin tức & Hoạt động</h2>
                    <hr style="background:#008349;height:3px;width:70px;border:none;margin:20px auto;">
                    <div class="swiper-container article-slide margin-top-30">
                        <div class="swiper-wrapper">

                            @foreach($tintuc as $item)
                            <div class="swiper-slide swiper-slide-item">
                                <div class="image-swiper">
                                    <a href="{{ route('tintuc', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">
                                        <img src="{{ cxl_asset($item['image']['url']) }}">
                                    </a>
                                    <div class="date">
                                        <span class="day">{{ date_format(date_create($item['updated_at']), "d") }}<br><span class="month">{{ date_format(date_create($item['updated_at']), "m") }}</span></span>
                                    </div>
                                </div>
                                <div class="swiper-slide-content">
                                    <p class="name">
                                        <a href="{{ route('tintuc', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a>
                                    </p>
                                    <p class="intro">{{ $item['description'] }}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="text-center" style="margin-top: 30px;">
                        <a class="btn-round" href="{{ route('loaitintuc.get', ['id'=>'1', 'slug'=>'tintuc']) }}">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="recruit section padding-top-60 padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 left">
                    <h2 class="section-title text-uppercase margin-top-0">Tuyển dụng</h2>
                    <hr class="margin-bottom-30" style="background:#008349;height:3px;width:70px;border:none;">
                    <div class="row">

                        @foreach($tuyendung as $item)
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="image">
                                <a href="{{ route('tuyendung.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">
                                    <img src="{{ cxl_asset($item['image']['url']) }}" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <p class="name">
                                    <a href="{{ route('tuyendung.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a>
                                </p>
                                <p class="intro">{{ $item['description'] }}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 right">
                    <h2 class="section-title text-uppercase margin-top-0">Quan hệ cổ đông</h2>
                    <hr class="margin-bottom-30" style="background:#008349;height:3px;width:70px;border:none">

                    @foreach($quanhecodong as $item)
                    <div class="item margin-bottom-15">
                        <a href="{{ route('quanhecodong', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">
                            <img src="{{ cxl_asset($item['image']['url']) }}" alt="">
                        </a>
                        <div class="content">
                            <p class="p1">
                                <i class="fa fa-clock-o"></i> {{ date_format(date_create($item['updated_at']), "H:i d/m/Y") }}
                            </p>
                            <p class="p2"><a href="{{ route('quanhecodong', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a></p>
                            <p class="p3" style="min-width: 312px">{{ $item['description'] }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section class="partner margin-top-60 margin-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title text-uppercase margin-top-0">Đối tác</h2>
                    <hr style="background:#008349;height:3px;width:70px;border:none;margin:20px auto;">
                    <div class="swiper-container partner-slide margin-top-30">
                        <div class="swiper-wrapper">

                            @foreach($doitac as $item)
                            <div class="swiper-slide swiper-slide-item">
                                <div class="image-swiper">
                                    <a href="{{ $item['link'] }}">
                                        <img src="{{ cxl_asset($item['image']['url']) }}">
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        (function ( $ ) {

        })(jQuery);
    </script>
@endsection
