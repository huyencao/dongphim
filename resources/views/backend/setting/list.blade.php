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

                        <label>Logo</label><br>

                        @if (!empty($site_info->site_logo))

                            <img src="{{ asset($site_info->site_logo) }}"

                                 class="img-thumbnail" width="100px" style="display: block; margin-bottom: 10px">

                        @endif

                        <div class="file-loading">

                            <input id="inpImg" name="fImage" type="file">

                        </div>

                    </div>
                    {{--end logo--}}

                    <div class="form-group">

                        <label>Favicon</label><br>

                        @if (!empty($site_info->site_favicon))

                            <img src="{{ asset($site_info->site_favicon) }}"

                                 class="img-thumbnail" width="100px" style="display: block; margin-bottom: 10px">

                        @endif

                        <div class="file-loading">

                            <input id="inpImg3" name="fFavicon" type="file" value="">

                        </div>

                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="content" cols="30" rows="10" name="content">{{ @$site_info->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" name="website" id="website" value="{{ @$site_info->website }}">
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

    </form>

@endsection