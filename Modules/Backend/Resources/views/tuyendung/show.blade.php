@extends('backend::layouts.main')
@section('page_title')
{{ $tuyendung->title ? $tuyendung->title : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.tuyendung.index') }}">Danh sách</a></li>
    <li class="active">{{ $tuyendung->title ? $tuyendung->title : "" }}</li>
</ul>
@endsection
@section('content')
    <p>
        {!! Form::open(['route'=>['backend.tuyendung.destroy', $tuyendung->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.tuyendung.create') }}">Tạo mới</a>
        <a class="btn btn-primary" href="{{ route('backend.tuyendung.edit', $tuyendung->id) }}">Sửa</a>
        {!! Form::submit('Xoá',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $tuyendung->id }}</td></tr>
            <tr><th>Tiêu đề</th><td>{{ $tuyendung->title }}</td></tr>
            <tr><th>Slug</th><td>{!! $tuyendung->slug ? $tuyendung->slug : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Mô tả ngắn </th><td>{!! $tuyendung->description ? mb_substr($tuyendung->description, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Nội dung </th><td>{!! $tuyendung->noidung ? mb_substr($tuyendung->noidung, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>

            <tr><th>Ngày tạo</th><td><p class="c_timezone">{{ $tuyendung->created_at }}</p></td></tr>
            <tr><th>Ngày sửa</th><td><p class="c_timezone">{{ $tuyendung->updated_at }}</p></td></tr>
            <tr><th>Hình ảnh</th><td>{!! $tuyendung->image ? "<img  class='show-images' src='".cxl_asset($tuyendung->image->url)."' alt=''>" : "<span class='not-set'>(not set)</span>"!!}</td></tr>

        </tbody>
    </table>

@endsection

@push('css')

@endpush

@push('scripts')

@endpush
