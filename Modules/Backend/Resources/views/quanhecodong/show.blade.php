@extends('backend::layouts.main')
@section('page_title')
{{ $quanhecodong->title ? $quanhecodong->title : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.quanhecodong.index') }}">Danh sách</a></li>
    <li class="active">{{ $quanhecodong->title ? $quanhecodong->title : "" }}</li>
</ul>
@endsection
@section('content')
    <p>
        {!! Form::open(['route'=>['backend.quanhecodong.destroy', $quanhecodong->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.quanhecodong.create') }}">Tạo mới</a>
        <a class="btn btn-primary" href="{{ route('backend.quanhecodong.edit', $quanhecodong->id) }}">Sửa</a>
        {!! Form::submit('Xoá',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $quanhecodong->id }}</td></tr>
            <tr><th>Tiêu đề</th><td>{{ $quanhecodong->title }}</td></tr>
            <tr><th>Loại bài viết </th><td>{{ $quanhecodong->loaiquanhecodong->title }}</td></tr>
            <tr><th>Slug</th><td>{!! $quanhecodong->slug ? $quanhecodong->slug : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Mô tả ngắn </th><td>{!! $quanhecodong->description ? mb_substr($quanhecodong->description, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>

            <tr><th>Nội dung </th><td>{!! $quanhecodong->noidung ? mb_substr($quanhecodong->noidung, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Ngày tạo</th><td><p class="c_timezone">{{ $quanhecodong->created_at }}</p></td></tr>
            <tr><th>Ngày sửa</th><td><p class="c_timezone">{{ $quanhecodong->updated_at }}</p></td></tr>
            <tr><th>Hình ảnh</th><td>{!! $quanhecodong->image ? "<img  class='show-images' src='".cxl_asset($quanhecodong->image->url)."' alt=''>" : "<span class='not-set'>(not set)</span>"!!}</td></tr>
        </tbody>
    </table>

@endsection

@push('css')

@endpush

@push('scripts')

@endpush
