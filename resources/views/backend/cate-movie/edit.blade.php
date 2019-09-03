@extends('backend.index')

@section('title', 'Cập nhật danh mục')
@section('controller','Danh mục tin tức ')
@section('controller_route', route('cate-news.index'))
@section('action','Cập nhật')
@section('content')
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form action="{{ route('cate-news.update', $category_news->id) }}" method="POST">
                            <div class="col-sm-12">
                                @include('backend.block.error')
                            </div>
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Thông tin chung</a></li>
                                <li><a data-toggle="tab" href="#menu1">Cấu hình seo</a></li>
                            </ul>
                            <div class="tab-content" style="margin: 50px 0px">
                                <div id="home" class="tab-pane fade in active">

                                    <div class="col-md-8">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <div class="form-group">
                                            <label for="title">Tên danh mục</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ empty($category_news->name) ? '' : $category_news->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Đường dẫn tĩnh</label>
                                            <input type="text" name="slug" id="slug" class="form-control" value="{{ empty($category_news->slug) ? '' : $category_news->slug }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select name="status" class="form-control">
                                                <option value="">Chọn trạng thái</option>
                                                @if ($category_news->status == 1)
                                                    <option value="1" selected>Hiển thị</option>
                                                    <option value="0">Không hiển thị</option>
                                                @else
                                                    <option value="1">Hiển thị</option>
                                                    <option value="0" selected>Không hiển thị</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Title SEO</label>
                                            <input type="text" class="form-control" name="meta_title" value="{{ empty($category_news->meta_title) ? '' : $category_news->meta_title }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <input type="text" name="meta_description" id="" class="form-control" value="{{ empty($category_news->meta_description) ? '' : $category_news->meta_description }}"
                                                   style="height: 70px">
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keyword</label>
                                            <input type="text" class="form-control" name="meta_keyword" value="{{ empty($category_news->meta_keyword) ? '' : $category_news->meta_keyword }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-8 box-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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