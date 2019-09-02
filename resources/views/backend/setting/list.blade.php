@extends('backend.index')

@section('controller','Cấu hình chung')

@section('title', 'Thông tin chung')

@section('content')

    @include('backend.block.error')

    <form action="{{ route('setting.update', $site_info->id) }}" method='POST' enctype="multipart/form-data"

          name="frmEditProduct">

        {{ method_field('PUT') }}

        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Thông tin chung</a></li>
            <li><a data-toggle="tab" href="#menu1">Cấu hình seo</a></li>
        </ul>

        <div class="tab-content" style="margin: 50px 0px">

            <div id="home" class="tab-pane fade in active">
                <div class="col-lg-8">

                    <div class="form-group">

                        <label>Địa chỉ</label>

                        <input type="text" class="form-control" name="site_address" id="site_address"

                               value="{{ isset($site_info->site_address) ? $site_info->site_address : '' }}">

                    </div>

                    <div class="form-group">

                        <label>Email</label>

                        <input type="email" class="form-control" name="site_email" id="site_email"

                               value="{{ isset($site_info->site_email) ? $site_info->site_email : '' }}">

                    </div>

                    <div class="form-group">

                        <label>Số điện thoại</label>

                        <input type="tel" class="form-control" name="site_phone" id="site_phone"

                               value="{{ isset($site_info->site_phone) ? $site_info->site_phone : '' }}">

                    </div>

                    <div class="form-group">

                        <label>Hotline</label>

                        <input type="tel" class="form-control" name="site_hotline" id="site_hotline"

                               value="{{ isset($site_info->site_hotline) ? $site_info->site_hotline : '' }}">

                    </div>

                    <div class="form-group">

                        <label>Logo</label><br>

                        @if (!empty($site_info->site_logo))

                            <img src="{{ asset($site_info->site_logo) }}"

                                 class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">

                        @endif

                        <div class="file-loading">

                            <input id="inpImg" name="fImage" type="file">

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Favicon</label><br>

                        @if (!empty($site_info->site_favicon))

                            <img src="{{ asset($site_info->site_favicon) }}"

                                 class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">

                        @endif

                        <div class="file-loading">

                            <input id="inpImg3" name="fFavicon" type="file" value="">

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="form-group">

                        <label>Fanpage</label>

                        <textarea class="form-control" name="site_fanpage" id="site_fanpage"

                                  rows="6">{{ isset($site_info->site_fanpage) ? $site_info->site_fanpage : '' }}</textarea>

                    </div>

                    <div class="form-group">

                        <label>Google Analytics</label>

                        <textarea class="form-control" name="google_analytics" id="site_google_analytics"

                                  rows="6">{{ isset($site_info->google_analytics) ? $site_info->google_analytics : '' }}</textarea>

                    </div>

                    <div class="form-group">

                        <label>Bản quyền</label>

                        <input type="text" class="form-control" name="site_coppyright"

                               value="{{ isset($site_info->site_coppyright) ? $site_info->site_coppyright : null }}">

                    </div>

                    <div class="form-group">

                        <label>CODE GOOGLE MAPS</label>

                        <textarea class="form-control" name="code_maps" id="code_maps"

                                  rows="6">{!! isset($site_info->code_maps) ? $site_info->code_maps : null !!}</textarea>

                    </div>


                </div>

            </div>

            <div id="menu1" class="tab-pane fade">

                <div class="col-md-8">

                    <div class="form-group">

                        <label>Meta title</label>

                        <input type="text" class="form-control" name="meta_title" id="meta_title"

                               value="{{ !empty($site_info->meta_title) ? $site_info->meta_title : '' }}">

                    </div>

                    <div class="form-group">

                        <label>Meta description</label>

                        <textarea class="form-control" name="meta_description" id="meta_description"

                                  rows="6">{{ !empty($site_info->meta_description) ? $site_info->meta_description : '' }}</textarea>

                    </div>

                    <div class="form-group">

                        <label>Meta keyword</label>

                        <input type="text" class="form-control" name="meta_keyword" id="meta_keyword"

                               value="{{ !empty($site_info->meta_keyword) ? $site_info->meta_keyword : '' }}">

                    </div>

                </div>

            </div>

            <div class="col-md-8 box-footer">

                <button type="submit" class="btn btn-primary">Cập nhật</button>

            </div>

            <!-- /.tab-content -->

        </div>

        {{--   <button type="submit" class="btn btn-primary">Cập nhật</button>--}}

    </form>

@endsection