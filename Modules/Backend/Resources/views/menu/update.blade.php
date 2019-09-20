@extends('backend::layouts.main')
@section('page_title')
Sửa: {{ $menu->title ? $menu->title : ''}}
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li><a href="{{ route('backend.menu.index') }}">Danh sách</a></li>
    <li><a href="{{ route('backend.menu.show', $menu->id) }}">{{ $menu->title ? $menu->title : ''}}</a></li>
    <li class="active">Update</li>
</ul>
@endsection
@section('content')
    <div class="sp-push-form">
        <form action="{{ route('backend.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <input type="hidden" name="_method" value="PUT"/>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['title']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label" for="role-name">Tiêu đề <span class="required">*</span></label>
                <input id="role-name" class="form-control{{ $errors->has('title') ? ' has-error' : '' }}" name="title" type="text" value="{{ $menu->title }}">
                <div class="help-block">@if($errors->has('title')) {{ $errors->first('title') }} @endif</div>
            </div>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['link']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label" for="role-name">Link to</label>
                <input id="role-name" class="form-control{{ $errors->has('link') ? ' has-error' : '' }}" name="link" type="text" value="{{ $menu->link }}">
                <div class="help-block">@if($errors->has('link')) {{ $errors->first('link') }} @endif</div>
            </div>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['order']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label" for="role-name">Số thứ tự hiển thị <span class="required">*</span></label>
                <input id="role-name" class="form-control{{ $errors->has('order') ? ' has-error' : '' }}" name="order" type="text" value="{{ $menu->order }}">
                <div class="help-block">@if($errors->has('order')) {{ $errors->first('order') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['parent_id']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Là menu con của menu </label>
                <select class="form-control select2" data-live-search="true" name="parent_id">
                    <option value="">Chọn</option>
                    @foreach ($menus as $item)
                        <option value="{{ $item->id }}" {{ $menu->parent_id == $item->id ? "selected" : "" }}>{{ $item->title }}</option>
                    @endforeach
                </select>
                <div class="help-block">@if($errors->has('parent_id')) {{ $errors->first('parent_id') }} @endif</div>
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
