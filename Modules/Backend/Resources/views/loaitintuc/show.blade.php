@extends('backend::layouts.main')
@section('page_title')
{{ $loaitintuc->title ? $loaitintuc->title : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.loaitintuc.index') }}">Danh sách</a></li>
    <li class="active">{{ $loaitintuc->title ? $loaitintuc->title : "" }}</li>
</ul>
@endsection
@section('content')
    <p>
        {!! Form::open(['route'=>['backend.loaitintuc.destroy', $loaitintuc->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.loaitintuc.create') }}">Tạo mới</a>
        <a class="btn btn-primary" href="{{ route('backend.loaitintuc.edit', $loaitintuc->id) }}">Sửa</a>
        {!! Form::submit('Xoá',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $loaitintuc->id }}</td></tr>
            <tr><th>Tiêu đề</th><td>{{ $loaitintuc->title }}</td></tr>
            <tr><th>Slug</th><td>{!! $loaitintuc->slug ? $loaitintuc->slug : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Ngày tạo</th><td><p class="c_timezone">{{ $loaitintuc->created_at }}</p></td></tr>
            <tr><th>Ngày sửa</th><td><p class="c_timezone">{{ $loaitintuc->updated_at }}</p></td></tr>
        </tbody>
    </table>

@endsection

@push('css')

@endpush

@push('scripts')

@endpush
