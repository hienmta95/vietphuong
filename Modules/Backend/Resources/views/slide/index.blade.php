@extends('backend::layouts.main')
@section('page_title')
Quản lý slide
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li class="active">Danh sách</li>
</ul>
@endsection
@section('content')
<div class="sp-push-index">
    <p>
        <a class="btn btn-success" href="{{ route('backend.slide.create') }}">Tạo mới slide</a>
    </p>
    <div class="grid-view" id="w0">
        <div class="summary">
            <table class="table table-striped table-bordered table-style" id="datatables">
                <thead>
                    <tr>
                        <th class="un-orderable-col">#</th>
                        <th class="orderable-col">ID</th>
                        <th class="un-orderable-col">Hình ảnh</th>
                        <th class="un-orderable-col">Tiêu đề</th>
                        <th class="un-orderable-col">Link</th>
                        <th class="un-orderable-col">Hiển thị</th>
                        <th class="orderable-col">Ngày tạo</th>
                        <th class="un-orderable-col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $row)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->id }}</td>
                        <td><img src="{{ cxl_asset($row->image->url) }}"></td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->link }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->active == 1 ? 'Có hiển thị' : 'Không hiển thị' }}</td>
                        <td>
                            <form method="POST" action="{{ route("backend.slide.destroy", $row->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                <input name="_method" value="DELETE" type="hidden">
                                <input name="_token" value="{{ csrf_token() }}" type="hidden">
                                <a class="" href="{{ route("backend.slide.show", $row->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a class="" href="{{ route("backend.slide.edit", $row->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
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
