@extends('layouts.app')

@section('content')
        @inject('image', 'Tmdb\Helper\ImageHelper')
       <div class="container  box-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="page-header text-center tittle h3">TV SHOWS ON THE AIR</div>
                        @foreach ($tvshows as $tv)

                            <div class="col-md-2 col-sm-4 col-xs-6 rw" style="height:270px">
                                <div class="movie-list text-center" data-toggle="tooltip" data-placement="top" title="{{ $tv->getName() }}">
                                    <a href="/tv/show/{{ $tv->getID() }}">
                                         {!! $image->getHtml($tv->getPosterImage(), 'w154', 150, 320, ['class' => 'yes']) !!}


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
