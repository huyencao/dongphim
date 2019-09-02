@extends('backend.index')

@section('controller','Giới thiệu')

@section('title', 'Giới thiệu')

@section('action','Thông tin')

@section('content')

    @include('backend.block.error')

    <form action="{{ route('about.update', $data->id) }}" method='POST' enctype="multipart/form-data" name="frmEditProduct">
        {{ method_field('PUT') }}
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Thông tin chung</a></li>
                <li><a data-toggle="tab" href="#menu1">Cấu hình seo</a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                        <div class="col-lg-8">
                            <div class="form-group title" style="padding-top: 25px">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" name="name" class="name" value="{!! !empty($data->name) ? $data->name : '' !!}">
                            </div>
                              <div class="form-group">
                                 <label>Nội dung giới thiệu</label>
                                 <textarea class="form-control" name="content" id="content">{!! !empty($data->content) ? $data->content : '' !!}</textarea>
                              </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="">Chọn trạng thái</option>
                                        @if ($data->status == 1)
                                            <option value="1" selected>Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="1">Hiển thị</option>
                                            <option value="0" selected>Ẩn</option>
                                        @endif
                                    </select>
                                </div>
                        </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Meta title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ empty($data->meta_title) ? '' : $data->meta_title}}">
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="meta_description" id="" class="form-control" value="{!! empty($data->meta_description) ? '' : $data->meta_description !!}" style="height: 70px">
                        </div>

                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input type="text" class="form-control" name="meta_keyword" value="{!! empty($data->meta_keyword) ? '' : $data->meta_keyword !!}">
                        </div>
                    </div>
                </div>
                <div class="col-md-8 box-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
@endsection