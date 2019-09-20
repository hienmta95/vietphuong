@extends('backend::layouts.main')
@section('page_title')
Chi tiết: {{ $doitac->title ? $doitac->title : "" }}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.doitac.index') }}">Danh sách </a></li>
    <li class="active">{{ $doitac->title ? $doitac->title : "" }}</li>
</ul>
@endsection
@section('content')
    <p>
        {!! Form::open(['route'=>['backend.doitac.destroy', $doitac->id], 'method'=>'DELETE']) !!}
        <a class="btn btn-success" href="{{ route('backend.doitac.create') }}">Create đối tác</a>
        <a class="btn btn-primary" href="{{ route('backend.doitac.edit', $doitac->id) }}">Update</a>
        {!! Form::submit('Delete',['class'=>'btn btn-danger confirm','onclick'=>'return confirm("Are you sure you want to delete this item?");']) !!}
    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>ID</th><td>{{ $doitac->id }}</td></tr>
            <tr><th>Tiêu đề</th><td>{!! $doitac->title ? $doitac->title : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Link to</th><td>{!! $doitac->link ? $doitac->link : "<span class='not-set'>(not set)</span>"  !!}</td></tr>
            <tr><th>Created At</th><td><p class="c_timezone">{{ $doitac->created_at }}</p></td></tr>
            <tr><th>Updated At</th><td><p class="c_timezone">{{ $doitac->updated_at }}</p></td></tr>

            <tr><th>Image</th><td>{!! $doitac->image ? "<img  class='show-images' src='".cxl_asset($doitac->image->url)."' alt=''>" : "<span class='not-set'>(not set)</span>"!!}</td></tr>

        </tbody>
    </table>

@endsection

@push('scripts')

@endpush
