@extends('backend.index')

@section('title', 'Thêm banner')

@section('controller','Quản lý banner')
@section('controller_route', route('banner.index'))
@section('action','Thêm')

@section('content')
    <form action="{{ route('banner.store') }}" method='POST' enctype="multipart/form-data" autocomplete="off">
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
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="">Chọn trạng thái</option>
                            <option value="1">Kích hoạt</option>
                            <option value="0">Đóng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <input type="text" name="content" id="" class="form-control" value=""
                               style="height: 70px">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <div class="file-loading">
                            <input id="inpImg" name="fImage" type="file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 box-footer">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
        </div>
    </form>
@endsection
