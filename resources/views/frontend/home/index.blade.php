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
                                        @if (!empty($data_appoint))
                                            @foreach ($data_appoint as $appoint)
                                                <div class="col-md-3 col-6">
                                                    <div class="film-item">
                                                        <a href="/dongphim/chi-tiet/{{ @$appoint->slug }}-{{ @$appoint->id }}.html"
                                                           title=""><img
                                                                    src="{{ asset(@$appoint->image) }}"
                                                                    alt=""
                                                                    title="">
                                                            <?php
                                                            $movie_id = @$appoint->id;
                                                            $episodes = DB::table('episode')->select('name')->where('movie_id', $movie_id)->orderBy('updated_at', 'DESC')->first();
                                                            if (!empty($episodes))
                                                                echo '<span class="field-film">' . $episodes->name . '</span>';
                                                            else {
                                                                echo '';
                                                            }
                                                            ?>
                                                            {{--                                                            <span class="field-film">Tập 10</span>--}}
                                                        </a>
                                                        <div class="film-info">
                                                            <h3>
                                                                <a href="/dongphim/chi-tiet/{{ @$appoint->slug }}-{{ @$appoint->id }}.html"
                                                                   title="">{{ str_limit(@$appoint->name, 20) }}</a>
                                                            </h3>
                                                            <h4>{{ str_limit(@$appoint->info, 20) }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="mgt-30 text-center"><a href="/dongphim/album/phim-de-cu.htm" title=""
                                                                   class="btn-general">XEM
                                        THÊM</a></div>
                            </div>
                            <div class="box-film mgt-50">
                                <h2 class="title"><a href="" title="">Phim chiếu rạp</a></h2>
                                <div class="slider-film">
                                    @if (!empty($data_movie))
                                        @foreach($data_movie as $item)
                                            <div class="item mg-10">
                                                <div class="film-item">
                                                    <a href="/dongphim/chi-tiet/{{ @$item->slug }}-{{ @$item->id }}.html"
                                                       title=""><img
                                                                src="{{ asset($item->image) }}"
                                                                alt=""
                                                                title="">
                                                        <?php
                                                        $movie_id = @$item->id;
                                                        $episodes = DB::table('episode')->select('name')->where('movie_id', $movie_id)->orderBy('updated_at', 'DESC')->first();
                                                        if (!empty($episodes))
                                                            echo '<span class="field-film">' . $episodes->name . '</span>';
                                                        else {
                                                            echo '';
                                                        }
                                                        ?>
                                                        {{--                                                        <span class="field-film">Tập 10</span>--}}
                                                    </a>
                                                    <div class="film-info">
                                                        <h3>
                                                            <a href="/dongphim/chi-tiet/{{ @$item->slug }}-{{ @$item->id }}.html"
                                                               title="">{{ str_limit(@$item->name, 20) }}</a>
                                                        </h3>
                                                        <h4>{{ str_limit(@$item->info, 20) }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="mgt-30 text-center"><a href="/dongphim/album/phim-chieu-rap.htm" title=""
                                                                   class="btn-general">XEM THÊM</a></div>
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
                                            @if (!empty($data_pb))
                                                @foreach ($data_pb as $pb)
                                                    <div class="film-thumb">
                                                        <span class="nth-1">1</span>
                                                        <a href="" title="" class="thumb-image"><img
                                                                    src="{{ asset(@$pb->image) }}"
                                                                    alt="" title=""> </a>
                                                        <div class="thumb-content">
                                                            <h4>
                                                                <a href="/dongphim/chi-tiet/{{ @$pb->slug }}-{{ @$pb->id }}.html"
                                                                   title="">{{ str_limit(@$pb->name, 15) }}</a></h4>
                                                            <h5>
                                                                <a href="/dongphim/chi-tiet/{{ @$pb->slug }}-{{ @$pb->id }}.html"
                                                                   title="">{{ str_limit(@$pb->info, 15) }}</a>
                                                            </h5>
                                                            <?php
                                                            $movie_id = @$pb->id;
                                                            $episodes = DB::table('episode')->select('name')->where('movie_id', $movie_id)->orderBy('updated_at', 'DESC')->first();
                                                            if (!empty($episodes))
                                                                echo '<p>' . $episodes->name . '</p>';
                                                            else {
                                                                echo '';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab-2">
                                            <div class="film-thumb">
                                                <span class="nth-1">1</span>
                                                <a href="" title="" class="thumb-image"><img
                                                            src="{{ asset('public/frontend/images/thumb-1.png') }}"
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
                                                <a href="" title="" class="thumb-image"><img
                                                            src="{{ asset('public/frontend/images/thumb-4.png') }}"
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
                                @if (!empty($data_upcoming))
                                    @foreach ($data_upcoming as $upcoming)
                                        <div class="film-thumb">
                                            <a href="/dongphim/chi-tiet/{{ @$upcoming->slug }}-{{ @$upcoming->id }}.html"
                                               title="" class="thumb-image"><img
                                                        src="{{ asset(@$upcoming->image) }}" alt=""
                                                        title=""> </a>
                                            <div class="thumb-content">
                                                <h4>
                                                    <a href="/dongphim/chi-tiet/{{ @$upcoming->slug }}-{{ @$upcoming->id }}.html"
                                                       title="">{{ str_limit(@$upcoming->name, 15) }}</a></h4>
                                                <h5>
                                                    <a href="/dongphim/chi-tiet/{{ @$upcoming->slug }}-{{ @$upcoming->id }}.html"
                                                       title="">{{ str_limit(@$upcoming->info, 20) }}</a></h5>
                                                <?php
                                                $movie_id = @$upcoming->id;
                                                $episodes = DB::table('episode')->select('name')->where('movie_id', $movie_id)->orderBy('updated_at', 'DESC')->first();
                                                if (!empty($episodes))
                                                    echo '<p>' . $episodes->name . '</p>';
                                                else {
                                                    echo '';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
                        @if (!empty($data_animated))
                            @foreach ($data_animated as $animated)
                                <div class="item mg-10">
                                    <div class="film-item">
                                        <a href="/dongphim/chi-tiet/{{ @$animated->slug }}-{{ @$animated->id }}.html"
                                           title=""><img
                                                    src="{{ asset(@$animated->image) }}" alt="{{ @$animated->name }}"
                                                    title="">
                                            {{--                                            <span class="field-film">Tập 10</span>--}}
                                            <?php
                                            $movie_id = @$animated->id;
                                            $episodes = DB::table('episode')->select('name')->where('movie_id', $movie_id)->orderBy('updated_at', 'DESC')->first();
                                            if (!empty($episodes))
                                                echo '<span class="field-film">' . $episodes->name . '</span>';
                                            else {
                                                echo '';
                                            }
                                            ?>
                                        </a>
                                        <div class="film-info">
                                            <h3>
                                                <a href="/dongphim/chi-tiet/{{ @$animated->slug }}-{{ @$animated->id }}.html"
                                                   title="">{{ str_limit(@$animated->name, 20) }}</a></h3>
                                            <h4>{{ str_limit(@$animated->info, 20) }}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="mgt-30 text-center"><a href="/dongphim/album/hoat-hinh-anime.htm" title=""
                                                       class="btn-general">XEM THÊM</a></div>
                </div>
                <div class="box-film mgt-50">
                    <h2 class="title"><a href="" title="">TV - Show</a></h2>
                    <div class="slider-film-2">
                        @if (!empty($data_tvshow))
                            @foreach ($data_tvshow as $tvshow)
                                <div class="item mg-10">
                                    <div class="film-item">
                                        <a href="/dongphim/chi-tiet/{{ @$tvshow->slug }}-{{ @$tvshow->id }}.html"
                                           title=""><img
                                                    src="{{ asset(@$tvshow->image) }}" alt=""
                                                    title="">
                                            {{--                                            <span class="field-film">Tập 10</span>--}}
                                            <?php
                                            $movie_id = @$tvshow->id;
                                            $episodes = DB::table('episode')->select('name')->where('movie_id', $movie_id)->orderBy('updated_at', 'DESC')->first();
                                            if (!empty($episodes))
                                                echo '<span class="field-film">' . $episodes->name . '</span>';
                                            else {
                                                echo '';
                                            }
                                            ?>
                                        </a>
                                        <div class="film-info">
                                            <h3>
                                                <a href="/dongphim/chi-tiet/{{ @$tvshow->slug }}-{{ @$tvshow->id }}.html"
                                                   title="">{{ str_limit(@$tvshow->name, 20) }}</a></h3>
                                            <h4>{{ str_limit(@$tvshow->info, 20) }}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="mgt-30 text-center"><a href="/dongphim/album/tv-show.htm" title="" class="btn-general">XEM
                            THÊM</a></div>
                </div>
            </div>
        </section>
    </main>
@endsection
