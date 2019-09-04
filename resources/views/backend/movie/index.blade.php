@extends('backend.index')

@section('title', 'Quản lý phim')

@section('controller','Quản lý phim')

@section('action','Danh sách bộ phim')

@section('content')
    <div id="main-content-wp" class="list-cat-page">
        <form action="{!! route('movie.deleteAll') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="btnAdd">
                <a href="{{ route('movie.create') }}">
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
                                    <td><span class="thead-text">Tên phim</span></td>
                                    <td><span class="thead-text">Ảnh phim</span></td>
                                    <td><span class="thead-text">Thông tin phim</span></td>
                                    <td><span class="thead-text">Năm sản xuất</span></td>
                                    <td><span class="thead-text">Đạo diễn phim</span></td>
                                    <td><span class="thead-text">Ngày công chiếu</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Hành động</span></td>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!empty($list_movie))
                                    @foreach ($list_movie as $key => $item)
                                        <tr>
                                            <td><input type="checkbox" name="chkItem[]"
                                                       value="{{ empty($item->id) == true ? '' :   $item->id }}"></td>
                                            <td><span class="tbody-text">{{ ++$key }}</span>
                                            <td class="clearfix title-news" style="display: flex">
                                                <div class="tb-title fl-left">
                                                    <a href="{{ route('movie.edit', @$item->id) }}"
                                                       title="xem">{{ !empty($item->name) ? $item->name : '' }}</a>
                                                </div>
                                            </td>
                                            <td>
                                                    <span class="tbody-text"><img
                                                                src="{{ @asset($item->image) }}"
                                                                alt="" style="width: 60px;"></span>
                                            </td>
                                            <td>
                                                {{ @$item->info }}
                                            </td>
                                            <td>{{ @$item->production_year }}</td>
                                            <td>{{ @$item->directors }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->air_date)) }}</td>
                                            <td>{{ convertStatus(@$item->status) }}</td>
                                            <td>
                                                <a href="{{ route('movie.edit', @$item->id) }}">
                                                    <i class="fa fa-pencil fa-fw"></i> Sửa
                                                </a>
                                                <a href="javascript:;" class="btn-destroy"
                                                   data-href="{{ route( 'movie.destroy',  @$item->id ) }}"
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
