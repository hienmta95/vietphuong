@extends('backend::layouts.main')
@section('page_title')
{{ $hinhanh->title ? $hinhanh->title : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.hinhanh.index') }}">Danh sách</a></li>
    <li class="active">{{ $hinhanh->title ? $hinhanh->title : "" }}</li>
</ul>
@endsection
@section('content')
    <p>
        {!! Form::open(['route'=>['backend.hinhanh.destroy', $hinhanh->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.hinhanh.create') }}">Tạo mới</a>
        <a class="btn btn-primary" href="{{ route('backend.hinhanh.edit', $hinhanh->id) }}">Sửa</a>
        {!! Form::submit('Xoá',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $hinhanh->id }}</td></tr>
            <tr><th>Tiêu đề</th><td>{{ $hinhanh->title }}</td></tr>
            <tr><th>Thể loại</th><td>{!! $hinhanh->type == 1 ? 'hình ảnh' : "video"  !!}</td></tr>
            <tr><th>Ngày tạo</th><td><p class="c_timezone">{{ $hinhanh->created_at }}</p></td></tr>
            <tr><th>Ngày sửa</th><td><p class="c_timezone">{{ $hinhanh->updated_at }}</p></td></tr>
            @if($hinhanh->type == 2)
                <tr><th>Video URL </th><td>{{ $hinhanh->video }}</td></tr>
            @endif
            @if($hinhanh->type == 1)
                <tr><th>Hình ảnh</th><td>{!! $hinhanh->image ? "<img  class='show-images' src='".cxl_asset($hinhanh->image->url)."' alt=''>" : "<span class='not-set'>(not set)</span>"!!}</td></tr>
            @endif
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
