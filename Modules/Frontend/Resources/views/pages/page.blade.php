@extends('frontend::master')

@section('page_title')
    {{ $page['title'] }}
@endsection

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
                    <span class="text-green">{{ $page['title'] }}</span>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-hidden">

                    @include('frontend::pages.sidebar_sanpham')

                    @include('frontend::pages.sidebar_tintuc')
                </div>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 right">

                    <div class="single">
                        <h1 class="s-title">
                            {{ $page['title'] }}
                        </h1>

                        <div class="s-content fv-content">
                            {!! $page['noidung'] !!}
                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pc-hidden">

                    @include('frontend::pages.sidebar_sanpham')

                    @include('frontend::pages.sidebar_tintuc')
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
