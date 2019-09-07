@extends('frontend.layouts.master')

@section('content')
    <main class="cd-main-content">
        <section class="list">
            <div class="container">
                <h1 class="title-in text-uppercase">{{ @$cat->name }}</h1>
                <div class="row">
                    @if (!empty($data_movie))
                        @foreach ($data_movie as $movie)
                            <div class="col-md-3">
                                <div class="film-item">
                                    <a href="/dongphim/chi-tiet/{{ @$movie->slug }}-{{ @$movie->id }}.html"
                                       title=""><img src="{{ asset(@$movie->image) }}" alt="" title="">
                                        <?php
                                            $movie_id = @$movie->id;
                                            $episodes = DB::table('episode')->select('name')->where('movie_id', $movie_id)->orderBy('updated_at', 'DESC')->first();
                                            if (!empty($episodes))
                                            echo '<span class="field-film">'.$episodes->name.'</span>';
                                            else {
                                             echo '';
                                            }
                                            ?>
                                    </a>

                                    <div class="film-info">
                                        <h3><a href="/dongphim/chi-tiet/{{ @$movie->slug }}-{{ @$movie->id }}.html"
                                               title="" tabindex="0">{{ str_limit(@$movie->name, 20) }}</a>
                                        </h3>
                                        <h4>{{ str_limit(@$movie->info, 20) }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                {{ $data_movie->links() }}
            </div>
        </section>
    </main>

@endsection