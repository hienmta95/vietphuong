@extends('backend::layouts.main')
@section('page_title')
Tạo mới tin tức
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.tintuc.index') }}">Danh sách</a></li>
    <li class="active">Tạo mới tin tức</li>
</ul>
@endsection
@section('content')
    {{--<h1>Create tintuc</h1>--}}
    <div class="sp-push-form">
        <form id="tintuc_create" action="{{ route('backend.tintuc.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group @if (count($errors->all())) {{$errors->has(['loaitintuc_id']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Chọn loại tin tức<span class="required">*</span></label>
                <select class="form-control select2" data-live-search="true" name="loaitintuc_id" required>
                    <option value="">Chọn</option>
                    @foreach ($loaitintuc as $item)
                        <option value="{{ $item->id }}" {{ old('loaitintuc_id')==$item->id ? "selected" : "" }}>{{ $item->title }}</option>
                    @endforeach
                </select>
                <div class="help-block">@if($errors->has('loaitintuc_id')) {{ $errors->first('loaitintuc_id') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['title']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tiêu đề tin tức<span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('title') ? ' has-error' : '' }}" name="title" value="{{ old('title') }}">
                <div class="help-block">@if($errors->has('title')) {{ $errors->first('title') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['slug']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tên hiển thị trên link </label>
                <input type="text" class="form-control{{ $errors->has('slug') ? ' has-error' : '' }}" name="slug" value="{{ old('slug') }}" placeholder="placeholder">
                <div class="help-block">@if($errors->has('slug')) {{ $errors->first('slug') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['link']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Link to </label>
                <input type="text" class="form-control{{ $errors->has('link') ? ' has-error' : '' }}" name="link" value="{{ old('link') }}" placeholder="placeholder">
                <div class="help-block">@if($errors->has('link')) {{ $errors->first('link') }} @endif</div>
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
            <hr>
            <hr>
            <hr>
            <br>

            <h3>Tối ưu SEO</h3>
            <div class="form-group @if (count($errors->all())) {{$errors->has(['seo_title']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Meta title </label>
                <input type="text" class="form-control{{ $errors->has('seo_title') ? ' has-error' : '' }}" name="seo_title" value="{{ old('seo_title') }}">
                <div class="help-block">@if($errors->has('seo_title')) {{ $errors->first('seo_title') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['seo_url']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Friendly URL</label>
                <input type="text" class="form-control{{ $errors->has('seo_url') ? ' has-error' : '' }}" name="seo_url" value="{{ old('seo_url') }}">
                <div class="help-block">@if($errors->has('seo_url')) {{ $errors->first('seo_url') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['seo_description']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Meta description </label>
                <textarea id="seo_description" class="form-control{{ $errors->has('seo_description') ? ' has-error' : '' }}" name="seo_description" rows="2">{{ old('seo_description') }}</textarea>
                <div class="help-block">@if($errors->has('seo_description')) {{ $errors->first('seo_description') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['seo_keyword']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Meta keyword </label>
                <input type="text" class="form-control{{ $errors->has('seo_keyword') ? ' has-error' : '' }}" name="seo_keyword" value="{{ old('seo_keyword') }}">
                <div class="help-block">@if($errors->has('seo_keyword')) {{ $errors->first('seo_keyword') }} @endif</div>
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

        })
    </script>

@endpush
