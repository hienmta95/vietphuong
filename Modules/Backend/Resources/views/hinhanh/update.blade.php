@extends('backend::layouts.main')
@section('page_title')
    Sửa thông tin: {{ $hinhanh->title ? $hinhanh->title : ''}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
        <li><a href="{{ route('backend.hinhanh.index') }}">Danh sách</a></li>
        <li><a href="{{ route('backend.hinhanh.show', $hinhanh->id) }}">{{ $hinhanh->title ? $hinhanh->title : ''}}</a></li>
        <li class="active">Update</li>
    </ul>
@endsection
@section('content')
    <div class="sp-push-form">
        <form action="{{ route('backend.hinhanh.update', $hinhanh->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT"/>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['title']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tiêu đề<span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('title') ? ' has-error' : '' }}" name="title" value="{{ $hinhanh->title }}">
                <div class="help-block">@if($errors->has('title')) {{ $errors->first('title') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['type']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Chọn loại<span class="required">*</span></label>
                <select class="form-control select2" data-live-search="true" name="type" required>
                    <option value="">Chọn</option>
                    <option value="1" {{ $hinhanh->type == 1 ? 'selected' : '' }}>Hình ảnh</option>
                    <option value="2" {{ $hinhanh->type == 2 ? 'selected' : '' }}>Video </option>
                </select>
                <div class="help-block">@if($errors->has('type')) {{ $errors->first('type') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['video']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Video URL </label>
                <input type="text" class="form-control{{ $errors->has('video') ? ' has-error' : '' }}" name="video" value="{{ $hinhanh->video }}">
                <div class="help-block">@if($errors->has('video')) {{ $errors->first('video') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['image']) ? 'has-error' : 'has-success'}} @endif">
                <div>
                    <img class="show-images"  class="img-thumbnail" src="{!! $hinhanh->image ? cxl_asset($hinhanh->image->url) : ""!!}" alt="web_image" title="image">
                </div>
                <label class="control-label">Hình ảnh </label>
                <input type="hidden" name="image_old" value="{{ $hinhanh->image_id  }}">
                <input id="input-b1" name="image" type="file" class="file" accept=".jpg,.gif,.png,.jpeg">
                <div class="help-block">@if($errors->has('image')) {{ $errors->first('image') }} @endif</div>
            </div>

            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')

    <script>
        $(function () {
            CKEDITOR.replace('noidung',{
                language:'vi',
                filebrowserBrowseUrl :'/public/js/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            });

            CKEDITOR.replace('description',{
                language:'vi',
                filebrowserBrowseUrl :'/public/js/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            });
        })
    </script>

@endpush
