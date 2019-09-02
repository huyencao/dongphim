@extends('backend.index')
@section('controller','Quản lý tài khoản')
@section('controller_route', route('user.index'))
@section('title', 'Cập nhật tài khoản')

@section('action','Cập nhật')
@section('content')
    @if(Auth::user())
        <?php $user = Auth::user(); ?>
        <div class="row">
            <form action="{{ route('user.update', $data->id) }}" method='POST' enctype="multipart/form-data"
                  autocomplete="off">
                {!! method_field('PUT') !!}
                <div class="col-sm-12">
                    @include('backend.block.error')
                </div>
                <div class="col-md-8">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Họ và tên</label>
                        @if ($user->level == 1 && $user->user_name != 'gco_admin')
                            <input type="text" class="form-control" name="name"
                                   value="{!! old('name', isset($data->name) ? $data->name : null) !!}"
                                   @if ($data->user_name == 'gco_admin') disabled @endif>
                        @else
                            <input type="text" class="form-control" name="name"
                                   value="{!! old('name', isset($data->name) ? $data->name : null) !!}" f>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        @if ($user->level == 1 && $user->user_name != 'gco_admin')
                            <input type="text" class="form-control" name="phone"
                                   value="{!! old('phone', isset($data->phone) ? $data->phone : null) !!}"
                                   @if ($data->user_name == 'gco_admin') disabled @endif>
                        @else
                            <input type="text" class="form-control" name="phone"
                                   value="{!! old('phone', isset($data->phone) ? $data->phone : null) !!}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tài khoản</label>
{{--                        @if ($user->level == 1 && $user->user_name != 'gco_admin')--}}
{{--                            <input type="text" class="form-control" name="user_name"--}}
{{--                                   value="{{ isset($data->user_name) ? $data->user_name : '' }}"--}}
{{--                                   @if ($data->user_name == 'gco_admin') disabled @endif>--}}
{{--                        @else--}}
                            <input type="text" class="form-control" name="user_name"
                                   value="{{ isset($data->user_name) ? $data->user_name : '' }}" disabled>
{{--                        @endif--}}
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        @if ($user->level == 1 && $user->user_name != 'gco_admin')
                            <input type="text" class="form-control" name="email"
                                   value="{!! old('email', isset($data->email) ? $data->email : null) !!}"
                                   @if ($data->user_name == 'gco_admin') disabled @endif>
                        @else
                            <input type="text" class="form-control" name="email"
                                   value="{!! old('email', isset($data->email) ? $data->email : null) !!}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Vai trò</label>
                        <select name="level" class="form-control">
                            <option value="#">Chọn vai trò</option>
                            {{--                            user: level=1--}}
                            @if ($user->level == 1 && $user->user_name == 'gco_admin')
                                @if ($data->level == 1 && $data->user_name == 'gco_admin')
                                    <option value="1" disabled selected>Người quản lý</option>
                                @elseif ($data->level == 1 && $data->user_name != 'gco_admin')
                                    <option value="1" selected>Người quản lý</option>
                                    <option value="2">Biên tập viên</option>
                                @else
                                    <option value="1">Người quản lý</option>
                                    <option value="2" selected>Biên tập viên</option>
                                @endif
                            @elseif ($user->level == 1 && $user->user_name != 'gco_admin')
                                {{--                                user: level->1, name khac gco_admin --}}
                                @if ($data->level == 1 && $data->user_name == 'gco_admin')
                                    <option value="1" disabled selected>Người quản lý</option>
                                @elseif ($data->level == 1 && $data->name != 'gco_admin')
                                    <option value="1" selected>Người quản lý</option>
                                    <option value="2">Biên tập viên</option>
                                @else
                                    <option value="1">Người quản lý</option>
                                    <option value="2" selected>Biên tập viên</option>
                                @endif
                            @else
                                <option value="2" selected disabled>Biên tập viên</option>
                            @endif
                        </select>
                    </div>
                    <div id="pass" class="hidden">
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="password_confirmation" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="#">Chọn trạng thái</option>
                            @if ($user->level == 1 && $user->user_name == 'gco_admin')
                                @if ($data->level == 1 && $data->user_name == 'gco_admin')
                                    <option value="1" disabled selected> Hoạt động</option>
                                @elseif ($data->level == 1 && $data->user_name != 'gco_admin')
                                    @if($data->status == 1)
                                        <option value="1" selected>Hoạt động</option>
                                        <option value="2">Không hoạt động</option>
                                    @else
                                        <option value="1">Hoạt động</option>
                                        <option value="2" selected>Không hoạt động</option>
                                    @endif
                                @else
                                    @if($data->status == 1)
                                        <option value="1" selected>Hoạt động</option>
                                        <option value="2">Không hoạt động</option>
                                    @else
                                        <option value="1">Hoạt động</option>
                                        <option value="2" selected>Không hoạt động</option>
                                    @endif
                                @endif
                            @elseif ($user->level == 1 && $user->user_name != 'gco_admin')
                                {{--                                user: level->1, name khac gco_admin --}}
                                @if ($data->level == 1 && $data->user_name == 'gco_admin')
                                    <option value="1" disabled selected>Hoạt động</option>
                                @elseif ($data->level == 1 && $data->user_name != 'gco_admin')
                                    @if($data->status == 1)
                                        <option value="1" selected>Hoạt động</option>
                                        <option value="2">Không hoạt động</option>
                                    @else
                                        <option value="1">Hoạt động</option>
                                        <option value="2" selected>Không hoạt động</option>
                                    @endif
                                @else
                                    @if($data->status == 1)
                                        <option value="1" selected>Hoạt động</option>
                                        <option value="2">Không hoạt động</option>
                                    @else
                                        <option value="1">Hoạt động</option>
                                        <option value="2" selected>Không hoạt động</option>
                                    @endif
                                @endif
                            @else
                                {{--                                bientapvien--}}
                                @if($data->status == 1)
                                    <option value="1" selected disabled>Hoạt động</option>
                                @else
                                    <option value="2" selected disabled>Không hoạt động</option>
                                @endif
                            @endif
                        </select>
                        </select>
                    </div>
                    <div class="box-footer">
                        @if ($user->level == 1 && $user->user_name != 'gco_admin')
                            <button type="submit" class="btn btn-primary" @if ($data->user_name == 'gco_admin') disabled @endif >Lưu lại</button>
                            <button type="button" id="chanePass" class="btn bg-olive margin"
                                    @if ($data->user_name == 'gco_admin') disabled @endif>Thay đổi mật khẩu
                            </button>
                        @else
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
                            <button type="button" id="chanePass" class="btn bg-olive margin">Thay đổi mật khẩu
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        @if (!empty($data->image))
                            <img src="{{ asset($data->image) }}"
                                 class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">
                        @endif
                        <div class="file-loading">
                            <input id="inpImg" name="fImage" type="file">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
@endsection
@section('script')
    <script>
        jQuery(document).ready(function ($) {
            $('#chanePass').click(function (event) {
                $('#pass').toggleClass('hidden');
            });
        });
    </script>
@endsection