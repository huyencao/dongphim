@extends('backend.index')

@section('title', 'Quản lý diễn viên')

@section('controller','Quản lý diễn viên')

@section('action','Danh sách')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <form action="{!! route('actor.deleteAll') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="btnAdd">
                <a href="{{ route('actor.create') }}">
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
                                        <td><span class="thead-text">Tên diễn viên</span></td>
                                        <td><span class="thead-text">Ảnh</span></td>
                                        <td><span class="thead-text">Giới thiệu</span></td>
                                        <td><span class="thead-text">Bộ phim</span></td>
                                        <td><span class="thead-text">Hành động</span></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (!empty($data_actor))
                                        @foreach ($data_actor as  $key => $actor)
                                            <tr>
                                                <td><input type="checkbox" name="chkItem[]"
                                                           value="{{ empty($actor->id) == true ? '' :   $actor->id }}">
                                                </td>
                                                <td><span class="tbody-text">{{ ++$key }}</span>
                                                <td class="clearfix title-news" style="display: flex">
                                                    <div class="tb-title fl-left">
                                                        <a href="{{ route('actor.edit', @$actor->id) }}"
                                                           title="xem">{{ !empty($actor->name) ? $actor->name : '' }}</a>
                                                    </div>
                                                </td>
                                                </td>
                                                <td>
                                                    <span class="tbody-text"><img
                                                                src="{{ empty($actor->image) == true ? '' :  asset($actor->image) }}"
                                                                alt="" style="width: 50px;"></span>
                                                </td>
                                                <td>
                                                    <span class="tbody-text">{{ empty($actor->desc_actor) == true ? '' :  $actor->desc_actor }}</span>
                                                </td>
                                                <td>
                                                    <?php
                                                    $movie_id = DB::table('movie_actor')->where('actor_id', @$actor->id)->get();
                                                    $movieID = $movie_id->pluck('movie_id')->toArray();
                                                    $movie = DB::table('movies')->whereIn('id', $movieID)->get();
                                                    //                                                    dd($movie[0]->name);
                                                    ?>
                                                    @foreach($movie as $item)
                                                        {{$item->name}},
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{ route('actor.edit', @$actor->id) }}">
                                                        <i class="fa fa-pencil fa-fw"></i> Sửa
                                                    </a>
                                                    <a href="javascript:;" class="btn-destroy"
                                                       data-href="{{ route( 'actor.destroy',  @$actor->id ) }}"
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
