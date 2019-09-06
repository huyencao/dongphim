@extends('backend.index')

@section('title', 'Thêm mới')
@section('controller','Menu')
@section('controller_route', route('menu.index'))

@section('action','Thêm')
@section('content')
    <div class="row">
        <form action="{{ route('menu.store') }}" method='POST' enctype="multipart/form-data" autocomplete="off">
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
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="menu-order">Đường dẫn tĩnh</label>
                            <input type="text" name="slug" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="menu-order">Thứ tự</label>
                            <input type="text" name="position" id="menu-order" class="form-control" placeholder="vd: 1">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="">Chọn trạng thái</option>
                                <option value="1">Hiển thị</option>
                                <option value="0">Không hiển thị</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Danh mục menu cha</label>
                            <select name="parent_id" class="form-control">
                                <option value="0">Chọn</option>
                                {{ showCategories($menu_parent) }}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Danh mục phim</label>
                            <select name="cate_id" class="form-control">
                                <option value="">Chọn</option>
                                {{ showCategories($cate_movie) }}
                            </select>
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