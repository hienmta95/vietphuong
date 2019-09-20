@extends('backend::layouts.main')
@section('page_title')
    Sửa thông tin: {{ $sanpham->title ? $sanpham->title : ''}}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ route('backend.dashboard') }}">Home</a></li>
        <li><a href="{{ route('backend.sanpham.index') }}">Danh sách</a></li>
        <li><a href="{{ route('backend.sanpham.show', $sanpham->id) }}">{{ $sanpham->title ? $sanpham->title : ''}}</a></li>
        <li class="active">Update</li>
    </ul>
@endsection
@section('content')
    {{--    <h1>Sửa thông tin phòng: {{ $sanpham->title ? $sanpham->title : ''}}</h1>--}}
    <div class="sp-push-form">
        <form action="{{ route('backend.sanpham.update', $sanpham->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT"/>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['loaisanpham_id']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Chọn loại sản phẩm<span class="required">*</span></label>
                <select class="form-control select2" data-live-search="true" name="loaisanpham_id" required>
                    @foreach ($loaisanpham as $item)
                        @if(old('loaisanpham_id'))
                            <option value="{{ $item->id }}" {{ old('loaisanpham_id')==$item->id ? "selected" : "" }}>{{ $item->title }}</option>
                        @else
                            <option value="{{ $item->id }}" {{ $sanpham->loaisanpham->id==$item->id ? "selected" : "" }}>{{ $item->title }}</option>
                        @endif
                    @endforeach
                </select>
                <div class="help-block">@if($errors->has('loaisanpham_id')) {{ $errors->first('loaisanpham_id') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['title']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tên sản phẩm <span class="required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('title') ? ' has-error' : '' }}" name="title" value="{{ $sanpham->title }}">
                <div class="help-block">@if($errors->has('title')) {{ $errors->first('title') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['slug']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Tên hiển thị trên link</label>
                <input type="text" class="form-control{{ $errors->has('slug') ? ' has-error' : '' }}" name="slug" value="">
                <div class="help-block">@if($errors->has('slug')) {{ $errors->first('slug') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['description']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Mô tả ngắn <span class="required">*</span></label>
                <textarea id="description" class="form-control{{ $errors->has('description') ? ' has-error' : '' }}" name="description" rows="3">{{ $sanpham->description }}</textarea>
                <div class="help-block">@if($errors->has('description')) {{ $errors->first('description') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['thanhphan']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Thành phần <span class="required">*</span></label>
                <textarea id="thanhphan" class="form-control{{ $errors->has('thanhphan') ? ' has-error' : '' }}" name="thanhphan" rows="3">{{ $sanpham->thanhphan }}</textarea>
                <div class="help-block">@if($errors->has('thanhphan')) {{ $errors->first('thanhphan') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['chidinh']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Chỉ định <span class="required">*</span></label>
                <textarea id="chidinh" class="form-control{{ $errors->has('chidinh') ? ' has-error' : '' }}" name="chidinh" maxlength="255" rows="3">{{ $sanpham->chidinh }}</textarea>
                <div class="help-block">@if($errors->has('chidinh')) {{ $errors->first('chidinh') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['lieuluong']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Liều lượng <span class="required">*</span></label>
                <textarea id="lieuluong" class="form-control{{ $errors->has('lieuluong') ? ' has-error' : '' }}" name="lieuluong" maxlength="255" rows="3">{{ $sanpham->lieuluong }}</textarea>
                <div class="help-block">@if($errors->has('lieuluong')) {{ $errors->first('lieuluong') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['chongchidinh']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Chống chỉ định <span class="required">*</span></label>
                <textarea id="chongchidinh" class="form-control{{ $errors->has('chongchidinh') ? ' has-error' : '' }}" name="chongchidinh" maxlength="255" rows="3">{{ $sanpham->chongchidinh }}</textarea>
                <div class="help-block">@if($errors->has('chongchidinh')) {{ $errors->first('chongchidinh') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['khuyencao']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Khuyến cáo <span class="required">*</span></label>
                <textarea id="khuyencao" class="form-control{{ $errors->has('khuyencao') ? ' has-error' : '' }}" name="khuyencao" maxlength="255" rows="3">{{ $sanpham->khuyencao }}</textarea>
                <div class="help-block">@if($errors->has('khuyencao')) {{ $errors->first('khuyencao') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['trinhbay']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Trình bày <span class="required">*</span></label>
                <textarea id="trinhbay" class="form-control{{ $errors->has('trinhbay') ? ' has-error' : '' }}" name="trinhbay" maxlength="255" rows="3">{{ $sanpham->trinhbay }}</textarea>
                <div class="help-block">@if($errors->has('trinhbay')) {{ $errors->first('trinhbay') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['timhieuthem']) ? 'has-error' : 'has-success'}} @endif">
                <label class="control-label">Tìm hiểu thêm <span class="required">*</span></label>
                <textarea id="timhieuthem" class="form-control{{ $errors->has('timhieuthem') ? ' has-error' : '' }}" name="timhieuthem" maxlength="255" rows="3">{{ $sanpham->timhieuthem }}</textarea>
                <div class="help-block">@if($errors->has('timhieuthem')) {{ $errors->first('timhieuthem') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['image']) ? 'has-error' : 'has-success'}} @endif">
                <div>
                    <img class="show-images"  class="img-thumbnail" src="{!! $sanpham->image ? cxl_asset($sanpham->image->url) : ""!!}" alt="web_image" title="image">
                </div>
                <label class="control-label">Hình ảnh </label>
                <input type="hidden" name="image_old" value="{{ $sanpham->image_id  }}">
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
                <input type="text" class="form-control{{ $errors->has('seo_title') ? ' has-error' : '' }}" name="seo_title" value="{{ $sanpham->seo_title }}">
                <div class="help-block">@if($errors->has('seo_title')) {{ $errors->first('seo_title') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['seo_url']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Friendly URL </label>
                <input type="text" class="form-control{{ $errors->has('seo_url') ? ' has-error' : '' }}" name="seo_url" value="{{ $sanpham->seo_url }}">
                <div class="help-block">@if($errors->has('seo_url')) {{ $errors->first('seo_url') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['seo_description']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Meta description </label>
                <textarea id="seo_description" class="form-control{{ $errors->has('seo_description') ? ' has-error' : '' }}" name="seo_description" rows="2">{{ $sanpham->seo_description }}</textarea>
                <div class="help-block">@if($errors->has('seo_description')) {{ $errors->first('seo_description') }} @endif</div>
            </div>

            <div class="form-group @if (count($errors->all())) {{$errors->has(['seo_keyword']) ? 'has-error' : 'has-success'}} @endif" >
                <label class="control-label">Meta keyword </label>
                <input type="text" class="form-control{{ $errors->has('seo_keyword') ? ' has-error' : '' }}" name="seo_keyword" value="{{ $sanpham->seo_keyword }}">
                <div class="help-block">@if($errors->has('seo_keyword')) {{ $errors->first('seo_keyword') }} @endif</div>
            </div>

            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')

    <script>
        $(function () {
            CKEDITOR.replace('thanhphan',{
                language:'vi',
                filebrowserBrowseUrl :'/public/js/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            });
            CKEDITOR.replace('chidinh',{
                language:'vi',
                filebrowserBrowseUrl :'/public/js/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            });
            CKEDITOR.replace('lieuluong',{
                language:'vi',
                filebrowserBrowseUrl :'/public/js/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            });
            CKEDITOR.replace('chongchidinh',{
                language:'vi',
                filebrowserBrowseUrl :'/public/js/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            });
            CKEDITOR.replace('khuyencao',{
                language:'vi',
                filebrowserBrowseUrl :'/public/js/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            });
            CKEDITOR.replace('trinhbay',{
                language:'vi',
                filebrowserBrowseUrl :'/public/js/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl : '/public/js/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : '/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            });
            CKEDITOR.replace('timhieuthem',{
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
