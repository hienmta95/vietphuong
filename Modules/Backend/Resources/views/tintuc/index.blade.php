@extends('backend::layouts.main')
@section('page_title')
    Quản lý tin tức
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
        <li class="active">Quản lý tin tức</li>
    </ul>
@endsection
@section('content')
    <div class="sp-push-index">
        <p>
            <a class="btn btn-success" href="{{ route('backend.tintuc.create') }}">Tạo mới tin tức</a>
        </p>
        <div class="grid-view" id="w0">
            <div class="summary">
                <table class="table table-striped table-bordered table-style" id="datatables">
                    <thead>
                    <tr>
                        <th class="un-orderable-col">#</th>
                        <th class="orderable-col">ID</th>
                        <th class="un-orderable-col">Tên tin tức</th>
                        <th class="un-orderable-col">Loại tin tức</th>
                        <th class="un-orderable-col">Hình ảnh</th>
                        <th class="orderable-col">Ngày lập</th>
                        <th class="un-orderable-col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->loaitintuc->title }}</td>
                            <td><img src="{{ cxl_asset($row->image->url) }}"></td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                <form method="POST" action="{{ route("backend.tintuc.destroy", $row->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    <input name="_method" value="DELETE" type="hidden">
                                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                                    <a class="" href="{{ route("backend.tintuc.show", $row->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a class="" href="{{ route("backend.tintuc.edit", $row->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <button type="submit" class="submit-with-icon">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
