@extends('backend::layouts.main')
@section('page_title')
    Sửa thông tin hệ thống phân phối: {{ $hethongphanphoi->title ? $hethongphanphoi->title : ''}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
        <li><a href="{{ route('backend.hethongphanphoi.index') }}">Danh sách</a></li>
        <li><a href="{{ route('backend.hethongphanphoi.show', $hethongphanphoi->id) }}">{{ $hethongphanphoi->title ? $hethongphanphoi->title : ''}}</a></li>
        <li class="active">Update</li>
    </ul>
@endsection
@section('content')
    <div class="sp-push-form">
        <form action="{{ route('backend.hethongphanphoi.update', $hethongphanphoi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT"/>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['title']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tên hệ thống phân phối<span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('title') ? ' has-error' : '' }}" name="title" value="{{ $hethongphanphoi->title }}">
                <div class="help-block">@if($errors->has('title')) {{ $errors->first('title') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['slug']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tên hiển thị trên link</label>
                <input type="text" class="form-control{{ $errors->has('slug') ? ' has-error' : '' }}" name="slug" value="">
                <div class="help-block">@if($errors->has('slug')) {{ $errors->first('slug') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['address']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Địa chỉ <span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('address') ? ' has-error' : '' }}" name="address" value="{{ $hethongphanphoi->address }}">
                <div class="help-block">@if($errors->has('address')) {{ $errors->first('address') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['phone']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Số điện thoại <span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('phone') ? ' has-error' : '' }}" name="phone" value="{{ $hethongphanphoi->phone }}">
                <div class="help-block">@if($errors->has('phone')) {{ $errors->first('phone') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['maps']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Google maps <span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('maps') ? ' has-error' : '' }}" name="maps" value="{{ $hethongphanphoi->maps }}">
                <div class="help-block">@if($errors->has('maps')) {{ $errors->first('maps') }} @endif</div>
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



