@extends('backend.index')

@section('title', 'Danh mục tin tức')

@section('controller','Danh mục tin tức')

@section('action','Danh sách')

@section('content')
    <div id="main-content-wp" class="list-cat-page">
        <form action="{!! route('cate-news.deleteAll') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="btnAdd">
                <a href="{{ route('cate-news.create') }}">
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
                                @if (!empty($cate_news))
                                    @foreach ($cate_news as $key => $value)
                                        <tr>
                                            <td><input type="checkbox" name="chkItem[]"
                                                       value="{{ empty($value->id) == true ? '' :   $value->id }}"></td>
                                            <td><span class="tbody-text">{{ ++$key }}</span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="{{ route('cate-news.edit', $value->id ) }}"
                                                       title="Xem">{{ isset($value->name) ? $value->name : '' }}</a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="tbody-text"><?php convertStatus($value->status) ?></span>
                                            </td>
                                            <td>
                                                <a href="{{ route('cate-news.edit', $value->id ) }}">
                                                    <i class="fa fa-pencil fa-fw"></i> Sửa
                                                </a>
                                                <a href="javascript:;" class="btn-destroy"
                                                   data-href="{{ route( 'cate-news.destroy',  $value->id ) }}"
                                                   data-toggle="modal" data-target="#confim">
                                                    <i class="fa fa-trash-o fa-fw"></i> Xóa
                                                </a>
                                            </td>
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
