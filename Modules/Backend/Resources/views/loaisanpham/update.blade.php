@extends('backend::layouts.main')
@section('page_title')
    Sửa thông tin loại sản phẩm: {{ $loaisanpham->title ? $loaisanpham->title : ''}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
        <li><a href="{{ route('backend.loaisanpham.index') }}">Danh sách</a></li>
        <li><a href="{{ route('backend.loaisanpham.show', $loaisanpham->id) }}">{{ $loaisanpham->title ? $loaisanpham->title : ''}}</a></li>
        <li class="active">Update</li>
    </ul>
@endsection
@section('content')
    {{--<h1>Sửa thông tin loại sản phẩm: {{ $loaisanpham->title ? $loaisanpham->title : ''}}</h1>--}}
    <div class="sp-push-form">
        <form action="{{ route('backend.loaisanpham.update', $loaisanpham->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT"/>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['title']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tên loại sản phẩm<span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('title') ? ' has-error' : '' }}" name="title" value="{{ $loaisanpham->title }}">
                <div class="help-block">@if($errors->has('title')) {{ $errors->first('title') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['slug']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tên hiển thị trên link</label>
                <input type="text" class="form-control{{ $errors->has('slug') ? ' has-error' : '' }}" name="slug" value="">
                <div class="help-block">@if($errors->has('slug')) {{ $errors->first('slug') }} @endif</div>
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



