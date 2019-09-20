@extends('backend::layouts.main')
@section('page_title')
    Sửa thông tin nhà máy: {{ $nhamay->title ? $nhamay->title : ''}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
        <li><a href="{{ route('backend.nhamay.index') }}">Danh sách</a></li>
        <li><a href="{{ route('backend.nhamay.show', $nhamay->id) }}">{{ $nhamay->title ? $nhamay->title : ''}}</a></li>
        <li class="active">Update</li>
    </ul>
@endsection
@section('content')
    <div class="sp-push-form">
        <form action="{{ route('backend.nhamay.update', $nhamay->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT"/>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['type']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Chọn loại tin tức<span class="required">*</span></label>
                <select class="form-control select2" data-live-search="true" name="type" required>
                    <option value="1" {{ $nhamay->type == '1' ? "selected" : "" }}>Văn phòng và nhà máy </option>
                    <option value="2" {{ $nhamay->type == '2' ? "selected" : "" }}>Chi nhánh</option>
                </select>
                <div class="help-block">@if($errors->has('type')) {{ $errors->first('type') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['title']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tên nhà máy<span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('title') ? ' has-error' : '' }}" name="title" value="{{ $nhamay->title }}">
                <div class="help-block">@if($errors->has('title')) {{ $errors->first('title') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['address']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Địa chỉ <span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('address') ? ' has-error' : '' }}" name="address" value="{{ $nhamay->address }}">
                <div class="help-block">@if($errors->has('address')) {{ $errors->first('address') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['phone']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Số điện thoại </label>
                <input type="text" class="form-control{{ $errors->has('phone') ? ' has-error' : '' }}" name="phone" value="{{ $nhamay->phone }}">
                <div class="help-block">@if($errors->has('phone')) {{ $errors->first('phone') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['email']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Email  <span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ $nhamay->email }}">
                <div class="help-block">@if($errors->has('email')) {{ $errors->first('email') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['fax']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Fax </label>
                <input type="text" class="form-control{{ $errors->has('fax') ? ' has-error' : '' }}" name="fax" value="{{ $nhamay->fax }}">
                <div class="help-block">@if($errors->has('fax')) {{ $errors->first('fax') }} @endif</div>
            </div>

            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')

@endpush



