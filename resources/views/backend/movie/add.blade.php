@extends('backend.index')

@section('title', 'Thêm bộ phim')

@section('controller','Quản lý phim')
@section('controller_route', route('movie.index'))
@section('action','Thêm')

@section('content')
    <form action="{{ route('movie.store') }}" method='POST' enctype="multipart/form-data" autocomplete="off">
        <div class="col-sm-12">
            @include('backend.block.error')
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Thông tin chung</a></li>
            <li><a data-toggle="tab" href="#tab1">Cấu hình SEO</a></li>
        </ul>
        <div class="tab-content" style="margin: 50px 0px">
            <div id="home" class="tab-pane fade in active">
                <div class="col-md-8">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Tên bộ phim</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="title">Đường dẫn tĩnh</label>
                        <input type="text" name="slug" id="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Thông Tin - Lịch Chiếu</label>
                        <textarea id="content" cols="30" rows="10" name="show_times"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung phim</label>
                        <textarea id="content" cols="30" rows="10" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="">Chọn trạng thái</option>
                            <option value="1">Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Thông tin phim</label>
                        <input type="text" name="info" id="" class="form-control" value="">
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label>Lượt view</label>--}}
{{--                        <input type="text" name="view" id="" class="form-control" value="">--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label>Năm sản xuất</label>
                        <input type="number" min="0" name="production_year" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Ngày công chiếu</label>
                        <input type="date" name="air_date" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Số tập</label>
                        <input type="text" name="episodes" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Thời lượng bộ phim</label>
                        <input type="text" name="movie_duration" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Đạo diễn</label>
                        <input type="text" name="directors" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Danh mục phim</label><br>
                        <select class="js-select2 form-control" multiple="multiple" name="cate_id[]">
                            {{ cateParent($cate_movie) }}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <div class="file-loading">
                            <input id="inpImg" name="fImage" type="file">
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab1" class="tab-pane fade">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Title SEO</label>
                        <input type="text" class="form-control" name="meta_title" value="">
                    </div>

                    <div class="form-group">
                        <label>Meta Description</label>
                        <input type="text" name="meta_description" id="" class="form-control"
                               value=""
                               style="height: 70px">
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

            //select2
            $(".js-select2").select2({
                closeOnSelect: false,
                placeholder: "",
                allowHtml: true,
                allowClear: true,
                tags: true // создает новые опции на лету
            });

            $('.icons_select2').select2({
                width: "100%",
                templateSelection: iformat,
                templateResult: iformat,
                allowHtml: true,
                placeholder: "Placeholder",
                dropdownParent: $('.select-icon'),//обавили класс
                allowClear: true,
                multiple: false
            });


            function iformat(icon, badge,) {
                var originalOption = icon.element;
                var originalOptionBadge = $(originalOption).data('badge');

                return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
            }

        });
    </script>
@endpush