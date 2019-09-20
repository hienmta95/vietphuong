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
                    <div class="col-sm-4">
                        <form action="{{ route('post.lienhe') }}" class="contact-form" id="NodeIndexForm" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="input text">
                                <input name="hoten" placeholder="Họ và tên" required="required" maxlength="250" type="text" id="NodeTitle">
                            </div>
                            <div class="input text">
                                <input name="email" placeholder="Email" required="required" type="text" id="NodeFieldContactEmail">
                            </div>
                            <div class="input text">
                                <input name="phone" placeholder="Số điện thoại" required="required" type="text" id="NodeFieldContactPhone">
                            </div>
                            <textarea name="noidung" placeholder="Nội dung" rows="5" required="required" id="NodeFieldContent"></textarea>
                            <button type="submit" class="btn btn-green">Gửi</button>
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <div class="contact-info list-1">
                            <h4 class="text-green">
                                {{ $info['tencongty'] }}</h4>
                            <ul class="contact-info-list">
                                <li>
                                    <div class="info-header text-green">
                                        Trụ sở 1: <span style="color: #111; font-weight: 400">Số 2 Trần Thánh Tông, phường Phạm Đình Hổ, quận Hai Bà Trưng, thành phố Hà Nội. </span></div>
                                    <div class="info-header text-green">
                                        Trụ sở 2: <span style="color: #111; font-weight: 400">Số 130 Nguyễn Đức Cảnh, Phường Tương Mai, Quận Hoàng Mai, Hà Nội.</span> </div>
                                        <p>
                                        <span class="text-bold">Điện thoại</span>: {{ !empty($item['phone']) ? $item['phone'] : '-' }}<br>
                                        <span class="text-bold">Fax</span>: {{ !empty($item['fax']) ? $item['fax'] : '-' }}<br>
                                        <span class="text-bold">Email</span>: {{ !empty($item['email']) ? $item['email'] : '-' }}</p>
                                </li>
                            </ul>
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
