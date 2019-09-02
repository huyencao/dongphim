@extends('backend.index')

@section('controller','Cấu hình chung')

@section('title', 'Cài đặt')

@section('content')

    @include('backend.block.error')
    <form action="{{ route('setting.store') }}" method='POST' enctype="multipart/form-data" name="frmEditProduct">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin chung</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="activity">
                    <div class="row">
                        <div class="col-lg-8">
{{--                            <div class="form-group">--}}
{{--                                <label>Tên Website</label>--}}
{{--                                <input type="text" class="form-control" name="site_name" id="site_name" value=""--}}
{{--                                       required>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="site_address" id="site_address">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="site_email" id="site_email">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="tel" class="form-control" name="site_phone" id="site_phone">
                            </div>
                            <div class="form-group">
                                <label>Hotline</label>
                                <input type="tel" class="form-control" name="site_hotline" id="site_hotline">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Logo</label><br>
                                <div class="file-loading">
                                    <input id="inpImg" name="fImage" type="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Favicon</label><br>
                                <div class="file-loading">
                                    <input id="inpImg3" name="fFavicon" type="file" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Title SEO</label>
                                <input type="text" class="form-control" name="meta_keyword" id="meta_keyword">

                            </div>
                            <div class="form-group">
                                <label>Meta description</label>
                                <textarea class="form-control" name="meta_description" id="meta_description"
                                          rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta keyword</label>
                                <input type="text" class="form-control" name="meta_keyword" id="meta_keyword">
                            </div>
                            <div class="form-group">
                                <label>Fanpage</label>
                                <textarea class="form-control" name="site_fanpage" id="site_fanpage"
                                          rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Google Analytics</label>
                                <textarea class="form-control" name="google_analytics" id="site_google_analytics" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Bản quyền</label>
                                <input type="text" class="form-control" name="site_coppyright">
                            </div>
                            <div class="form-group">
                                <label>CODE GOOGLE MAPS</label>
                                <textarea class="form-control" name="code_maps" id="code_maps" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Email nhận thông tin liên hệ</label>
                                <input type="text" class="form-control" name="email_info" value="">
                            </div>
                        </div>
                    </div>
                    {{--./row--}}
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <button type="submit" class="btn btn-primary">OK</button>
    </form>
@endsection