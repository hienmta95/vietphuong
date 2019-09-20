@extends('backend::layouts.main')
@section('page_title')
{{ $tintuc->title ? $tintuc->title : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.tintuc.index') }}">Danh sách</a></li>
    <li class="active">{{ $tintuc->title ? $tintuc->title : "" }}</li>
</ul>
@endsection
@section('content')
    <p>
        {!! Form::open(['route'=>['backend.tintuc.destroy', $tintuc->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.tintuc.create') }}">Tạo mới</a>
        <a class="btn btn-primary" href="{{ route('backend.tintuc.edit', $tintuc->id) }}">Sửa</a>
        {!! Form::submit('Xoá',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $tintuc->id }}</td></tr>
            <tr><th>Tiêu đề</th><td>{{ $tintuc->title }}</td></tr>
            <tr><th>Loại tin tức</th><td>{{ $tintuc->loaitintuc->title }}</td></tr>
            <tr><th>Slug</th><td>{!! $tintuc->slug ? $tintuc->slug : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Link to</th><td>{!! $tintuc->link ? $tintuc->link : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Mô tả ngắn </th><td>{!! $tintuc->description ? mb_substr($tintuc->description, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Nội dung </th><td>{!! $tintuc->noidung ? mb_substr($tintuc->noidung, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Ngày tạo</th><td><p class="c_timezone">{{ $tintuc->created_at }}</p></td></tr>
            <tr><th>Ngày sửa</th><td><p class="c_timezone">{{ $tintuc->updated_at }}</p></td></tr>
            <tr><th>Hình ảnh</th><td>{!! $tintuc->image ? "<img  class='show-images' src='".cxl_asset($tintuc->image->url)."' alt=''>" : "<span class='not-set'>(not set)</span>"!!}</td></tr>

            <tr><th>Meta title</th><td>{!! $tintuc->seo_title ? $tintuc->seo_title : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Friendly URL</th><td>{!! $tintuc->seo_url ? $tintuc->seo_url : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Meta description</th><td>{!! $tintuc->seo_description ? mb_substr($tintuc->seo_description, 0, 300) : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Meta keyword</th><td>{!! $tintuc->seo_keyword ? $tintuc->seo_keyword : "<span class='not-set'>(not set)</span>"  !!}</td></tr>

        </tbody>
    </table>

@endsection

@push('css')

@endpush

@push('scripts')

@endpush
