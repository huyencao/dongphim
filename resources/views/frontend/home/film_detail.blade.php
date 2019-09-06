@extends('frontend.layouts.master')

@section('content')
    <main class="cd-main-content">
        <section class="list">
            <div class="container">
                <div class="box-filmInfo">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="image-filmInfo"><a href="video-film.html" title=""><img
                                            src="{{ asset(@$movie_detail->image) }}" alt="" title=""
                                            style="width: 507.8px; height: 513.45px"> </a></div>
                        </div>
                        <div class="col-md-7">
                            <div class="content-filmInfo">
                                <h1><a href="" title="">{{ @$movie_detail->name }}</a></h1>
                                <h2>{{ @$movie_detail->info }}</h2>
                                <ul class="film-index">
                                    @if (!empty($list_episode))
                                        <?php $view = array(); ?>
                                        @foreach ($list_episode as $episode)
                                            <?php
                                            $url = @$episode->url;
                                            parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
                                            $video_ID = $my_array_of_vars['v'];
                                            $app_key = 'AIzaSyBtw9pLrJjiTV6VdSyc3Z5LofS_bXIfWT4';
                                            $api_response = curl_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics&id=' . $video_ID . '&fields=items/statistics&key=' . $app_key);
                                            $api_response_decoded = json_decode($api_response, true);
                                            $view[] = $api_response_decoded['items'][0]['statistics']['viewCount'];
                                            ?>
                                        @endforeach
                                        <?php $totalView = array_sum($view);
                                        if (!empty($totalView)) {
                                            echo '<li> Lượt xem: ' . number_format($totalView, 0, '.', '.') . '</li>';
                                        }
                                        ?>
                                    @endif
                                    {{--                                    <li>Lượt xem: 123.456</li>--}}
                                    <li>Năm sản xuất: {{ @$movie_detail->production_year }}</li>
                                </ul>
                                <div class="film-episode">
                                    <h3>Tập phim</h3>
                                    <ul>
                                        @if (!empty($list_episode))
                                            @foreach ($list_episode as $episode)
                                                <li><a href="/dongphim/video/{{ @$episode->slug}}-{{  @$episode->id }}.html" title="{{ @$episode->name }}">{{ @$episode->name }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    {{ $list_episode->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calen">
                    <h4>Thông Tin - Lịch Chiếu</h4>
                    <p>{!! @$movie_detail->show_times !!}</p>
                </div>
                <div class="box-film mgt-50">
                    <h2 class="title-md">Trailer</h2>
                    <div class="slider-film slider-film-3">
                        @if (!empty($movie_trailer))
                            @foreach ($movie_trailer as $trailer)
                                <div class="item mg-10">
                                    <div class="film-item">
                                        <a href="" title=""><img src="{{ asset(@$trailer->image) }}" alt="" title="">
                                        </a>
                                        <div class="film-info">
                                            <h3><a href="" title="">{{ @$trailer->name }}</a></h3>
                                            <h4>{{ @$trailer->info }}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="nd-film mgt-50">
                    <h2 class="title-md">Nội Dung Phim</h2>
                    <div class="row">
                        <div class="col-md-6 film-shortdesc">
                            <p>{!! @$movie_detail->content !!}</p>
                        </div>
                        <div class="col-md-6 film-shortindex">
                            <ul class="film-index">
                                <li>Ngày Công Chiếu : {{ date('d/m/Y', strtotime(@$movie_detail->air_date)) }}</li>
                                <li>Số Tập : {{ @$movie_detail->episodes }}</li>
                                <li>Độ Dài : {{ @$movie_detail->movie_duration }}</li>
                                <li>Đạo Diễn : {{ @$movie_detail->directors }}</li>
                            </ul>
                            <div class="actor">
                                <h5 class="font-16 font-demi">Diễn Viên </h5>
                                <ul>
                                    <?php
                                    $movie_id = DB::table('movie_actor')->where('movie_id', @$movie_detail->id)->get();
                                    $actorID = $movie_id->pluck('actor_id')->toArray();
                                    $actor = DB::table('actor')->whereIn('id', $actorID)->get();
                                    ?>
                                    @foreach ($actor as $item)
                                        <li><span><img src="{{ asset(@$item->image) }}" alt="" title=""> </span>
                                            <p>{{ @$item->name }}</p></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bl-film mgt-50">
                    <h2 class="title-md">Bình Luận Phim</h2>
                    <div class="fb-comments" data-href="{{ URL::current() }}" data-width="1170" data-numposts="5"
                         style="background: #fff; width: 100%"></div>
                </div>
                <div class="box-film mgt-50">
                    <h2 class="title-md">Có Thể Bạn Quan Tâm</h2>
                    <div class="slider-film-2">
                        @if (!empty($list_interested))
                            @foreach ($list_interested as $value)
                                <div class="item mg-10">
                                    <div class="film-item">
                                        <a href="/dongphim/chi-tiet/{{ @$value->slug }}-{{ @$value->id }}.htm" title=""><img
                                                    src="{{ asset(@$value->image) }}" alt="" title=""> </a>
                                        <div class="film-info">
                                            <h3><a href="/dongphim/chi-tiet/{{ @$value->slug }}-{{ @$value->id }}.htm"
                                                   title="">{{ @$value->name }}</a></h3>
                                            <h4>{{ @$value->name }} (2019)</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <footer></footer>
    </main>
    <nav id="cd-lateral-nav" class="visible-mobile">
        <ul class="cd-navigation nav-dropdown">
            <li><a href="index.html" title="">Trang chủ</a></li>
            <li class="item-has-children">
                <a href="list.html" title="">Thể loại</a>
                <ul class="sub-menu">
                    <li><a href="list.html" title="">Tình cảm- lãng mạn</a></li>
                </ul>
            </li>
            <li><a href="list.html" title="">Quốc Gia</a></li>
        </ul>
    </nav>
@endsection