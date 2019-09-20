<?php

if (! function_exists('active_route')) {
    /**
     * Return the "active" class if current route is matched.
     *
     * @param  string|array $route
     * @param  string $output
     * @return string|null
     */
    function active_route($route)
    {
        $output = 'active';
        if ($route == 1) {
            $route = [
                'backend.slide.index','backend.slide.show',
                'backend.slide.create','backend.slide.edit',

                'backend.doitac.index','backend.doitac.show',
                'backend.doitac.create','backend.doitac.edit',

                'backend.hinhanh.index','backend.hinhanh.show',
                'backend.hinhanh.create','backend.hinhanh.edit',

                'backend.tintuc.index','backend.tintuc.show',
                'backend.tintuc.create','backend.tintuc.edit',

                'backend.loaitintuc.index','backend.loaitintuc.show',
                'backend.loaitintuc.create','backend.loaitintuc.edit',

            ];
        }


        if ($route == 2) {
            $route = [
                'backend.gioithieu.index','backend.gioithieu.show',
                'backend.gioithieu.create','backend.gioithieu.edit',

                'backend.loaiquanhecodong.index','backend.loaiquanhecodong.show',
                'backend.loaiquanhecodong.create','backend.loaiquanhecodong.edit',

                'backend.quanhecodong.index','backend.quanhecodong.show',
                'backend.quanhecodong.create','backend.quanhecodong.edit',

                'backend.tuyendung.index','backend.tuyendung.show',
                'backend.tuyendung.create','backend.tuyendung.edit',

                'backend.tuvan.index','backend.tuvan.show',
                'backend.tuvan.create','backend.tuvan.edit',

            ];
        }

        if ($route == 3) {
            $route = [
                'backend.sanpham.index','backend.sanpham.show',
                'backend.sanpham.create','backend.sanpham.edit',

                'backend.loaisanpham.index','backend.loaisanpham.show',
                'backend.loaisanpham.create','backend.loaisanpham.edit',

                'backend.dashboard'
            ];
        }

        if ($route == 4) {
            $route = [

                'backend.nhamay.index','backend.nhamay.show',
                'backend.nhamay.create','backend.nhamay.edit',

                'backend.hethongphanphoi.index','backend.hethongphanphoi.show',
                'backend.hethongphanphoi.create','backend.hethongphanphoi.edit',

            ];
        }

        if ($route == 5) {
            $route = [
                'backend.user.index','backend.user.show',
                'backend.user.create','backend.user.edit',

                'backend.menu.index','backend.menu.show',
                'backend.menu.create','backend.menu.edit',

                'backend.page.index','backend.page.show',
                'backend.page.create','backend.page.edit',

                'backend.lienhe.index','backend.lienhe.show',
                'backend.lienhe.create','backend.lienhe.edit',

                'backend.thongtin.edit'
            ];
        }

        if (is_array($route)) {
            if (call_user_func_array('Route::is', $route)) {
                return $output;
            }
        } else {
            if (\Route::is($route)) {
                return $output;
            }
        }
        return '';
    }
}

?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ cxl_asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::guard('web')->user() ? Auth::guard('web')->user()->username : 'Admin' }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <!-- Start management data -->
            <li class="treeview {{ active_route(1) }}">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Slide & Tin tức & Đối tác</span>
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_route('backend.slide.*') }}"><a href="{{ route('backend.slide.index') }}"><i class="fa fa-circle-o"></i> Slide trang chủ</a></li>
                    <li class="{{ active_route('backend.doitac.*') }}"><a href="{{ route('backend.doitac.index') }}"><i class="fa fa-circle-o"></i> Đối tác </a></li>
                    <li class="{{ active_route('backend.loaitintuc.*') }}"><a href="{{ route('backend.loaitintuc.index') }}"><i class="fa fa-circle-o"></i> Loại tin tức </a></li>
                    <li class="{{ active_route('backend.tintuc.*') }}"><a href="{{ route('backend.tintuc.index') }}"><i class="fa fa-circle-o"></i> Tin tức </a></li>
                    <li class="{{ active_route('backend.hinhanh.*') }}"><a href="{{ route('backend.hinhanh.index') }}"><i class="fa fa-circle-o"></i> Hình ảnh / Video </a></li>
                </ul>
            </li>
            <!-- End management data -->

            <!-- Start management data -->
            <li class="treeview {{ active_route(2) }}">
                <a href="#">
                    <i class="fa fa-laptop"></i> <span>Về Vietphuong pharma</span>
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_route('backend.loaiquanhecodong.*') }}"><a href="{{ route('backend.loaiquanhecodong.index') }}"><i class="fa fa-circle-o"></i> Loại bài viết</a></li>
                    <li class="{{ active_route('backend.quanhecodong.*') }}"><a href="{{ route('backend.quanhecodong.index') }}"><i class="fa fa-circle-o"></i> Bài viết </a></li>
                    <li class="{{ active_route('backend.gioithieu.*') }}"><a href="{{ route('backend.gioithieu.index') }}"><i class="fa fa-circle-o"></i> Giới thiệu</a></li>
                    <li class="{{ active_route('backend.tuyendung.*') }}"><a href="{{ route('backend.tuyendung.index') }}"><i class="fa fa-circle-o"></i> Tuyển dụng</a></li>
                    <li class="{{ active_route('backend.tuvan.*') }}"><a href="{{ route('backend.tuvan.index') }}"><i class="fa fa-circle-o"></i> Tư vấn</a></li>
                </ul>
            </li>
            <!-- End management data -->

            <!-- Start management data -->
            <li class="treeview {{ active_route(3) }}">
                <a href="#">
                    <i class="fa fa-pie-chart"></i> <span>Sản phẩm</span>
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_route('backend.loaisanpham.*') }}"><a href="{{ route('backend.loaisanpham.index') }}"><i class="fa fa-circle-o"></i> Loại sản phẩm</a></li>
                    <li class="{{ active_route('backend.sanpham.*') }} {{ active_route('backend.dashboard') }}"><a href="{{ route('backend.dashboard') }}"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
                </ul>
            </li>
            <!-- End management data -->

            <!-- Start management data -->
            <li class="treeview {{ active_route(4) }}">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Hệ thống phân phối & Nhà máy</span>
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_route('backend.hethongphanphoi.*') }}"><a href="{{ route('backend.hethongphanphoi.index') }}"><i class="fa fa-circle-o"></i> Hệ thống phân phối</a></li>
                    <li class="{{ active_route('backend.nhamay.*') }}"><a href="{{ route('backend.nhamay.index') }}"><i class="fa fa-circle-o"></i> Nhà máy</a></li>
                </ul>
            </li>
            <!-- End management data -->

            <!-- Start management data -->
            <li class="treeview {{ active_route(5) }}">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Quản lý chung </span>
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_route('backend.menu.*') }}"><a href="{{ route('backend.menu.index') }}"><i class="fa fa-circle-o"></i> Quản lý Menu</a></li>
                    <li class="{{ active_route('backend.page.*') }}"><a href="{{ route('backend.page.index') }}"><i class="fa fa-circle-o"></i> Quản lý Pages</a></li>
                    <li class="{{ active_route('backend.user.*') }}"><a href="{{ route('backend.user.index') }}"><i class="fa fa-circle-o"></i> Danh sách Admin</a></li>
                    <li class="{{ active_route('backend.lienhe.*') }}"><a href="{{ route('backend.lienhe.index') }}"><i class="fa fa-circle-o"></i> Liên hệ</a></li>
                    <li class="{{ active_route('backend.thongtin.edit') }}"><a href="{{ route('backend.thongtin.edit') }}"><i class="fa fa-circle-o"></i> Thông tin chung</a></li>
                </ul>
            </li>
            <!-- End management data -->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
