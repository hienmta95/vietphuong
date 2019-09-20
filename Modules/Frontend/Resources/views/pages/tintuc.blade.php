@extends('frontend::master')

@section('page_title')
    {{ $tintuc['title'] }}
@endsection

@section('seo_title')
    {{ !empty($tintuc['seo_title']) ? $tintuc['seo_title'] : 'Việt Phương Pharma' }}
@endsection

@section('seo_url')
    {{ !empty($tintuc['seo_url']) ? $tintuc['seo_url'] : \Request::url() }}
@endsection

@section('seo_description')
    {{ !empty($tintuc['seo_description']) ? $tintuc['seo_description'] : 'Vietphuong pharma luôn phấn đấu vì sức khỏe và hạnh phúc của mọi người bằng những sản phẩm có chất lượng tốt nhất. Danapha hoạt động với mục tiêu hàng đầu là hướng tới sức khỏe của bạn' }}
@endsection

@section('seo_keyword')
    {{ !empty($tintuc['seo_keyword']) ? $tintuc['seo_keyword'] : 'vietphuongpharma, duoc pham, nganh duoc, dong duoc, thuoc, san xuat thuoc, ha noi, vietnam, cong ty duoc vietphuongpharma, kinh doanh duoc, xuat khau duoc, GMP, GMP-WHO, GLP' }}
@endsection

@section('seo_image')
    {{ cxl_asset($tintuc['image']['url']) }}
@endsection

@section('content')

    <section class="about section">
        <div class="container">

            <div class="row">
                <div class="breadcrum">
                    <span>Việt Phương pharma / </span>
                    <span class="text-green">{{ $tintuc['loaitintuc']['title'] }} / </span>
                    <span class="text-green">{{ $tintuc['title'] }}</span>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-hidden">
                    <div class="left-menu-title">Tin tức</div>
                    <ul class="left-menu">
                        @foreach($loaitintuc as $item)
                            <li class="{{ $tintuc['loaitintuc']['id'] == $item['id'] ? 'active' : '' }}" id="{{ $item['id'] }}">
                                <a href="{{ route('loaitintuc.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>

                    @include('frontend::pages.sidebar_tintuc')
                </div>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 right">

                    <div class="single">
                        <h1 class="s-title">
                            {{ $tintuc['title'] }}
                        </h1>

                        <div class="s-content fv-content">
                            {!! $tintuc['noidung'] !!}
                        </div>

                        <div class="bor-box lpost-box" style="margin-top: 20px;margin-bottom: 50px;">
                            <h2 class="i-title">Bài viết liên quan</h2>
                            <ul>
                                @foreach($lienquan as $item)
                                <li>
                                    <a href="{{ route('tintuc', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">
                                        {{ $item['title'] }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pc-hidden">
                    <div class="left-menu-title">Tin tức</div>
                    <ul class="left-menu">
                        @foreach($loaitintuc as $item)
                            <li class="{{ $tintuc['loaitintuc']['id'] == $item['id'] ? 'active' : '' }}" id="{{ $item['id'] }}">
                                <a href="{{ route('loaitintuc.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>

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
