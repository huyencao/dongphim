<!DOCTYPE html>

<html>
<link rel="shortcut icon" type="image/x-icon"
      href="{!! url(!empty($setting->site_favicon) ? $setting->site_favicon : '') !!}">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> @yield('title') </title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->

    <link rel="stylesheet" href="{{ url('public/backend/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ url('public/backend/dist/css/AdminLTE.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/backend/dist/css/skins/_all-skins.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/backend/plugins/datepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ url('public/backend/plugins/datatables/dataTables.bootstrap.css') }}">

    <link rel="stylesheet" href="{{ url('public/backend/plugins/taginput/bootstrap-tagsinput.css') }}">

    <link rel="stylesheet" href="{{ url('public/backend/dist/css/jquery.toast.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/backend/dist/css/style.css') }}">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- My style -->

    <link href="{{ url('public/upimgs/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css"/>

    <link href="{{ url('public/upimgs/themes/explorer/theme.min.css') }}" media="all" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

    <link rel="stylesheet" href="{{ url('public/backend/cus/mystyle.css') }}">

    <script type="text/javascript">

        function homeUrl() {

            return "{!! url('/') !!}";

        }

    </script>

</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">

        <?php //dd($site_info) ?>

        <a href="{!! url('/') !!}" target="_blank" class="logo" title="Xem website">

            <span class="logo-mini"><b>W</b>eb</span>

            <span class="logo-lg"><b>{!! isset($site_info->site_title) ? $site_info->site_title : 'Xem website'!!}</b></span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top">

            <!-- Sidebar toggle button-->

            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

                <span class="sr-only">Toggle navigation</span>

            </a>

            <!-- Navbar Right Menu -->

            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">

                    @if(Auth::user())

                        <?php $user = Auth::user(); ?>

                        <li class="user user-menu">

                            <a href="{{ route('user.edit', $user->id) }}" title="Chỉnh sửa tài khoản">

                                @if (!empty($user->image))

                                    <img src="{{ asset($user->image) }}" class="user-image" alt="User Image">

                                @else

                                    <img src="{{ asset('uploads/user/no-image.png') }}" class="user-image"
                                         alt="User Image">

                                @endif

                                {!! $user->name !!}

                            </a>

                        </li>

                    @endif

                    <li class="dropdown user user-menu">

                        <a href="{{ asset('logout') }}" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất ?');">

                            <i class="fa fa-power-off"></i>

                            <span class="hidden-xs">Đăng xuất</span>

                        </a>

                    </li>

                </ul>

            </div>

        </nav>

    </header>

    <aside class="main-sidebar">

        <section class="sidebar">

            <ul class="sidebar-menu" data-widget="tree">

                <li class="header">TRANG QUẢN TRỊ</li>
                @if(Auth::user())

                    <?php $user = Auth::user(); ?>
                        <li class="{{ Request::segment(2) === 'user' ? 'active' : null  }}">

                            <a href="{{ route('user.index') }}">

                                <i class="fa fa-user"></i> <span>Tài khoản</span>

                            </a>

                        </li>
                @endif

                <li class="{{ Request::segment(2) === 'banner' ? 'active' : null  }}">

                    <a href="{{ route('banner.index') }}">

                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Danh sách banner</span>

                    </a>

                </li>

                <li class="{{ Request::segment(2) === 'cate-movie' ? 'active' : null  }}">

                    <a href="{{ route('cate-movie.index') }}">

                        <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Quản lý danh mục</span>

                    </a>

                </li>

                <li class="treeview {{ Request::segment(2) === 'setting' ? 'active' : null }}">

                    <a href="#">

                        <i class="fa fa-cog" aria-hidden="true"></i><span>Cấu hình</span>

                        <span class="pull-right-container">

                     <i class="fa fa-angle-left pull-right"></i>

                     </span>

                    </a>

                    <ul class="treeview-menu">

                        <li class="{{ Request::segment(2) === 'setting' ? 'active' : null }}">

                            <a href="{{ route('setting.index') }}"><i class="fa fa-circle-o"></i> Cấu hình chung</a>

                        </li>

                    </ul>

                </li>

            </ul>

        </section>

    </aside>

    <div class="content-wrapper">

        @if(URL::current() != url('backend'))

            <section class="content-header">

                <h1>

                    <a href="@yield('controller_route')">@yield('controller')</a>

                    <small>@yield('action')</small>

                </h1>

                <ol class="breadcrumb">

                    <li><a href="{!! url('backend') !!}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

                    <li><a href="@yield('controller_route')">@yield('controller')</a></li>

                    <li class="active">@yield('action')</li>

                </ol>

            </section>

        @endif

        <section class="content">

            <div class="box">

                <div class="box-body">

                    {{--                     Thông báo--}}

                    @if(session('flash_message'))

                        <div class="row">

                            <div class="col-sm-12">

                                <div class="alert alert-{!! session('flash_level') !!} alert-dismissible">

                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>

                                    <h4><i class="icon fa fa-check"></i> Thông báo</h4>

                                    {!! session('flash_message') !!}

                                </div>

                            </div>

                        </div>

                    @endif

                    @yield('content')

                </div>

            </div>

        </section>

    </div>

    <footer class="main-footer">

        <strong>Copyright &copy;2019 <a href="#">GCO Book</a></strong>

        All rights reserved.

    </footer>

</div>


{{--      script--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="{{ url('public/upimgs/js/fileinput.min.js') }}" type="text/javascript"></script>

<script src="{{ url('public/upimgs/js/vi.js') }}" type="text/javascript"></script>

<script src="{{ url('public/upimgs/themes/explorer/theme.min.js') }}" type="text/javascript"></script>

<!-- Bootstrap 3.3.7 -->

<script src="{{ asset('public/backend/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('public/backend/plugins/fastclick/fastclick.js') }}"></script>

<script src="{{ asset('public/backend/dist/js/adminlte.js') }}"></script>

<script src="{{ url('public/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ url('public/backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script src="{{ url('public/backend/plugins/datepicker/moment.min.js') }}"></script>

<script src="{{ url('public/backend/plugins/taginput/bootstrap-tagsinput.min.js') }}"></script>

<script src="{{ url('public/backend/plugins/datepicker/daterangepicker.js') }}"></script>

<script src="{!! asset('public/tinymce/tinymce.min.js') !!}"></script>

<script src="{{ url('public/backend/dist/js/jquery.toast.min.js') }}"></script>

<!-- My Script -->

<script src="{{ url('public/backend/cus/myscript.js') }}"></script>

<script src="{{ url('public/backend/cus/jquery.nestable.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

@yield('script')

@stack('scripts')

<!-- modal confim delete -->

<div class="modal fade" id="confim" tabindex="-1" role="dialog" aria-hidden="true">

    <form action="" id="form-destroy" method="POST">

        {!! method_field('delete') !!}

        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        <div class="modal-dialog modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">Thông báo</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <h4>Bạn có chắc chắn muốn xóa ?</h4>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

                    <button type="submit" class="btn btn-primary">Xóa</button>

                </div>

            </div>

        </div>

    </form>

</div>

<!-- end -->

</body>

</html>