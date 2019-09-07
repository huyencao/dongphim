@extends('backend.index')

@section('title', 'Danh sách menu')
@section('controller','Danh sách menu')

@section('action','Danh sách')
@section('content')
    <div id="main-content-wp" class="list-post-page">
        <div class="btnAdd">
            <a href="{{ route('menu.create') }}">
                <fa class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</fa>
            </a>
        </div>
        <div class="wrap clearfix">
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên menu</th>
                                    <th>Vị trí</th>
                                    <th>Danh mục cha</th>
                                    <th>Danh mục phim</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                {{ dd($list_menu) }}--}}
                                @if (!empty($list_menu))
                                    @foreach ($list_menu as $key => $menu)
                                        <tr>
                                            <td><span class="tbody-text">{{ ++$key }}</span>
                                            <td>
                                                <div class="tb-title fl-left">
                                                    <a href="{{ route('menu.edit', $menu->id ) }}" title="Xem">{{ @$menu->name }}</a>
                                                </div>
                                            </td>
                                            <td><span class="tbody-text">{{ @$menu->position }}</span></td>
                                            <td>
                                                <?php
                                                $int = (int)@$menu->parent_id;
                                                $parent_menu = DB::table('menus')->select('name')->where('id', $int)->first();
                                                if (!empty($parent_menu)){
                                                    echo ($parent_menu->name);
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                {{ @$menu->cateMovie->name }}
                                            </td>
                                            <td><span class="tbody-text"><?php convertStatus(@$menu->status) ?></span>
                                            </td>
                                            <td><a href="{{ route('menu.edit', $menu->id ) }}">
                                                    <i class="fa fa-pencil fa-fw"></i> Sửa
                                                </a>
                                                <a href="javascript:;" class="btn-destroy"
                                                   data-href="{{ route('menu.destroy', $menu->id ) }}"
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
    </div>
@endsection
