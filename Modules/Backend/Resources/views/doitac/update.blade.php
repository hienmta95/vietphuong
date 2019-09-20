@extends('backend::layouts.main')
@section('page_title')
Sửa: {{ $doitac->name ? $doitac->name : ''}}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.doitac.index') }}">Danh sách</a></li>
    <li><a href="{{ route('backend.doitac.show', $doitac->id) }}">{{ $doitac->name ? $doitac->name : ''}}</a></li>
    <li class="active">Update</li>
</ul>
@endsection
@section('content')
    <div class="sp-push-form">
        <form action="{{ route('backend.doitac.update', $doitac->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <input type="hidden" name="_method" value="PUT"/>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['image']) ? 'has-error' : 'has-success'}} @endif">
                <div>
                    <img class="show-images"  class="img-thumbnail" src="{!! $doitac->image ? cxl_asset($doitac->image->url) : ""!!}" alt="web_image" title="image">
                </div>
                <label class="control-label">Hình ảnh <span class="required">*</span></label>
                <input type="hidden" name="image_old" value="{{ $doitac->image_id  }}">
                <input id="input-b1" name="image" type="file" class="file" accept=".jpg,.gif,.png,.jpeg">
                <div class="help-block">@if($errors->has('image')) {{ $errors->first('image') }} @endif</div>
            </div>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['title']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label" for="role-name">Tiêu đề</label>
                <input id="role-name" class="form-control{{ $errors->has('title') ? ' has-error' : '' }}" name="title" type="text" value="{{ $doitac->title }}">
                <div class="help-block">@if($errors->has('title')) {{ $errors->first('title') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['link']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label" for="role-link">Link</label>
                <textarea id="role-link" class="form-control{{ $errors->has('link') ? ' has-error' : '' }}" name="link" maxlength="255" rows="3">{{ $doitac->link }}</textarea>
                <div class="help-block">@if($errors->has('link')) {{ $errors->first('link') }} @endif</div>
            </div>

            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')

@endpush
