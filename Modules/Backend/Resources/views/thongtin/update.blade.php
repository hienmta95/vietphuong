@extends('backend::layouts.main')
@section('page_title')
Update thông tin
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
    <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
    <li class="active">Update thông tin</li>
</ul>
@endsection
@section('content')
    <h1>Update thông tin website.</h1>
    <div class="sp-push-form">
        <form action="{{ route('backend.thongtin.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT"/>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['tencongty']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Tên công ty<span class="required">*</span></label>
                <input class="form-control{{ $errors->has('tencongty') ? ' has-error' : '' }}" name="tencongty" type="text" value="{{ $info->tencongty }}">
                <div class="help-block">@if($errors->has('tencongty')) {{ $errors->first('tencongty') }} @endif</div>
            </div>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['emailcongty']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Email công ty<span class="required">*</span></label>
                <input class="form-control{{ $errors->has('emailcongty') ? ' has-error' : '' }}" name="emailcongty" type="text" value="{{ $info->emailcongty }}">
                <div class="help-block">@if($errors->has('emailcongty')) {{ $errors->first('emailcongty') }} @endif</div>
            </div>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['diachicongty']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Địa chỉ trụ sở<span class="required">*</span></label>
                <input class="form-control{{ $errors->has('diachicongty') ? ' has-error' : '' }}" name="diachicongty" type="text" value="{{ $info->diachicongty }}">
                <div class="help-block">@if($errors->has('diachicongty')) {{ $errors->first('diachicongty') }} @endif</div>
            </div>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['sdtcongty']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">SĐT <span class="required">*</span></label>
                <input class="form-control{{ $errors->has('sdtcongty') ? ' has-error' : '' }}" name="sdtcongty" type="text" value="{{ $info->sdtcongty }}">
                <div class="help-block">@if($errors->has('sdtcongty')) {{ $errors->first('sdtcongty') }} @endif</div>
            </div>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['facebook']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Facebook</label>
                <input class="form-control{{ $errors->has('facebook') ? ' has-error' : '' }}" name="facebook" type="text" value="{{ $info->facebook }}">
                <div class="help-block">@if($errors->has('facebook')) {{ $errors->first('facebook') }} @endif</div>
            </div>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['youtube']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Youtube</label>
                <input class="form-control{{ $errors->has('youtube') ? ' has-error' : '' }}" name="youtube" type="text" value="{{ $info->youtube }}">
                <div class="help-block">@if($errors->has('youtube')) {{ $errors->first('youtube') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['tuyendung_description']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Tuyển dụng description </label>
                <textarea id="tuyendung_description" class="form-control{{ $errors->has('tuyendung_description') ? ' has-error' : '' }}" name="tuyendung_description" maxlength="255" rows="3">{{ $info->tuyendung_description }}</textarea>
                <div class="help-block">@if($errors->has('tuyendung_description')) {{ $errors->first('tuyendung_description') }} @endif</div>
            </div>

            <div class="form-group  @if (count($errors->all())) {{$errors->has(['chatbox']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Chatbox </label>
                <textarea id="chatbox" class="form-control{{ $errors->has('chatbox') ? ' has-error' : '' }}" name="chatbox" maxlength="255" rows="4">{{ $info->chatbox }}</textarea>
                <div class="help-block">@if($errors->has('chatbox')) {{ $errors->first('chatbox') }} @endif</div>
            </div>

            {{--<div class="form-group @if (count($errors->all())) {{$errors->has(['logo']) ? 'has-error' : 'has-success'}} @endif">--}}
                {{--@if(!empty($info->logo))--}}
                    {{--<div>--}}
                        {{--<img class="show-images"  class="img-thumbnail" src="{!! $info->logo ? cxl_asset($info->logo_image->url) : "" !!}" alt="web_image" title="logo">--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--<label class="control-label">Banner Hỏi đáp </label>--}}
                {{--<input type="hidden" name="logo_old" value="{{ $info->logo  }}">--}}
                {{--<input id="input-b1" name="logo" type="file" class="file" accept=".jpg,.gif,.png,.jpeg">--}}
                {{--<div class="help-block">@if($errors->has('logo')) {{ $errors->first('logo') }} @endif</div>--}}
            {{--</div>--}}

            <div class="form-group @if (count($errors->all())) {{$errors->has(['image']) ? 'has-error' : 'has-success'}} @endif">
                <div>
                    <img class="show-images"  class="img-thumbnail" src="{!! $info->logoImage ? cxl_asset($info->logoImage->url) : ""!!}" alt="web_image" title="image">
                </div>
                <label class="control-label">Banner Hỏi đáp <span class="required">*</span></label>
                <input type="hidden" name="logo_old" value="{{ $info->logo  }}">
                <input id="input-b1" name="logo" type="file" class="file" accept=".jpg,.gif,.png,.jpeg">
                <div class="help-block">@if($errors->has('logo')) {{ $errors->first('logo') }} @endif</div>
            </div>

            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script>
        $(function () {
            CKEDITOR.replace('tuyendung_description',{
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
