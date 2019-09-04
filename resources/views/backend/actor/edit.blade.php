@extends('backend.index')

@section('title', 'Thêm diễn viên')

@section('controller','Quản lý diễn viên')
@section('controller_route', route('actor.index'))
@section('action','Thêm')

@section('content')
    <form action="{{ route('actor.update', @$detail_actor->id) }}" method='POST' enctype="multipart/form-data" autocomplete="off">
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
                        <label>Tên diễn viên</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ @$detail_actor->name }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Đường dẫn tĩnh</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{ @$detail_actor->slug }}">
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu diễn viên</label>
                        <input type="text" name="desc_actor" id="" class="form-control" value="{{ @$detail_actor->desc_actor }}"
                               style="height: 70px">
                    </div>
                    <div class="form-group">
                        <label>Bộ phim</label>
                        <?php
                        $movie_id = DB::table('movie_actor')->where('actor_id', @$detail_actor->id)->get();
                        $movieID = $movie_id->pluck('movie_id')->toArray();
                        $movie = DB::table('movies')->whereIn('id', $movieID)->get();

                        ?>
                        <input type="text" class="form-control" value="@foreach($movie as $item) {{$item->name}}, @endforeach" disabled style="margin-bottom: 10px">
                        <select class="js-select2 form-control" multiple="multiple" name="movie_id[]">
                            {{ cateParent($movies) }}
                        </select>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        @if (!empty($detail_actor->image))
                            <img src="{{ asset($detail_actor->image) }}"
                                 class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">
                        @endif
                        <div class="file-loading">
                            <input id="inpImg" name="fImage" type="file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 box-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
