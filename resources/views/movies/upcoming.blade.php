@extends('layouts.app')

@section('content')
        @inject('image', 'Tmdb\Helper\ImageHelper')
       <div class="container  box-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="page-header text-center tittle h3">UPCOMING MOVIES</div>
                        @foreach ($movies as $movie)

                             <?php 

                                $movieTitle= str_replace(' ', '-',strtolower($movie->getTitle()));
                                $movieTitle = str_replace("'", "", "$movieTitle");
                                $movieTitleAdwordUrl = '?&keyword='. $movieTitle.'&matchtype='.$parameters['matchtype'].'&creative='.$parameters['creative'].'&gclid='.$parameters['gclid'];
                            ?>

                            <div class="col-md-2 col-sm-4 col-xs-6" style="height:270px">
                                <div class="movie-list text-center" data-toggle="tooltip" data-placement="top" title="{{ $movie->getTitle() }}">
                                    <a href="/movie/show/{{ $movie->getID() . $movieTitleAdwordUrl }}">
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
                </div>
                <center>@include('include.pagination')</center>
        </div>
    </div>

@endsection
