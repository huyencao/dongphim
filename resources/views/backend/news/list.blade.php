@extends('backend.index')

@section('title', 'Danh sách tin tức')
@section('controller','Tin tức')

@section('action','Danh sách')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <form action="{!! route('news.deleteAll') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="btnAdd">
                <a href="{{ route('news.create') }}">
                    <fa class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</fa>
                </a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa không ?')"><i class="fa fa-trash-o"></i> Xóa</button>
            </div>
            @include('backend.block.error')
            <div class="wrap clearfix">
                <div id="content" class="fl-right">
                    <div class="section" id="detail-page">
                            <div class="section-detail">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="chkAll" id="chkAll"></th>
                                        <th><span class="thead-text">STT</span></th>
                                        <th><span class="thead-text">Tiêu đề</span></th>
                                        <th><span class="thead-text">Đường dẫn</span></th>
                                        <th><span class="thead-text">Danh mục</span></th>
                                        <th><span class="thead-text">Trạng thái</span></th>
                                        <th><span class="thead-text">Nổi bật</span></th>
                                        <th><span class="thead-text">Hành động</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (!empty($list_news))
                                        @foreach ($list_news as  $key => $news)
                                            <tr>
                                                <td><input type="checkbox" name="chkItem[]" value="{{ empty($news->id) == true ? '' :   $news->id }}"></td>
                                                <td><span class="tbody-text">{{ ++$key }}</span>
                                                <td class="clearfix title-news" style="display: flex">
                                                    <div class="tb-title fl-left">
                                                        <a href="{{ route('news.edit', $news->id ) }}" title="Xem">{{ $news->name }}</a>
                                                    </div>
                                                </td>
                                                <td><span class="tbody-text">{{ empty($news->slug) ? '' :  $news->slug }} </span></td>
                                                <td><span class="tbody-text">{{ empty($news->categoryNews->name) ? '' : $news->categoryNews->name }}</span></td>
                                                <td><span
                                                            class="tbody-text">{{ convertStatus(empty($news->status) ? '' : $news->status) }}</span>
                                                </td>
                                                <td><span class="tbody-text">{{ convertHot(empty($news->hot) == true ? '' :  $news->hot) }}</span></td>
                                                <td>
                                                    <a href="{{ route('news.edit', $news->id ) }}">
                                                        <i class="fa fa-pencil fa-fw"></i> Sửa
                                                    </a> &nbsp; &nbsp; &nbsp;
                                                    <a href="javascript:;" class="btn-destroy" data-href="{{ route( 'news.destroy',  $news->id ) }}"
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
            </div>
        </form>
    </div>
@endsection
