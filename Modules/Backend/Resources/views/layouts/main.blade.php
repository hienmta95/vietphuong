<!DOCTYPE html>
<html>

@include('backend::layouts.head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- main-header -->
    @include('backend::layouts.main-header')

    <!-- main-sidebar -->
    @include('backend::layouts.main-sidebad')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: #fff">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page_title')
            </h1>

            @yield('breadcrumb')

        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    @include('backend::layouts.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ cxl_asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ cxl_asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ cxl_asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ cxl_asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ cxl_asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ cxl_asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ cxl_asset('backend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ cxl_asset('backend/dist/js/demo.js') }}"></script>
<!-- Select2 -->
<script src="{{ cxl_asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ cxl_asset('backend/bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{!! cxl_asset('backend/bower_components/bootstrap-fileinput/js/plugins/piexif.js') !!}"></script>
<script src="{!! cxl_asset('backend/bower_components/bootstrap-fileinput/js/fileinput.js') !!}"></script>
<script src="{!! cxl_asset('backend/bower_components/bootstrap-fileinput/js/plugins/sortable.js') !!}"></script>
<script src="{!! cxl_asset('backend/bower_components/bootstrap-fileinput/js/plugins/purify.js') !!}"></script>

<!-- page script -->
<script>
    $(function () {
        $('.select2').select2();

        $('#datatables').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
        })
    })

</script>

@stack('scripts')

</body>
</html>
