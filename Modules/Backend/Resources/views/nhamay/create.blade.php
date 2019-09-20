@extends('backend::layouts.main')
@section('page_title')
Tạo mới nhà máy
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.nhamay.index') }}">Danh sách</a></li>
    <li class="active">Tạo mới nhà máy</li>
</ul>
@endsection
@section('content')
    <div class="sp-push-form">
        <form action="{{ route('backend.nhamay.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


            <div class="form-group @if (count($errors->all())) {{$errors->has(['type']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Chọn thể loại <span class="required">*</span></label>
                <select class="form-control select2" data-live-search="true" name="type" required>
                    <option value="">Chọn</option>
                    <option value="1" {{ old('type') == '1' ? "selected" : "" }}>Văn phòng và nhà máy </option>
                    <option value="2" {{ old('type') == '2' ? "selected" : "" }}>Chi nhánh </option>
                </select>
                <div class="help-block">@if($errors->has('type')) {{ $errors->first('type') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['title']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tiêu đề <span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('title') ? ' has-error' : '' }}" name="title" value="{{ old('title') }}">
                <div class="help-block">@if($errors->has('title')) {{ $errors->first('title') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['address']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Địa chỉ<span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('address') ? ' has-error' : '' }}" name="address" value="{{ old('address') }}">
                <div class="help-block">@if($errors->has('address')) {{ $errors->first('address') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['phone']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Số điện thoại </label>
                <input type="text" class="form-control{{ $errors->has('phone') ? ' has-error' : '' }}" name="phone" value="{{ old('phone') }}">
                <div class="help-block">@if($errors->has('phone')) {{ $errors->first('phone') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['email']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Email <span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}">
                <div class="help-block">@if($errors->has('email')) {{ $errors->first('email') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['fax']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Fax</label>
                <input type="text" class="form-control{{ $errors->has('fax') ? ' has-error' : '' }}" name="fax" value="{{ old('fax') }}">
                <div class="help-block">@if($errors->has('fax')) {{ $errors->first('fax') }} @endif</div>
            </div>

            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>

        </form>
    </div>

@endsection

@push('scripts')

@endpush
