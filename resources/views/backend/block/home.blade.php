@extends('backend.index')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3></h3>
                    <p>Sản phẩm</p>
                    <a href="{{ asset('backend/product') }}" class="_link" title="Sản phẩm"></a>
                </div>
                <div class="icon"><i class="fa fa-apple"></i></div>
                <a href=" {{ asset('backend/product') }}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3></h3>
                    <p>Liên hệ</p>
                    <a href="" class="_link" title="Liên hệ"></a>
                </div>
                <div class="icon"><i class="fa fa-comments-o"></i></div>
                <a href="{!! url('backend/contact') !!}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3></h3>
                    <p>Bài viêt</p>
                    <a href="" class="_link" title="Liên hệ"></a>
                </div>
                <div class="icon"><i class="fa fa-comments-o"></i></div>
                <a href="{!! url('backend/blog') !!}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="table-responsive">
               <table class="table no-margin">
                  <thead>
                     <tr>
                        <th>Tên trang</th>
                        <th>Đường dẫn</th>
                     </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>
                            <a href="{{ asset('san-pham') }}">Trang sản phẩm</a>
                        </td>
                        <td><a href="{{ asset('san-pham') }}" target="_blank">{{ asset('san-pham') }}</a></td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ asset('lien-he') }}">Trang liên hệ</a>
                        </td>
                        <td><a href="{{ asset('lien-he') }}" target="_blank">{{ asset('lien-he') }}</a></td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ asset('tin-tuc') }}">Trang tin tức</a>
                        </td>
                        <td><a href="{{ asset('tin-tuc') }}" target="_blank">{{ asset('tin-tuc') }}</a></td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ asset('gioi-thieu') }}">Trang giới thiệu</a>
                        </td>
                        <td><a href="{{ asset('gioi-thieu') }}" target="_blank">{{ asset('gioi-thieu') }}</a></td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ asset('gioi-thieu') }}">Trang đăng ký đại lý</a>
                        </td>
                        <td><a href="{{ asset('dang-ky-dai-ly') }}" target="_blank">{{ asset('dang-ky-dai-ly') }}</a></td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ asset('chinh-sach') }}">Trang chính sách làm đại lý</a>
                        </td>
                        <td><a href="{{ asset('chinh-sach') }}" target="_blank">{{ asset('chinh-sach') }}</a></td>
                    </tr>
                  </tbody>
               </table>
            </div>
        </div>
    </div>
@endsection