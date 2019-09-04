@extends('backend.index')

@section('title', 'Thêm diễn viên')

@section('controller','Quản lý diễn diên')
@section('controller_route', route('actor.index'))
@section('action','Thêm')

@section('content')
    <form action="{{ route('actor.store') }}" method='POST' enctype="multipart/form-data" autocomplete="off">
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
                        <label>Tên diễn viên</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="">Chọn trạng thái</option>
                            <option value="1">Hiển thị</option>
                            <option value="0">Không hiển thị</option>
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
