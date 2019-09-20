@extends('backend::layouts.main')
@section('page_title')
{{ $hethongphanphoi->title ? $hethongphanphoi->title : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.hethongphanphoi.index') }}">Danh sách</a></li>
    <li class="active">{{ $hethongphanphoi->title ? $hethongphanphoi->title : "" }}</li>
</ul>
@endsection
@section('content')
    <p>
        {!! Form::open(['route'=>['backend.hethongphanphoi.destroy', $hethongphanphoi->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.hethongphanphoi.create') }}">Tạo mới</a>
        <a class="btn btn-primary" href="{{ route('backend.hethongphanphoi.edit', $hethongphanphoi->id) }}">Sửa</a>
        {!! Form::submit('Xoá',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $hethongphanphoi->id }}</td></tr>
            <tr><th>Tiêu đề</th><td>{{ $hethongphanphoi->title }}</td></tr>
            <tr><th>Slug</th><td>{!! $hethongphanphoi->slug ? $hethongphanphoi->slug : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Address</th><td>{!! $hethongphanphoi->address ? $hethongphanphoi->address : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Phone</th><td>{!! $hethongphanphoi->phone ? $hethongphanphoi->phone : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Maps</th><td>{!! $hethongphanphoi->maps ? $hethongphanphoi->maps : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Ngày tạo</th><td><p class="c_timezone">{{ $hethongphanphoi->created_at }}</p></td></tr>
            <tr><th>Ngày sửa</th><td><p class="c_timezone">{{ $hethongphanphoi->updated_at }}</p></td></tr>
        </tbody>
    </table>

@endsection

@push('css')

@endpush

@push('scripts')

@endpush
