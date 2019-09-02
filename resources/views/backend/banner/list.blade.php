@extends('backend.index')

@section('title', 'Danh sách banner')

@section('controller','Banner')

@section('action','Danh sách')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <form action="{!! route('banner.deleteAll') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="btnAdd">
                <a href="{{ route('banner.create') }}">
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
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Ảnh</span></td>
                                        <td><span class="thead-text">Nội dung banner</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                        <td><span class="thead-text">Hành động</span></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (!empty($list_banner))
                                        @foreach ($list_banner as  $key => $banner)
                                            <tr>
                                                <td><input type="checkbox" name="chkItem[]" value="{{ empty($banner->id) == true ? '' :   $banner->id }}"></td>
                                                <td><span class="tbody-text">{{ ++$key }}</span>
                                                <td class="clearfix title-news" style="display: flex">
                                                    <div class="tb-title fl-left">
                                                        <a href="{{ route('banner.edit', $banner->id) }}"
                                                           title="xem">{{ !empty($banner->name) ? $banner->name : '' }}</a>
                                                    </div>
                                                </td>
                                                </td>
                                                <td>
                                                    <span class="tbody-text"><img
                                                                src="{{ empty($banner->image) == true ? '' :  asset($banner->image) }}"
                                                                alt="" style="width: 100px;"></span>
                                                </td>
                                                <td>
                                                    <span class="tbody-text">{{ empty($banner->content) == true ? '' :  $banner->content }}</span>
                                                </td>
                                                <td>
                                                    <span class="tbody-text">{{ date('d-m-Y', strtotime($banner->updated_at)) }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('banner.edit', $banner->id) }}">
                                                        <i class="fa fa-pencil fa-fw"></i> Sửa
                                                    </a>
                                                    <a href="javascript:;" class="btn-destroy"
                                                       data-href="{{ route( 'banner.destroy',  $banner->id ) }}"
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
