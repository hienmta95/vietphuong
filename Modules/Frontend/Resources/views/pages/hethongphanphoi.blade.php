@extends('frontend::master')

@section('page_title')
    {{ $hethongphanphoi['title'] }}
@endsection

@section('seo_title')
    {{ !empty($hethongphanphoi['seo_title']) ? $hethongphanphoi['seo_title'] : 'Việt Phương Pharma' }}
@endsection

@section('seo_url')
    {{ !empty($hethongphanphoi['seo_url']) ? $hethongphanphoi['seo_url'] : \Request::url() }}
@endsection

@section('seo_description')
    {{ !empty($hethongphanphoi['seo_description']) ? $hethongphanphoi['seo_description'] : 'Vietphuong pharma luôn phấn đấu vì sức khỏe và hạnh phúc của mọi người bằng những sản phẩm có chất lượng tốt nhất. Danapha hoạt động với mục tiêu hàng đầu là hướng tới sức khỏe của bạn' }}
@endsection

@section('seo_keyword')
    {{ !empty($hethongphanphoi['seo_keyword']) ? $hethongphanphoi['seo_keyword'] : 'vietphuongpharma, duoc pham, nganh duoc, dong duoc, thuoc, san xuat thuoc, ha noi, vietnam, cong ty duoc vietphuongpharma, kinh doanh duoc, xuat khau duoc, GMP, GMP-WHO, GLP' }}
@endsection

@section('seo_image')
    {{ cxl_asset($hethongphanphoi['image']['url']) }}
@endsection

@section('content')

    <section class="about section">
        <div class="container">

            <div class="row">
                <div class="breadcrum">
                    <span>Việt Phương pharma / </span>
                    <span class="text-green">{{ $hethongphanphoi['title'] }}</span>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-hidden">

                    @include('frontend::pages.sidebar_tintuc')
                </div>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 right">

                    {{--<div class="single map-wrap">--}}
                        {{--<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14899.659445150768!2d105.7879485474894!3d20.996049668703257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zTkjDgCBUSFXhu5BDIE5H4buMQyBQSMav4buaQw!5e0!3m2!1svi!2s!4v1558597686178!5m2!1svi!2s" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
                    {{--</div>--}}

                    <div class="row">
                        <div class="col-xs-12">

                            <br>

                            <ul class="list-address">
                                @foreach($hethongphanphoilist as $item)
                                    <li>
                                        <a class="{{ \Request::route()->id == $item['id'] ? 'active' : '' }}" href="{{ $item['maps'] }}" target="_blank" style="display: flex; width: 100%">
                                            <div class="icon-address" style="min-width: 120px;"></div>
                                            <div class="address-item-content">
                                                <h3 class="text-green">{{ $item['title'] }}</h3>
                                                <p>{{ $item['address'] }}</p>
                                                <p><i class="ico-phone"></i>0{{ $item['phone'] }}</p>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            @include('frontend::pages.sidebar_hoidap')

                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pc-hidden">
                    <ul class="list-address">
                        @foreach($hethongphanphoilist as $item)
                            <li>
                                <a href="{{ route('hethongphanphoi.get', ['id'=>$item['id'], 'slug'=>$item['slug']]) }}" style="display: flex">
                                    <div class="icon-address" style="min-width: 80px;"></div>
                                    <div class="address-item-content">
                                        <h3 class="text-green">{{ $item['title'] }}</h3>
                                        <p>{{ $item['address'] }}</p>
                                        <p><i class="ico-phone"></i>0{{ $item['phone'] }}</p>
                                    </div>
                                </a>
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
