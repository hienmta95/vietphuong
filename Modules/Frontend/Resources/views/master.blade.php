<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('page_title')
    </title>
    <meta name="description" content="@yield('seo_description')">
    <meta name="keywords" content="@yield('seo_keyword')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="">
    <link rel="alternate" href="" hreflang="vi-vn">
    <meta itemprop="name" content="@yield('seo_title')">
    <meta itemprop="description" content="@yield('seo_description')">
    <meta property="og:title" content="@yield('seo_title')">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('seo_url')">
    <meta property="og:description" content="@yield('seo_description')">
    <meta property="og:site_name" content="Việt Phương">
    <meta property="og:image" content="@yield('seo_image')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="{{ cxl_asset('frontend/images/vietphuongico.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ cxl_asset('frontend/rs_plugin/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" href="{{ cxl_asset('frontend/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ cxl_asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ cxl_asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ cxl_asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ cxl_asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ cxl_asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ cxl_asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ cxl_asset('frontend/css/quick-call-button.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <script src="{{ cxl_asset('frontend/js/vendors/modernizr.custom.js') }}"></script>

    @yield('styles')

    {!! $info['chatbox'] !!}

</head>
<body>
<!-- Page Wrapper -->
<div id="wrap" class="layout-1">
    <!-- Header -->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="logo">
                    <a href="{{ route('homepage') }}">
                        <img src="{{ cxl_asset('frontend/images/header-logo.png') }}" alt="Logo Việt Phương Pharma" >
                    </a>
                </div>
                <form style="display:inline" role="form" method="get" action="{{ route('search') }}">
                    <div class="search-cate">
                        <input type="text" name="keyword" placeholder="Tìm kiếm...">
                        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                    </div>
                </form>
                <div class="hotline nav navbar-right">
                    <a href="tel:{{ $info['sdtcongty'] }}">
                        <img src="{{ cxl_asset('frontend/images/icon-hotline.png') }}">
                        <p>{{ $info['sdtcongty'] }}</p>
                    </a>
                </div>
            </div>
        </div>

        <nav class="navbar ownmenu">
            <div class="container">
                <!-- Navbar Header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false">
                        <span><i class="fa fa-navicon"></i></span>
                    </button>
                </div>

                <!-- NAV -->
                <div class="collapse navbar-collapse" id="nav-open-btn">
                    <ul class="nav">
                        <li class="nav-item active">
                            <a href="{{ route('homepage') }}"><i class="fa fa-home"></i></a>
                        </li>

                        {{--<li class="nav-item"><a class="nav-link" href="{{ route('gioithieu') }}">Giới thiệu</a></li>--}}
                        {{--<li class="nav-item dropdown">--}}
                            {{--<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quan hệ cổ đông </a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--@foreach($menu_quanhecodong as $item)--}}
                                    {{--@if(empty($item['quanhecodong']))--}}
                                        {{--<li><a href="{{ route('loaiquanhecodong.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a></li>--}}
                                    {{--@else--}}
                                        {{--<li class="dropdown-submenu dropdown">--}}
                                            {{--<a href="{{ route('loaiquanhecodong.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}" class="nav-link dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">{{ $item['title'] }}</a>--}}
                                            {{--<ul class="drop-ul dropdown-menu">--}}
                                                {{--@foreach($item['quanhecodong'] as $item2)--}}
                                                    {{--<li><a class="dropdown-item dropdown-subitem" href="{{ route('quanhecodong', ['id'=>$item2['id'], 'slug'=>$item2['slug']]) }}">{{ $item2['title'] }}</a></li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item dropdown">--}}
                            {{--<a href="{{ route('sanpham.list') }}" class="nav-link dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm </a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--@foreach($menu_loaisanpham as $item)--}}
                                    {{--@if(empty($item['sanpham']))--}}
                                        {{--<li><a href="{{ route('loaisanpham.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a></li>--}}
                                    {{--@else--}}
                                        {{--<li class="dropdown-submenu dropdown">--}}
                                            {{--<a href="{{ route('loaisanpham.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $item['title'] }}</a>--}}
                                            {{--<a href="{{ route('loaisanpham.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}" class="nav-link dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">{{ $item['title'] }}</a>--}}
                                            {{--<ul class="drop-ul dropdown-menu">--}}
                                                {{--@foreach($item['sanpham'] as $item2)--}}
                                                    {{--<li><a class="dropdown-item dropdown-subitem" href="{{ route('sanpham.get', ['id'=>$item2['id'], 'slug'=>$item2['slug']]) }}">{{ $item2['title'] }}</a></li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</li>--}}

                        {{--<li class="nav-item dropdown">--}}
                            {{--<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tin tức </a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--@foreach($menu_loaitintuc as $item)--}}
                                    {{--@if(empty($item['tintuc']))--}}
                                        {{--<li><a href="{{ route('loaitintuc.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a></li>--}}
                                    {{--@else--}}
                                        {{--<li class="dropdown-submenu dropdown">--}}
                                            {{--<a href="{{ route('loaitintuc.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}" class="nav-link dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">{{ $item['title'] }}</a>--}}
                                            {{--<ul class="drop-ul dropdown-menu">--}}
                                                {{--@foreach($item['tintuc'] as $item2)--}}
                                                    {{--<li><a class="dropdown-item dropdown-subitem" href="{{ route('tintuc', ['id'=>$item2['id'], 'slug'=>$item2['slug']]) }}">{{ $item2['title'] }}</a></li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</li>--}}

                        {{--<li class="nav-item dropdown">--}}
                            {{--<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hệ thống phân phối </a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--@foreach($menu_hethongphanphoi as $item)--}}
                                    {{--<li><a href="{{ route('hethongphanphoi.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}">{{ $item['title'] }}</a></li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="{{ route('tuyendung') }}">Tuyển dụng</a></li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="{{ route('lienhe') }}">Liên hệ</a></li>--}}

                        @foreach($menu as $item)
                            @if(empty($item['childs']))
                                <li class="nav-item"><a class="nav-link" href="{{ $item['link'] }}">{{ $item['title'] }}</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a href="{{ $item['link'] }}" class="nav-link dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">{{ $item['title'] }}</a>
                                    <ul class="dropdown-menu">
                                        @foreach($item['childs'] as $child)
                                            @if(empty($child['childs']))
                                                <li><a href="{{ $child['link'] }}">{{ $child['title'] }}</a></li>
                                            @else
                                                <li class="dropdown-submenu dropdown">
                                                    <a href="{{ $child['link'] }}" class="nav-link dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">{{ $child['title'] }}</a>
                                                    <ul class="drop-ul dropdown-menu">
                                                        @foreach($child['childs'] as $child2)
                                                        <li><a class="dropdown-item dropdown-subitem" href="{{ $child2['link'] }}">{{ $child2['title'] }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <!-- Content -->
    <div id="content" style="margin-bottom: 50px;">

        @yield('content')

    </div>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Contact -->
                <div class="col-md-5">
                    <a href="#">
                        <img src="{{ cxl_asset('frontend/images/footer-logo.png') }}">
                    </a>
                    <h4 style="margin-top:10px;margin-bottom:5px;"> {{ $info['tencongty'] }}</h4>
                    <p><i class="fa fa-map-marker"></i> Số 2 Trần Thánh Tông, phường Phạm Đình Hổ, quận Hai Bà Trưng, thành phố Hà Nội.</p>
                    <p><i class="fa fa-map-marker"></i> Số 130 Nguyễn Đức Cảnh, Phường Tương Mai, Quận Hoàng Mai, Hà Nội.</p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> {{ $info['sdtcongty'] }}</p>
                    <p><i class="fa fa-envelope"></i> {{ $info['emailcongty'] }}</p>
                </div>
                <div class="col-md-2">
                    <h4>Về chúng tôi</h4>
                    <hr style="background:#dcbceb;height:3px;width:30px;border:none">
                    <ul class="links-footer">
                        <li><a href="{{ route('gioithieu') }}">Giới thiệu</a></li>
                        <li><a href="{{ route('tintuc', ['id'=>'3', 'slug'=>'tintuc']) }}">Tin tức</a></li>
                        <li><a href="{{ route('tuyendung') }}">Thông tin tuyển dụng</a></li>
                        <li><a href="{{ route('lienhe') }}">Liên hệ nhanh</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>Sản phẩm</h4>
                    <hr style="background:#dcbceb;height:3px;width:30px;border:none">
                    <ul class="links-footer">
                        <li><a href="{{ route('hethongphanphoi.get', ['id'=>'1', 'slug'=>'hethongphanphoi']) }}">Hệ thống phân phối</a></li>
                        <li><a href="{{ route('gioithieu') }}">Tổng quan</a></li>
                        <li><a href="{{ route('sanpham.list') }}">Sản phẩm mới</a></li>
                        <li><a href="{{ route('sanpham.list') }}">Sản phẩm tiêu biểu</a></li>
                        <li><a href="{{ route('sanpham.list') }}">Danh mục sản phẩm</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>Liên kết website</h4>
                    <hr style="background:#dcbceb;height:3px;width:30px;border:none">
                    <label class="custom-select">
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Liên kết
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                @foreach($weblienket as $item)
                                    <li><a href="{{ $item['link'] }}">{{ $item['link'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </footer>

    <!-- Rights -->
    <div class="rights" align="center">
        <div class="container">
            <div class="row" style="border-top: 1px solid #25a56c">
                <div class="col-md-12">
                    <p>Copyright © 2019 Viet Phuong Pharma. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- GO TO TOP  -->
    <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a>
    <!-- GO TO TOP End -->
</div>
<!-- End Page Wrapper -->


<!-- Start Quick Call Buttons By LongVietWeb.com -->
<div class='quick-call-button'></div>
<div class='call-now-button'>
    <div><p class='call-text'> {{ $info['sdtcongty'] }} </p>
        <a href='tel:{{ $info['sdtcongty'] }}' title='Call Now' >
            <div class='quick-alo-ph-circle active'></div>
            <div class='quick-alo-ph-circle-fill active'></div>
            <div class='quick-alo-phone-img-circle shake'></div>
        </a>
    </div>
</div>
<style>
    @media screen and (max-width: 1920px) {
        .call-now-button { display: flex !important; background: #d8d8d8; }
        .quick-call-button { display: block !important; }
    }
    /*@media screen and (min-width: px) {*/
        /*.call-now-button .call-text { display: none !important; }*/
    /*}*/
    /*@media screen and (max-width: px) {*/
        /*.call-now-button .call-text { display: none !important; }*/
    /*}*/
    .call-now-button { top: 90%; }
    .call-now-button { left: 1%; }
    .call-now-button { background: #d8d8d8; }
    .call-now-button div a .quick-alo-ph-img-circle, .call-now-button div a .quick-alo-phone-img-circle { background-color: #0c3; }
    .call-now-button .call-text { color: #dd0404; }
</style>
<!-- /End Quick Call Buttons By LongVietWeb.com -->

<!-- JavaScripts -->
<script src="{{ cxl_asset('frontend/js/vendors/modernizr.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/vendors/wow.min.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/vendors/bootstrap.min.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/vendors/own-menu.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/vendors/jquery.sticky.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/vendors/owl.carousel.min.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/vendors/swiper.min.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/vendors/jquery.mCustomScrollbar.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/vendors/jquery.magnific-popup.min.js') }}"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script src="{{ cxl_asset('frontend/rs_plugin/js/jquery.tp.min.js') }}"></script>
{{--<script src="{{ cxl_asset('frontent/rs_plugin/js/jquery.tp.t.min.js') }}"></script>--}}
<script src="{{ cxl_asset('frontend/js/main.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/plugins.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/custom.js') }}"></script>
<script src="{{ cxl_asset('frontend/js/drag-quick-call-button.js') }}"></script>

@yield('scripts')

</body>
</html>
