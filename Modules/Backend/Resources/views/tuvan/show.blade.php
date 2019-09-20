@extends('backend::layouts.main')
@section('page_title')
{{ $tuvan->title ? $tuvan->title : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.tuvan.index') }}">Danh sách</a></li>
    <li class="active">{{ $tuvan->title ? $tuvan->title : "" }}</li>
</ul>
@endsection
@section('content')
    <p>
        {!! Form::open(['route'=>['backend.tuvan.destroy', $tuvan->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.tuvan.create') }}">Tạo mới</a>
        <a class="btn btn-primary" href="{{ route('backend.tuvan.edit', $tuvan->id) }}">Sửa</a>
        {!! Form::submit('Xoá',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $tuvan->id }}</td></tr>
            <tr><th>Tiêu đề</th><td>{{ $tuvan->title }}</td></tr>
            <tr><th>Slug</th><td>{!! $tuvan->slug ? $tuvan->slug : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Mô tả ngắn </th><td>{!! $tuvan->description ? mb_substr($tuvan->description, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Nội dung </th><td>{!! $tuvan->noidung ? mb_substr($tuvan->noidung, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>

            <tr><th>Ngày tạo</th><td><p class="c_timezone">{{ $tuvan->created_at }}</p></td></tr>
            <tr><th>Ngày sửa</th><td><p class="c_timezone">{{ $tuvan->updated_at }}</p></td></tr>
            <tr><th>Hình ảnh</th><td>{!! $tuvan->image ? "<img  class='show-images' src='".cxl_asset($tuvan->image->url)."' alt=''>" : "<span class='not-set'>(not set)</span>"!!}</td></tr>

        </tbody>
    </table>

@endsection

@push('css')

@endpush

@push('scripts')

@endpush
