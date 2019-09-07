@extends('frontend.layouts.master')

@section('content')
    <main class="cd-main-content">
        <section class="list list-video">
            <div class="container">
                <div class="box-filmInfo">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="video-filmInfo">
                                <iframe width="100%" height="645" src="{{ asset(@$episode_detail->url) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="content-filmInfo">
                                <h1>{{ @$episode_detail->name }}</h1>
                                <h2>{{ @$episode_detail->info }}</h2>
{{--                                <div class="film-episode">--}}
{{--                                    <h3>Tập phim</h3>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="video-film.html" title="">Trailer</a> </li>--}}
{{--                                        <li class="active"><a href="video-film.html" title="">Tập 1</a> </li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="link-backprev flex-center-between">--}}
{{--                                        <a href="" title=""><i class="fa fa-backward"></i> Mới hơn</a>--}}
{{--                                        <a href="" title="">Cũ hơn<i class="fa fa-forward"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="film-episode">
                                    <h3>Tập phim</h3>
                                    <ul>
                                        @if (!empty($list_episode))
                                            @foreach ($list_episode as $episode)
                                                <li @if($episode_detail->id == $episode->id) class="active" @endif><a href="/dongphim/video/{{ @$episode->slug}}-{{  @$episode->id }}.html" title="{{ @$episode->name }}">{{ @$episode->name }}</a>
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
    </main>

@endsection