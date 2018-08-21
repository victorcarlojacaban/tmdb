@extends('layouts.app')

@section('content')
        @inject('image', 'Tmdb\Helper\ImageHelper')
       <div class="container  box-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="page-header text-center tittle h3">MOVIES</div>
                        @foreach ($movies as $movie)
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="movie-list text-center" data-toggle="tooltip" data-placement="top" title="{{ $movie->getTitle() }}">
                                    <a href="/movie/show/{{ $movie->getID() }}">
                                        @if (!empty($image->getHtml($movie->getPosterImage(), 'w154', 150, 320)))
                                            {!! $image->getHtml($movie->getPosterImage(), 'w154', 150, 320) !!}
                                        @else
                                            <img src="/no-poster.jpg" class="img-responsive">
                                        @endif

                                        <div class="label label-warning movie-list-title nowrap">{{ $movie->getTitle() }}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="page-header text-center tittle h3">TV SHOWS</div>
                        @foreach ($tvshows as $tvshow)
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="movie-list text-center" data-toggle="tooltip" data-placement="top" title="{{ $tvshow->getName() }}">
                                    <a href="tv/show/{{ $tvshow->getID() }}">
                                        @if (!empty($image->getHtml($tvshow->getPosterImage(), 'w154', 150, 320)))
                                            {!! $image->getHtml($tvshow->getPosterImage(), 'w154', 150, 320) !!}
                                        @else
                                            <img src="/no-poster.jpg" class="img-responsive">
                                        @endif

                                        <div class="label label-warning movie-list-title nowrap">{{ $tvshow->getName() }}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>

@endsection
