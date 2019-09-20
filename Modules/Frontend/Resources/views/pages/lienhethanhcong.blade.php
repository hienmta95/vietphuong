@extends('frontend::master')

@section('page_title', 'Liên hệ Việt Phương pharma')

@section('seo_title')
    Việt Phương pharma
@endsection

@section('seo_url')
    {{ \Request::url() }}
@endsection

@section('seo_description')
    Vietphuong pharma luôn phấn đấu vì sức khỏe và hạnh phúc của mọi người bằng những sản phẩm có chất lượng tốt nhất. Danapha hoạt động với mục tiêu hàng đầu là hướng tới sức khỏe của bạ
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
                    <span class="text-green">Thông tin liên hệ</span>
                </div>
            </div>

            <div class="contact-content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="company">Thư của bạn đã được gửi đi thành công, chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất.</h4>

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
