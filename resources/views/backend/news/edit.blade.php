@extends('backend.index')

@section('title', 'Cập nhật bài viết')
@section('controller','Tin tức')
@section('controller_route', route('news.index'))
@section('action','Cập nhật')

@section('content')
    <div class="row">
        <form action="{{ route('news.update', $news->id) }}" method='POST' enctype="multipart/form-data" autocomplete="off">
            {{ method_field('PUT') }}
            <div class="col-sm-12">
                @include('backend.block.error')
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Thông tin chung</a></li>
                <li><a data-toggle="tab" href="#menu1">Cấu hình seo</a></li>
            </ul>
            <div class="tab-content" style="margin: 50px 0px">
                <div id="home" class="tab-pane fade in active">
                    <div class="col-md-8">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <label>Tên bài viết</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', isset($news->name) ? $news->name : null) }}">
                        </div>
                        <div class="form-group">
                            <label>Đường dẫn tĩnh</label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', isset($news->slug) ? $news->slug : null) }}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả ngắn</label>
                            <input type="text" class="form-control" name="description" value="{!! old('description', isset($news->description) ? $news->description : null) !!}">
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="content" cols="30" rows="10" name="content" value="{!! old('content', isset($news->content) ? $news->content : null) !!}">{!! old('content', isset($news->content) ? $news->content : null) !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="cate_id" class="form-control">
                                <option value="">Chọn danh mục</option>
                                @foreach($list_cate as $item)
                                    <option value="{{ $item->id }}" @if ($news->cate_id == $item->id)) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="">Chọn trạng thái</option>
                                @if ($news->status == 1)
                                    <option value="1" selected>Hiển thị</option>
                                    <option value="0">không hiển thị</option>
                                @else
                                    <option value="1">Hiển thị</option>
                                    <option value="0" selected>Không hiển thị</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bài viết nổi bật</label>
                            <select name="hot" class="form-control">
                                <option value="#">Chọn</option>
                                @if ($news->hot == 1)
                                    <option value="1" selected>Nổi bật</option>
                                    <option value="0">Không nổi bật</option>
                                @else
                                    <option value="1">Nổi bật</option>
                                    <option value="0" selected>Không nổi bật</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            @if (!empty($news->image))
                                <img src="{{ asset($news->image) }}"
                                     class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">
                            @endif
                            <div class="file-loading">
                                <input id="inpImg" name="fImage" type="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Title SEO</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ empty($news->meta_title) == true ? '' : $news->meta_title }}">
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="meta_description" id="" class="form-control" value="{{ empty($news->meta_description) == true ? '' : $news->meta_description }}" style="height: 70px">
                        </div>

                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input type="text" class="form-control" name="meta_keyword" value="{{ empty($news->meta_keyword) == true ? '' : $news->meta_keyword }}">
                        </div>
                    </div>
                 </div>
                <div class="col-md-8 box-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#name").keyup(function () {
                var name = $(this).val();
                slug = name.toLowerCase();
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                // console.log(slug);

                $("#slug").val(slug);
            });
        });
    </script>
@endpush