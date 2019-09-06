@extends('backend.index')

@section('title', 'Cập nhật menu')
@section('controller','Menu')
@section('controller_route', route('menu.index'))
@section('action','Cập nhật')

@section('content')
    <form action="{{ route('menu.update', $menu->id) }}" method='POST' enctype="multipart/form-data"
          autocomplete="off">
        {{ method_field('PUT') }}
        <div class="col-sm-12">
            @include('backend.block.error')
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Thông tin chung</a></li>
        </ul>
        <div class="tab-content" style="margin: 50px 0px">
            <div id="home" class="tab-pane fade in active">
                <div class="col-md-8">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="name">Tên menu</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{ @$menu->name }}">
                    </div>
                    <div class="form-group">
                        <label for="menu-order">Đường dẫn</label>
                        <input type="text" name="slug" id="slug" class="form-control"
                               value="{{ @$menu->slug }}">
                    </div>
                    <div class="form-group">
                        <label for="menu-order">Thứ tự</label>
                        <input type="text" name="position" id="menu-order" class="form-control"
                               value="{{ @$menu->position }}">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="">Chọn trạng thái</option>
                            @if (@$menu->status)
                                <option value="1" selected>Hiển thị</option>
                                <option value="0">Không hiển thị</option>
                            @else
                                <option value="1">Hiển thị</option>
                                <option value="0" selected>Không hiển thị</option>
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Danh mục menu cha</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">Chọn</option>
                            @if (!empty($menu_parent))
                                @foreach ($menu_parent as $parent)
                                    <option value="{{ @$parent->id }}" @if (@$menu->parent_id == @$parent->id) selected @endif>{{ @$parent->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Danh mục phim</label>
                        <input type="text" class="form-control" disabled value="{{ @$menu->cateMovie->name }}" style="margin-bottom: 10px">
                        <select name="cate_id" class="form-control">
                            <option value="">Chọn</option>
                            {{ showCategories($cate_movie) }}
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-8 box-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection
