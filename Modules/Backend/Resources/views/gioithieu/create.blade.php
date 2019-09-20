@extends('backend::layouts.main')
@section('page_title')
Tạo mới giới thiệu
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.gioithieu.index') }}">Danh sách</a></li>
    <li class="active">Tạo mới giới thiệu</li>
</ul>
@endsection
@section('content')
    <div class="sp-push-form">
        <form id="gioithieu_create" action="{{ route('backend.gioithieu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group @if (count($errors->all())) {{$errors->has(['title1']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tiêu đề 1<span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('title1') ? ' has-error' : '' }}" name="title1" value="{{ old('title1') }}">
                <div class="help-block">@if($errors->has('title1')) {{ $errors->first('title1') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['title2']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tiêu đề 2<span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('title2') ? ' has-error' : '' }}" name="title2" value="{{ old('title2') }}">
                <div class="help-block">@if($errors->has('title2')) {{ $errors->first('title2') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['order']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Thứ tự xuất hiện <span class="required">*</span></label>
                <input type="number" class="form-control{{ $errors->has('order') ? ' has-error' : '' }}" name="order" value="{{ old('order') }}" placeholder="placeholder">
                <div class="help-block">@if($errors->has('order')) {{ $errors->first('order') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['slug']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tên hiển thị trên link </label>
                <input type="text" class="form-control{{ $errors->has('slug') ? ' has-error' : '' }}" name="slug" value="{{ old('slug') }}" placeholder="placeholder">
                <div class="help-block">@if($errors->has('slug')) {{ $errors->first('slug') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['description']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Mô tả ngắn <span class="required">*</span></label>
                <textarea id="description" class="form-control{{ $errors->has('description') ? ' has-error' : '' }}" name="description" rows="5">{{ old('description') }}</textarea>
                <div class="help-block">@if($errors->has('description')) {{ $errors->first('description') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['noidung']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Nội dung<span class="required">*</span></label>
                <textarea id="noidung" class="form-control{{ $errors->has('noidung') ? ' has-error' : '' }}" name="noidung" rows="2">{{ old('noidung') }}</textarea>
                <div class="help-block">@if($errors->has('noidung')) {{ $errors->first('noidung') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['image']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Hình ảnh <span class="required">*</span></label>
                <input id="input-b1" name="image" type="file" class="file" accept=".jpg,.gif,.png,.jpeg">
                <div class="help-block">@if($errors->has('image')) {{ $errors->first('image') }} @endif</div>
            </div>

            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Lưu</button>
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
