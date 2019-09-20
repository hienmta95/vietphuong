@extends('backend::layouts.main')
@section('page_title')
{{ $sanpham->title ? $sanpham->title : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.sanpham.index') }}">Danh sách</a></li>
    <li class="active">{{ $sanpham->title ? $sanpham->title : "" }}</li>
</ul>
@endsection
@section('content')
{{--    <h1>{{ $sanpham->title ? $sanpham->title : "" }}</h1>--}}
    <p>
        {!! Form::open(['route'=>['backend.sanpham.destroy', $sanpham->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.sanpham.create') }}">Tạo mới</a>
        <a class="btn btn-primary" href="{{ route('backend.sanpham.edit', $sanpham->id) }}">Sửa</a>
        {!! Form::submit('Xoá',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $sanpham->id }}</td></tr>
            <tr><th>Tiêu đề</th><td>{{ $sanpham->title }}</td></tr>
            <tr><th>Slug</th><td>{!! $sanpham->slug ? $sanpham->slug : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Thuộc loại sản phẩm</th><td>{{ $sanpham->loaisanpham->title }}</td></tr>
            <tr><th>Thành phần </th><td>{!! $sanpham->thanhphan ? mb_substr($sanpham->thanhphan, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Chỉ đinh </th><td>{!! $sanpham->chidinh ? mb_substr($sanpham->chidinh, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Liều lượng </th><td>{!! $sanpham->lieuluong ? mb_substr($sanpham->lieuluong, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Chống chỉ định </th><td>{!! $sanpham->chongchidinh ? mb_substr($sanpham->chongchidinh, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Khuyến cáo </th><td>{!! $sanpham->khuyencao ? mb_substr($sanpham->khuyencao, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Trình bày </th><td>{!! $sanpham->trinhbay ? mb_substr($sanpham->trinhbay, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Tìm hiểu thêm </th><td>{!! $sanpham->timhieuthem ? mb_substr($sanpham->timhieuthem, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Mô tả ngắn </th><td>{!! $sanpham->description ? mb_substr($sanpham->description, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Ngày tạo</th><td><p class="c_timezone">{{ $sanpham->created_at }}</p></td></tr>
            <tr><th>Ngày sửa</th><td><p class="c_timezone">{{ $sanpham->updated_at }}</p></td></tr>
            <tr><th>Hình ảnh</th><td>{!! $sanpham->image ? "<img  class='show-images' src='".cxl_asset($sanpham->image->url)."' alt=''>" : "<span class='not-set'>(not set)</span>"!!}</td></tr>

            <tr><th>Meta title</th><td>{!! $sanpham->seo_title ? $sanpham->seo_title : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Friendly URL</th><td>{!! $sanpham->seo_url ? $sanpham->seo_url : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Meta description</th><td>{!! $sanpham->seo_description ? mb_substr($sanpham->seo_description, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Meta keyword</th><td>{!! $sanpham->seo_keyword ? $sanpham->seo_keyword : "<span class='not-set'>(not set)</span>"  !!}</td></tr>

        </tbody>
    </table>

@endsection

@push('css')
    <style>
        tr td img{
            max-width: 160px;
            margin: 5px;
        }
    </style>
@endpush

@push('scripts')

@endpush
