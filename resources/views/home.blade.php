@extends('layouts.app')

@section('content')
        @inject('image', 'Tmdb\Helper\ImageHelper')
       <div class="container  box-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="page-header text-center tittle h3">MOVIES</div>
                        @foreach ($movies as $movie)
                            <?php 
                                $movieTitle= str_replace(' ', '-',strtolower($movie->getTitle()));
                                $movieTitle = str_replace("'", "", "$movieTitle");
                                $movieTitleAdwordUrl = '?&keyword='. $movieTitle.'&matchtype='.$parameters['matchtype'].'&creative='.$parameters['creative'].'&gclid='.$parameters['gclid'];
                            ?>

                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="movie-list text-center" data-toggle="tooltip" data-placement="top" title="{{ $movie->getTitle() }}">
                                    <a href="/movie/show/{{ $movie->getID() .  $movieTitleAdwordUrl }}">
                                         {!! $image->getHtml($movie->getPosterImage(), 'w154', 150, 320) !!}

                                        <div class="label label-warning movie-list-title nowrap">{{ $movie->getTitle() }}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="page-header text-center tittle h3">TV SHOWS</div>
                        @foreach ($tvshows as $tvshow)
                             <?php 

                                $tvshowTitle= str_replace(' ', '-',strtolower($tvshow->getName()));
                                $tvshowTitle = str_replace("'", "", "$tvshowTitle");
                                $tvshowTitleAdwordUrl = '?&keyword='. $tvshowTitle.'&matchtype='.$parameters['matchtype'].'&creative='.$parameters['creative'].'&gclid='.$parameters['gclid'];
                            ?>
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="movie-list text-center" data-toggle="tooltip" data-placement="top" title="{{ $tvshow->getName() }}">
                                    <a href="tv/show/{{ $tvshow->getID() . $tvshowTitleAdwordUrl}}">
                                         {!! $image->getHtml($tvshow->getPosterImage(), 'w154', 150, 320) !!}

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
