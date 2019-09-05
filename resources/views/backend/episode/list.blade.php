@extends('backend.index')

@section('title', 'Danh sách tập phim')

@section('controller','Quản lý tập phim')

@section('action','Danh sách')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <form action="{!! route('episode.deleteAll') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="btnAdd">
                <a href="{{ route('episode.create') }}">
                    <fa class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</fa>
                </a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa không ?')"><i
                            class="fa fa-trash-o"></i> Xóa
                </button>
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
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tên tập phim</span></td>
                                        <td><span class="thead-text">Ảnh</span></td>
                                        <td><span class="thead-text">Bộ phim</span></td>
{{--                                        <td><span class="thead-text">Lượt xem</span></td>--}}
                                        <td><span class="thead-text">Hành động</span></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (!empty($episodes))
                                        @foreach ($episodes as  $key => $episode)
                                            <tr>
                                                <td><input type="checkbox" name="chkItem[]"
                                                           value="{{ @$episode->id }}">
                                                </td>
                                                <td><span class="tbody-text">{{ ++$key }}</span>
                                                <td class="clearfix title-news" style="display: flex">
                                                    <div class="tb-title fl-left">
                                                        <a href="{{ route('episode.edit', @$episode->id) }}"
                                                           title="xem">{{ @$episode->name }}</a>
                                                    </div>
                                                </td>
                                                </td>
                                                <td>
                                                    <span class="tbody-text"><img
                                                                src="{{ @asset($episode->image) }}"
                                                                alt="" style="width: 50px;"></span>
                                                </td>
                                                <td>
                                                    <span class="tbody-text">{{  @$episode->movie->name }}</span>
                                                </td>
{{--                                                <td>--}}
{{--                                                    <span class="tbody-text">{{  number_format(@$episode->view, 0, '.', '.') }}</span>--}}
{{--                                                </td>--}}
                                                <td>
                                                    <a href="{{ route('episode.edit', @$episode->id) }}">
                                                        <i class="fa fa-pencil fa-fw"></i> Sửa
                                                    </a>
                                                    <a href="javascript:;" class="btn-destroy"
                                                       data-href="{{ route( 'episode.destroy',  @$episode->id ) }}"
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
