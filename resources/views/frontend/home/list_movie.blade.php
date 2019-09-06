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
                                    <a href="/dongphim/chi-tiet/{{ @$movie->slug }}-{{ @$movie->id }}.htm" title=""><img src="{{ asset(@$movie->image) }}" alt="" title="">
                                        <span
                                                class="field-film">Tập 1</span></a>
                                    <div class="film-info">
                                        <h3><a href="/dongphim/chi-tiet/{{ @$movie->slug }}-{{ @$movie->id }}.htm" title="" tabindex="0">{{ @$movie->name }}</a>
                                        </h3>
                                        <h4>{{ @$movie->info }}</h4>
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