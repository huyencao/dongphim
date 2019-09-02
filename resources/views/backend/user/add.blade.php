@extends('backend.index')
@section('controller','Quản lý tài khoản')
@section('controller_route', route('user.index'))
@section('title', 'Thêm tài khoản')
@section('action','Thêm')
@section('content')
    @if(Auth::user())
        <?php $user = Auth::user(); ?>
        <div class="row">
            <form action="{{ route('user.store') }}" method='POST' enctype="multipart/form-data" autocomplete="off">
                <div class="col-sm-12">
                    @include('backend.block.error')
                </div>
                <div class="col-md-8">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" class="form-control" name="name"
                               value="{!! old('name') !!}">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" value="{!! old('phone') !!}">
                    </div>
                    <div class="form-group">
                        <label>Tài khoản</label>
                        <input type="text" class="form-control" name="user_name" value="{!! old('user_name') !!}">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="repassword" value="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{!! old('email') !!}">
                    </div>
                    <div class="form-group">
                        <label>Vai trò</label>
                        <select name="level" class="form-control">
                            <option value="1" selected>Người quản lý</option>
                            <option value="2">Biên tập viên</option>
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="status" checked name="status">
                        <label class="form-check-label" for="status">
                            <select name="status" class="form-control">
                                <option value="#">Chọn trạng thái</option>
                                <option value="1">Họat động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </label>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
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
            </form>
        </div>
    @endif
@endsection