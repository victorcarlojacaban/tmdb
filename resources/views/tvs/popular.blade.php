@extends('layouts.app')

@section('content')
        @inject('image', 'Tmdb\Helper\ImageHelper')
       <div class="container  box-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="page-header text-center tittle h3">POPULAR TV SHOWS</div>
                        @foreach ($tvshows as $tv)

                            <?php 

                                $tvshowTitle= str_replace(' ', '-',strtolower($tv->getName()));
                                $tvshowTitle = str_replace("'", "", "$tvshowTitle");
                                $tvshowTitleAdwordUrl = '?&keyword='. $tvshowTitle.'&matchtype='.$parameters['matchtype'].'&creative='.$parameters['creative'].'&gclid='.$parameters['gclid'];
                            ?>

                            <div class="col-md-2 col-sm-4 col-xs-6 rw" style="height:270px">
                                <div class="movie-list text-center" data-toggle="tooltip" data-placement="top" title="{{ $tv->getName() }}">
                                    <a href="/tv/show/{{ $tv->getID() . $tvshowTitleAdwordUrl }}">
                                        @if (!empty($image->getHtml($tv->getPosterImage(), 'w154', 150, 320)))
                                            {!! $image->getHtml($tv->getPosterImage(), 'w154', 150, 320) !!}
                                        @else
                                            <img src="/no-poster.jpg" class="img-responsive">
                                        @endif

                                        <div class="label label-warning movie-list-title nowrap">{{ $tv->getName() }}</div>
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
