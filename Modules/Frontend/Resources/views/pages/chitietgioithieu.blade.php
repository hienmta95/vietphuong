@extends('frontend::master')

@section('page_title')
    {{ $gioithieu['title1'].' '.$gioithieu['title2'] }}
@endsection

@section('seo_title')
    {{ !empty($gioithieu['seo_title']) ? $gioithieu['seo_title'] : 'Việt Phương Pharma' }}
@endsection

@section('seo_url')
    {{ !empty($gioithieu['seo_url']) ? $gioithieu['seo_url'] : \Request::url() }}
@endsection

@section('seo_description')
    {{ !empty($gioithieu['seo_description']) ? $gioithieu['seo_description'] : 'Vietphuong pharma luôn phấn đấu vì sức khỏe và hạnh phúc của mọi người bằng những sản phẩm có chất lượng tốt nhất. Danapha hoạt động với mục tiêu hàng đầu là hướng tới sức khỏe của bạn' }}
@endsection

@section('seo_keyword')
    {{ !empty($gioithieu['seo_keyword']) ? $gioithieu['seo_keyword'] : 'vietphuongpharma, duoc pham, nganh duoc, dong duoc, thuoc, san xuat thuoc, ha noi, vietnam, cong ty duoc vietphuongpharma, kinh doanh duoc, xuat khau duoc, GMP, GMP-WHO, GLP' }}
@endsection

@section('seo_image')
    {{ cxl_asset($gioithieu['image']['url']) }}
@endsection

@section('content')

    <section class="about section">
        <div class="container">

            <div class="row">
                <div class="breadcrum">
                    <span>Việt Phương pharma / </span>
                    <span class="text-green">{{ $gioithieu['title1'].' '.$gioithieu['title2'] }}</span>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-hidden">

                    @include('frontend::pages.sidebar_sanpham')

                    @include('frontend::pages.sidebar_tintuc')
                </div>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 right">

                    <div class="tuyendung-content">
                        <h3>{{ $gioithieu['title1'].' '.$gioithieu['title2'] }}</h3>
                        <br>

                        {!! $gioithieu['noidung'] !!}

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
