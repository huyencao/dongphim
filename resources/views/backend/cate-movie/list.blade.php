@extends('backend.index')

@section('title', 'Quản lý danh mục phim')

@section('controller','Quản lý danh mục phim')

@section('action','Danh sách')

@section('content')
    <div id="main-content-wp" class="list-cat-page">
        <form action="{!! route('cate-movie.deleteAll') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="btnAdd">
                <a href="{{ route('cate-movie.create') }}">
                    <fa class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</fa>
                </a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa không ?')">
                    <i class="fa fa-trash-o"></i> Xóa
                </button>
            </div>
            @include('backend.block.error')
            <div class="wrap clearfix">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" name="chkAll" id="chkAll"></th>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Hành động</span></td>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!empty($data))
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td><input type="checkbox" name="chkItem[]" value="{{ empty($item->id) == true ? '' :   $item->id }}"></td>
                                            <td><span class="tbody-text">{{ ++$key }}</span>
                                            <td class="clearfix title-news" style="display: flex">
                                                <div class="tb-title fl-left">
                                                    <a href="{{ route('cate-movie.edit', @$item->id) }}"
                                                       title="xem">{{ !empty($item->name) ? $item->name : '' }}</a>
                                                </div>
                                            </td>
                                            <td>
                                                {{ convertStatus(@$item->status) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('cate-movie.edit', @$item->id) }}">
                                                    <i class="fa fa-pencil fa-fw"></i> Sửa
                                                </a>
                                                <a href="javascript:;" class="btn-destroy"
                                                   data-href="{{ route( 'cate-movie.destroy',  @$item->id ) }}"
                                                   data-toggle="modal" data-target="#confim">
                                                    <i class="fa fa-trash-o fa-fw"></i> Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
