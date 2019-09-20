@extends('backend::layouts.main')
@section('page_title')
{{ $gioithieu->title1 ? $gioithieu->title1 : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.gioithieu.index') }}">Danh sách</a></li>
    <li class="active">{{ $gioithieu->title1 ? $gioithieu->title1 : "" }}</li>
</ul>
@endsection
@section('content')
    <p>
        {!! Form::open(['route'=>['backend.gioithieu.destroy', $gioithieu->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.gioithieu.create') }}">Tạo mới</a>
        <a class="btn btn-primary" href="{{ route('backend.gioithieu.edit', $gioithieu->id) }}">Sửa</a>
        {!! Form::submit('Xoá',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $gioithieu->id }}</td></tr>
            <tr><th>Tiêu đề 1</th><td>{{ $gioithieu->title1 }}</td></tr>
            <tr><th>Tiêu đề 2</th><td>{{ $gioithieu->title2 }}</td></tr>
            <tr><th>Thứ tự hiển thị</th><td>{!! $gioithieu->order ? $gioithieu->order : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Slug</th><td>{!! $gioithieu->slug ? $gioithieu->slug : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Mô tả</th><td>{!! $gioithieu->description ? mb_substr($gioithieu->description, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Nội dung </th><td>{!! $gioithieu->noidung ? mb_substr($gioithieu->noidung, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Ngày tạo</th><td><p class="c_timezone">{{ $gioithieu->created_at }}</p></td></tr>
            <tr><th>Ngày sửa</th><td><p class="c_timezone">{{ $gioithieu->updated_at }}</p></td></tr>
            <tr><th>Hình ảnh</th><td>{!! $gioithieu->image ? "<img  class='show-images' src='".cxl_asset($gioithieu->image->url)."' alt=''>" : "<span class='not-set'>(not set)</span>"!!}</td></tr>

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
