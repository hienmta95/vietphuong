@extends('frontend::master')

@section('page_title')
    {{ $sanpham['title'] }}
@endsection

@section('seo_title')
    {{ !empty($sanpham['seo_title']) ? $sanpham['seo_title'] : 'Việt Phương Pharma' }}
@endsection

@section('seo_url')
    {{ !empty($sanpham['seo_url']) ? $sanpham['seo_url'] : \Request::url() }}
@endsection

@section('seo_description')
    {{ !empty($sanpham['seo_description']) ? $sanpham['seo_description'] : 'Vietphuong pharma luôn phấn đấu vì sức khỏe và hạnh phúc của mọi người bằng những sản phẩm có chất lượng tốt nhất. Danapha hoạt động với mục tiêu hàng đầu là hướng tới sức khỏe của bạn' }}
@endsection

@section('seo_keyword')
    {{ !empty($sanpham['seo_keyword']) ? $sanpham['seo_keyword'] : 'vietphuongpharma, duoc pham, nganh duoc, dong duoc, thuoc, san xuat thuoc, ha noi, vietnam, cong ty duoc vietphuongpharma, kinh doanh duoc, xuat khau duoc, GMP, GMP-WHO, GLP' }}
@endsection

@section('seo_image')
    {{ cxl_asset($sanpham['image']['url']) }}
@endsection

@section('content')

    <section class="about section">
        <div class="container">

            <div class="row">
                <div class="breadcrum">
                    <span>Việt Phương pharma / </span>
                    <span class="text-green">{{ $sanpham['loaisanpham']['title'] }} / </span>
                    <span class="text-green">{{ $sanpham['title'] }}</span>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-hidden">
                    <div class="left-menu-title">Sản phẩm</div>
                    <ul class="left-menu">
                        @foreach($loaisanpham as $item)
                        <li class="{{ $sanpham['loaisanpham']['id'] == $item['id'] ? 'active' : '' }}" id="{{ $item['id'] }}">
                            <a href="{{ route('loaisanpham.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="img-product-detail">
                                <img src="{{ cxl_asset($sanpham['image']['url']) }}" alt="product image" class="img-responsive">
                                <div class="product-name text-green">{{ $sanpham['title'] }}</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel-group specs" id="accordion">
                                @if(!empty($sanpham['thanhphan']))
                                    <div class="panel">
                                    <a class="collapsed" data-parent="#accordion" data-target="#spec1" data-toggle="collapse">THÀNH PHẦN</a>
                                    <div class="collapse" id="spec1">
                                        <div class="panel-body">
                                            {!! $sanpham['thanhphan'] !!}
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!empty($sanpham['chidinh']))
                                <div class="panel">
                                    <a class="" data-parent="#accordion" data-target="#spec3" data-toggle="collapse">CHỈ ĐỊNH</a>
                                    <div class="collapse in" id="spec3">
                                        <div class="panel-body">
                                            {!! $sanpham['chidinh'] !!}
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!empty($sanpham['lieuluong']))
                                <div class="panel">
                                    <a class="collapsed" data-parent="#accordion" data-target="#spec4" data-toggle="collapse">LIỀU LƯỢNG - CÁCH DÙNG:</a>
                                    <div class="collapse" id="spec4">
                                        <div class="panel-body">
                                            {!! $sanpham['lieuluong'] !!}
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!empty($sanpham['chongchidinh']))
                                <div class="panel">
                                    <a class="collapsed" data-parent="#accordion" data-target="#spec5" data-toggle="collapse">CHỐNG CHỈ ĐỊNH</a>
                                    <div class="collapse" id="spec5">
                                        <div class="panel-body">
                                            {!! $sanpham['chongchidinh'] !!}
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!empty($sanpham['khuyencao']))
                                <div class="panel">
                                    <a class="collapsed" data-parent="#accordion" data-target="#spec7" data-toggle="collapse">KHUYẾN CÁO</a>
                                    <div class="collapse" id="spec7">
                                        <div class="panel-body">
                                            {!! $sanpham['khuyencao'] !!}
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!empty($sanpham['trinhbay']))
                                <div class="panel">
                                    <a class="collapsed" data-parent="#accordion" data-target="#spec8" data-toggle="collapse">TRÌNH BÀY VÀ BẢO QUẢN:</a>
                                    <div class="collapse" id="spec8">
                                        <div class="panel-body">
                                            {!! $sanpham['trinhbay'] !!}
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!empty($sanpham['timhieuthem']))
                                <div class="panel">
                                    <a class="collapsed" data-parent="#accordion" data-target="#spec9" data-toggle="collapse">TÌM HIỂU THÊM</a>
                                    <div class="collapse" id="spec9">
                                        <div class="panel-body">
                                            {!! $sanpham['timhieuthem'] !!}
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </div>
                            <p>
                                &nbsp;</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <hr>
                            <p>{{ $sanpham['description'] }}</p>
                            <br>
                            <br>

                            @include('frontend::pages.sidebar_hoidap')

                        </div>
                    </div>

                    <div class="fb-share-button pull-right" data-href="{{ route('sanpham.get', ['id'=>$sanpham['id'], 'slug'=>$sanpham['slug']]) }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('sanpham.get', ['id'=>$sanpham['id'], 'slug'=>$sanpham['slug']]) }}">Chia sẻ</a></div>
                    <div class="clearfix visible-xs"></div>
                    <br class="visible-xs">

                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pc-hidden">
                    <div class="left-menu-title">Sản phẩm</div>
                    <ul class="left-menu">
                        @foreach($loaisanpham as $item)
                            <li class="{{ $sanpham['loaisanpham']['id'] == $item['id'] ? 'active' : '' }}" id="{{ $item['id'] }}">
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
