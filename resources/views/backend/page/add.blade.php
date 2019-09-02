@extends('backend.index')

@section('title', 'Giới thiệu')

@section('content')
    <div class="row">
        <form action="{{ route('about.store') }}" method='POST' autocomplete="off">
            <div class="col-sm-12">
                @include('backend.block.error')
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Thông tin chung</a></li>
                <li><a data-toggle="tab" href="#menu1">Cấu hình seo</a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="col-md-8">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group title"  style="padding-top: 25px">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control" name="name" class="name">
                        </div>
                        <div class="form-group">
                            <label>Nội dung giới thiệu</label>
                            <textarea class="form-control" name="content" id="content" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="">Chọn trạng thái</option>
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Title SEO</label>
                            <input type="text" class="form-control" name="meta_title" value="">
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="meta_description" id="" class="form-control" value="" style="height: 70px">
                        </div>

                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input type="text" class="form-control" name="meta_keyword" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-8 box-footer">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
        </form>
    </div>
@endsection
