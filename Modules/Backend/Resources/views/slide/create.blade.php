@extends('backend::layouts.main')
@section('page_title')
Tạo mới slide
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.slide.index') }}">Danh sách</a></li>
    <li class="active">Tạo mới slide</li>
</ul>
@endsection
@section('content')
    {{--<h1>Create slide</h1>--}}
    <div class="sp-push-form">
        <form action="{{ route('backend.slide.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

            <div class="form-group @if (count($errors->all())) {{$errors->has(['image']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Hình ảnh <span class="required">*</span></label>
                <input id="input-b1" name="image" type="file" class="file" accept=".jpg,.gif,.png,.jpeg">
                <div class="help-block">@if($errors->has('image')) {{ $errors->first('image') }} @endif</div>
            </div>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['title']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label" for="role-name">Tiêu đề</label>
                <input id="role-name" class="form-control{{ $errors->has('title') ? ' has-error' : '' }}" name="title" type="text" value="{{ old('title') }}">
                <div class="help-block">@if($errors->has('title')) {{ $errors->first('title') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['link']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label" for="role-link">Link</label>
                <textarea id="role-link" class="form-control{{ $errors->has('link') ? ' has-error' : '' }}" name="link" maxlength="255" rows="3">{{ old('link') }}</textarea>
                <div class="help-block">@if($errors->has('link')) {{ $errors->first('link') }} @endif</div>
            </div>
            
            <div class="form-group @if (count($errors->all())) {{$errors->has(['active']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Hiển thị hay không <span class="required">*</span></label>
                <div>
                    <label class="radio-inline"><input type="radio" name="active" value="1" @if(old('active') == 1) {!! 'checked'!!} @endif ><strong>Có</strong></label>
                    <label class="radio-inline"><input type="radio" name="active" value="0" @if(old('active') == 0) {!! 'checked'!!} @endif ><strong>Không</strong></label>
                </div>
                <div class="help-block">@if($errors->has('active')) {{ $errors->first('active') }} @endif</div>
            </div>

            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Create</button>
            </div>

        </form>
    </div>

@endsection

@push('scripts')

    <link rel="stylesheet" href="<?php echo cxl_asset('/backend/bower_components/bootstrap-fileinput/css/fileinput.css')?>" type="text/css">
    <link rel="stylesheet" href="<?php echo cxl_asset('/backend/bower_components/bootstrap-fileinput/css/fileinput-rtl.css')?>" type="text/css">
    <script src="{!! cxl_asset('/backend/bower_components/bootstrap-fileinput/js/plugins/piexif.js') !!}"></script>
    <script src="{!! cxl_asset('/backend/bower_components/bootstrap-fileinput/js/fileinput.js') !!}"></script>

@endpush
