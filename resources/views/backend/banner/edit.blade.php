@extends('backend.index')

@section('title', 'Cập nhật banner')

@section('controller','Quản lý banner')
@section('controller_route', route('banner.index'))
@section('action','Cập nhật')

@section('content')
    <form action="{{ route('banner.update', $banner_detail->id) }}" method='POST' enctype="multipart/form-data"
          autocomplete="off">
        {{ method_field('PUT') }}
        <div class="col-sm-12">
            @include('backend.block.error')
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Thông tin chung</a></li>
        </ul>
        <div class="tab-content" style="margin: 50px 0px">
            <div id="home" class="tab-pane fade in active">
                <div class="col-md-8">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Tên banner</label>
                        <input type="text" class="form-control" name="name"
                               value="{{ isset($banner_detail->name) ? $banner_detail->name : '' }}">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="">Chọn trạng thái</option>
                            @if ($banner_detail->status == 1)
                                <option value="1" selected>Hiển thị</option>
                                <option value="0">không hiển thị</option>
                            @else
                                <option value="1">Hiển thị</option>
                                <option value="0" selected>Không hiển thị</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <input type="text" name="content" id="" class="form-control" value="{{ !empty($banner_detail->content) ? $banner_detail->content : ''}}"
                               style="height: 70px">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        @if (!empty($banner_detail->image))
                            <img src="{{ asset($banner_detail->image) }}"
                                 class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">
                        @endif
                        <div class="file-loading">
                            <input id="inpImg" name="fImage" type="file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 box-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>

    </form>
    @endsection
