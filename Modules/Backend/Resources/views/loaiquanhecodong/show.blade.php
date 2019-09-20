@extends('backend::layouts.main')
@section('page_title')
{{ $loaiquanhecodong->title ? $loaiquanhecodong->title : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.loaiquanhecodong.index') }}">Danh sách</a></li>
    <li class="active">{{ $loaiquanhecodong->title ? $loaiquanhecodong->title : "" }}</li>
</ul>
@endsection
@section('content')
    <p>
        {!! Form::open(['route'=>['backend.loaiquanhecodong.destroy', $loaiquanhecodong->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.loaiquanhecodong.create') }}">Tạo mới</a>
        <a class="btn btn-primary" href="{{ route('backend.loaiquanhecodong.edit', $loaiquanhecodong->id) }}">Sửa</a>
        {!! Form::submit('Xoá',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $loaiquanhecodong->id }}</td></tr>
            <tr><th>Tiêu đề</th><td>{{ $loaiquanhecodong->title }}</td></tr>
            <tr><th>Slug</th><td>{!! $loaiquanhecodong->slug ? $loaiquanhecodong->slug : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Ngày tạo</th><td><p class="c_timezone">{{ $loaiquanhecodong->created_at }}</p></td></tr>
            <tr><th>Ngày sửa</th><td><p class="c_timezone">{{ $loaiquanhecodong->updated_at }}</p></td></tr>
        </tbody>
    </table>

@endsection

@push('css')

@endpush

@push('scripts')

@endpush
