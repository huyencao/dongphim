@extends('backend.index')

@section('title', 'Cập nhật tập phim')

@section('controller','Quản lý tập phim')
@section('controller_route', route('episode.index'))
@section('action','Cập nhật')

@section('content')
    <form action="{{ route('episode.update', @$data->id) }}" method='POST' enctype="multipart/form-data"
          autocomplete="off">
        {{ method_field('PUT') }}
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
                        <label>Tên tập phim</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ @$data->name }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Đường dẫn tĩnh</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{ @$data->slug }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Link phim</label>
                        <input type="text" name="url" id="url" class="form-control" value="{{ @$data->url }}">
                    </div>
                    <div class="form-group">
                        <label>Loại tập phim</label>
                        <select name="type" class="form-control">
                            <option value="">Chọn</option>
                            @if (@$data->type == 1)
                                <option value="1" selected>Trailer</option>
                                <option value="0">Tập phim</option>
                            @else
                                <option value="1">Trailer</option>
                                <option value="0" selected>Tập phim</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bộ phim</label>
                        <select name="movie_id" class="form-control">
                            <option value="">Chọn</option>
                            @if (!empty($movies))
                                @foreach ($movies as $movie)
                                    <option value="{{ @$movie->id }}" @if ($data->movie_id == $movie->id) selected @endif>{{ @$movie->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        @if (!empty($data->image))
                            <img src="{{ asset(@$data->image) }}"
                                 class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">
                        @endif
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
                        <input type="text" class="form-control" name="meta_title" value="{{ @$data->meta_title }}">
                    </div>

                    <div class="form-group">
                        <label>Meta Description</label>
                        <input type="text" name="meta_description" id="" class="form-control"
                               value="{{ @$data->meta_description }}"
                               style="height: 70px">
                    </div>

                    <div class="form-group">
                        <label>Meta Keyword</label>
                        <input type="text" class="form-control" name="meta_keyword" value="{{ @$data->meta_keyword }}">
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

        });
    </script>
@endpush
