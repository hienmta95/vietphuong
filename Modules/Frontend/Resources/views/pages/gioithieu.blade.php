@extends('frontend::master')

@section('page_title', 'Giới thiệu')

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

    <div id="content" style="margin-bottom: 50px;">

        <section class="section">
            <div class="container">

                <div class="row">
                    <div class="breadcrum">
                        <span>Việt Phương pharma / </span>
                        <span class="text-green">Giới thiệu</span>
                    </div>
                </div>

            </div>
        </section>

        <div class="gioithieuchung-content">

            @foreach($items as $key => $item)
            <div class="gioithieu-item {{ ($key%2 == 0) ? '' : 'gray' }}">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 pull-{{ ($key%2 != 0) ? 'right' : 'left' }} fadeInLeft animated">
                            <img class="img-responsive img-gioithieu" src="{{ cxl_asset($item['image']['url']) }}">
                        </div>
                        <div class="col-sm-6 pull-{{ ($key%2 != 0) ? 'right' : 'left' }} fadeInRight animated">
                            <div class="present">
                                <h3>
                                    {{ $item['title1'] }}</h3>
                                <h1 class="text-green">
                                    {{ $item['title2'] }}</h1>
                                <p>
                                    {!! $item['description'] !!}
                                </p>
                                <a href="{{ route('gioithieu.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}"><button class="btn btn-green">Xem thêm</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>


    </div>

@endsection

@section('scripts')
    <script>
        (function ( $ ) {

        })(jQuery);
    </script>
@endsection
