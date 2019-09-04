@extends('frontend.layouts.master')

@section('content')
    <main class="cd-main-content">
        <section class="banner">
            <div class="slider-banner">
                @if (!empty($banner_view))
                    @foreach ($banner_view as $key => $value)
                        <a href="{{ url('/') }}" title=""><img src="{{ asset(@$value->image) }}" alt="" title=""> </a>
                    @endforeach
                @endif
            </div>
        </section>
        <section class="block-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="content-left">
                            <div class="box-film">
                                <h2 class="title"><a href="" title="">Phim đề cử</a></h2>
                                <div class="slider-films">
                                    <div class="row">
                                        <div class="col-md-3 col-6">
                                            <div class="film-item">
                                                <a href="film-detail.html" title=""><img src="{{ asset('public/frontend/images/phim-2.png') }}" alt=""
                                                                                         title=""> <span
                                                            class="field-film">Tập 10</span></a>
                                                <div class="film-info">
                                                    <h3><a href="film-detail.html" title="">Hoa Hồng Trên Ngực Trái</a>
                                                    </h3>
                                                    <h4>Bai Mai Tee Plid Plew (2019)</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mgt-30 text-center"><a href="list.html" title="" class="btn-general">XEM
                                        THÊM</a></div>
                            </div>
                            <div class="box-film mgt-50">
                                <h2 class="title"><a href="" title="">Phim chiếu rạp</a></h2>
                                <div class="slider-film">
                                    <div class="item mg-10">
                                        <div class="film-item">
                                            <a href="film-detail.html" title=""><img src="{{ asset('public/frontend/images/phim-4.png') }}" alt=""
                                                                                     title=""> <span class="field-film">Tập 10</span></a>
                                            <div class="film-info">
                                                <h3><a href="film-detail.html" title="">Để Âm Nhạc Cất Lời</a></h3>
                                                <h4>Bai Mai Tee Plid Plew (2019)</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mgt-30 text-center"><a href="list.html" title="" class="btn-general">XEM
                                        THÊM</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="title-box">
                                    <a href="" title="" class="btn-general">bảng xếp hạng</a>
                                </div>
                                <div class="film-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#tab-1" role="tab" data-toggle="tab">Phim
                                                Bộ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab-2" role="tab" data-toggle="tab">Phim Lẻ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab-3" role="tab" data-toggle="tab">Hoạt Hình</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="film-tabcontent">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in show active" id="tab-1">
                                            <div class="film-thumb">
                                                <span class="nth-1">1</span>
                                                <a href="" title="" class="thumb-image"><img src="{{ asset('public/frontend/images/thumb-2.png') }}"
                                                                                             alt="" title=""> </a>
                                                <div class="thumb-content">
                                                    <h4><a href="" title="">Chiếc Lá Cuốn Bay</a></h4>
                                                    <h5><a href="" title="">Bai Mai Tee Plid Plew (2019)</a></h5>
                                                    <p>Tập 10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab-2">
                                            <div class="film-thumb">
                                                <span class="nth-1">1</span>
                                                <a href="" title="" class="thumb-image"><img src="{{ asset('public/frontend/images/thumb-1.png') }}"
                                                                                             alt="" title=""> </a>
                                                <div class="thumb-content">
                                                    <h4><a href="" title="">Chiếc Lá Cuốn Bay</a></h4>
                                                    <h5><a href="" title="">Bai Mai Tee Plid Plew (2019)</a></h5>
                                                    <p>Tập 10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab-3">
                                            <div class="film-thumb">
                                                <span class="nth-1">1</span>
                                                <a href="" title="" class="thumb-image"><img src="{{ asset('public/frontend/images/thumb-4.png') }}"
                                                                                             alt="" title=""> </a>
                                                <div class="thumb-content">
                                                    <h4><a href="" title="">Chiếc Lá Cuốn Bay</a></h4>
                                                    <h5><a href="" title="">Bai Mai Tee Plid Plew (2019)</a></h5>
                                                    <p>Tập 10</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-box sidebar-box-2">
                                <div class="title-box">
                                    <a href="" title="" class="btn-general">Phim sắp chiếu</a>
                                </div>
                                <div class="film-thumb">
                                    <a href="" title="" class="thumb-image"><img src="{{ asset('public/frontend/images/thumb-4.png') }}" alt=""
                                                                                 title=""> </a>
                                    <div class="thumb-content">
                                        <h4><a href="" title="">Chiếc Lá Cuốn Bay</a></h4>
                                        <h5><a href="" title="">Bai Mai Tee Plid Plew (2019)</a></h5>
                                        <p>Tập 10</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="film-list">
            <div class="container">
                <div class="box-film box-film-anime">
                    <h2 class="title"><a href="" title="">Phim HOạt Hình</a></h2>
                    <div class="slider-film-2">
                        <div class="item mg-10">
                            <div class="film-item">
                                <a href="film-detail.html" title=""><img src="{{ asset('public/frontend/images/phim-1.png') }}" alt="" title=""> <span
                                            class="field-film">Tập 10</span></a>
                                <div class="film-info">
                                    <h3><a href="film-detail.html" title="">Để Âm Nhạc Cất Lời</a></h3>
                                    <h4>Bai Mai Tee Plid Plew (2019)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mgt-30 text-center"><a href="list.html" title="" class="btn-general">XEM THÊM</a></div>
                </div>
                <div class="box-film mgt-50">
                    <h2 class="title"><a href="" title="">TV - Show</a></h2>
                    <div class="slider-film-2">
                        <div class="item mg-10">
                            <div class="film-item">
                                <a href="film-detail.html" title=""><img src="{{ asset('public/frontend/images/phim-5.png') }}" alt="" title=""> <span
                                            class="field-film">Tập 10</span></a>
                                <div class="film-info">
                                    <h3><a href="film-detail.html" title="">Để Âm Nhạc Cất Lời</a></h3>
                                    <h4>Bai Mai Tee Plid Plew (2019)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mgt-30 text-center"><a href="list.html" title="" class="btn-general">XEM THÊM</a></div>
                </div>
            </div>
        </section>
    </main>
@endsection
