@extends('backend.index')

@section('controller','Tài khoản')

@section('action','Danh sách')

@section('title', 'Danh sách tài khoản quản trị')

@section('content')
    @if(Auth::user())
            <?php $user = Auth::user(); ?>
            @if ($user->level == 1)
            <div class="btnAdd">
                <a href="{{ route('user.create') }}">
                    <fa class="btn btn-primary"><i class="fa fa-plus"></i> Thêm</fa>
                </a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên tài khoản</th>
                    <th>Tên người dùng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            @if (!empty($item->image))
                                <img src="{{ asset($item->image ) }}" width="35px" height="35px">
                            @else
                                <img src="{{ asset('uploads/user/no-image.png') }}">
                            @endif
                            &nbsp; &nbsp;
                            {{ $item->user_name }}
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if ($item->status == 1 )
                                <span class="label label-success">Đang hoạt động</span>
                            @else
                                <span class="label label-danger">Không hoạt động</span>
                        @endif
                        <td>
                            <a href="{{ route('user.edit', $item->id ) }}">
                                <i class="fa fa-pencil fa-fw"></i> Sửa
                            </a> &nbsp; &nbsp; &nbsp;
                            <a href="javascript:;" class="btn-destroy"
                               data-href="{{ route( 'user.destroy',  $item->id ) }}"
                               data-toggle="modal" data-target="#confim">
                                <i class="fa fa-trash-o fa-fw"></i> Xóa
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h3 style="text-align: center">Bạn không có quyền vào trang này.</h3>
        @endif
    @endif
@endsection