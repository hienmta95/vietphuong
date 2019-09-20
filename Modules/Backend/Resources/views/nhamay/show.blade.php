@extends('backend::layouts.main')
@section('page_title')
{{ $nhamay->title ? $nhamay->title : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.nhamay.index') }}">Danh sách</a></li>
    <li class="active">{{ $nhamay->title ? $nhamay->title : "" }}</li>
</ul>
@endsection
@section('content')
    <p>
        {!! Form::open(['route'=>['backend.nhamay.destroy', $nhamay->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.nhamay.create') }}">Tạo mới</a>
        <a class="btn btn-primary" href="{{ route('backend.nhamay.edit', $nhamay->id) }}">Sửa</a>
        {!! Form::submit('Xoá',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $nhamay->id }}</td></tr>
            <tr><th>Tiêu đề</th><td>{{ $nhamay->title }}</td></tr>
            <tr><th>Type</th><td>{!! $nhamay->type == '1' ? 'Nhà máy' : "Văn phòng đại diện"  !!}</td></tr>
            <tr><th>Address</th><td>{!! $nhamay->address ? $nhamay->address : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Phone</th><td>{!! $nhamay->phone ? $nhamay->phone : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Email </th><td>{!! $nhamay->email ? $nhamay->email : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Fax </th><td>{!! $nhamay->fax ? $nhamay->fax : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Ngày tạo</th><td><p class="c_timezone">{{ $nhamay->created_at }}</p></td></tr>
            <tr><th>Ngày sửa</th><td><p class="c_timezone">{{ $nhamay->updated_at }}</p></td></tr>
        </tbody>
    </table>

@endsection

@push('css')

@endpush

@push('scripts')

@endpush
