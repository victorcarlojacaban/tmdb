@extends('layouts.app')

@section('content')
        @inject('image', 'Tmdb\Helper\ImageHelper')
        <div class="container  box-container">
            <div class="row">
                 <div class="col-md-9 col-xs-12">
                    <div class="row" style="padding:5px;">
                        <div class="page-header text-center tittle h3">{{ $movie->getTitle() }}</div>
                              <div id="player">
                                <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="//www.youtube.com/embed//{{ $video }}?rel=0" width="600" height="315" frameborder="0" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:25px;"></div>
                    <table class="table">
                        <div>
                            <tbody>    
                                <td class="text-center">
                                    <div class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-watch"> 
                                        <i class="fa fa-cloud-download"></i>Download
                                    </div> 
                                    <a class="btn btn-danger btn-lg" target="" href="{{ urlPath() }}"><i class="fa fa-youtube-play"></i> Watch Now </a><p><i class="fa fa-lock"></i> Secure Verified</p>
                                </td>
                            
                            </tbody>
                        </div>
                    </table>
                <div class="row" style="margin-top:25px;">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12 common">
                                {!! $image->getHtml($movie->getPosterImage(), 'w154', 150, 320) !!}
                                <div class="rating-stars text-center">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 
                                </div> <!-- rating-stars -->
                                <div class="rating-vote text-center">

                                    <!-- 8.3/10 by 6867 users -->
                                </div> <!-- rating-vote -->
                            </div>
                            <div class="col-sm-8 col-xs-12">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr><th width="150">Title</th><td>:</td><td>{{ $movie->getTitle() }}</td></tr>
                                        <tr><th>Release</th><td>:</td><td> {{ $movie->getReleaseDate()->format('Y-m-d') }}</td></tr>
                                        <tr><th>Runtime</th><td>:</td><td> {{ $movie->getRuntime() }} min</td></tr>
                                        <tr><th>Genre</th><td>:</td>
                                            <td>
                                            @foreach ($movie->getGenres() as $genre)
                                                {{ $genre->getName() }}
                                            @endforeach
                                        </td>
                                        </tr>
                                
                                        <tr><th>Stars</th><td>:</td><td> 
                                            <?php $counter = 1;?>
                                            @foreach ($movie->getCredits()->getCast() as $actor)
                                                @if ($counter <= 10)
                                                    {{ $actor->getName() }}
                                                @endif
                                               <?php $counter++; ?>
                                            @endforeach
                                        </td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4">
                          <table class="table table-striped">
                            <tbody> 
                              <tr>
                                <td>
                                   {{ $movie->getOverview() }}
                                </td>
                              </tr>
                                  </tbody>
                          </table>
                </div>
                </div> 
            @include('include.comments')
            <div class="col-md-12">
                   <ul> <div class="text">This filename has been transmitted via an external affiliate, we can therefore furnish no guarantee for the existence of this file on our servers.
                    <br>© 2005 - 2016</div></ul>
            </div><!-- col-md-12 -->
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="text-center h3" style="margin-top: 0;font-size: 18px;">Similar Movies</div>
                    @foreach($movie->getSimilarMovies() as $similarMovie)
                        <div class="col-md-12 similar-movie">
                             <a href="/movie/show/{{ $similarMovie->getID() }}" title="{{ $similarMovie->getTitle() }}" title="{{ $similarMovie->getTitle() }}" class="text-center">
                              {!! $image->getHtml($similarMovie->getPosterImage(), 'w780', 150, 320) !!}
                           
                              <span style="font-size: 12px;background-color: rgba(0, 0, 0, 0.77);text-shadow: 1px 1px 1px #000;color: #FFF;padding: 5px;" class="nowrap">{{ $similarMovie->getTitle() }}</span>
                            </a>
                        </div>
                   @endforeach()
            </div>
             @include('include.register-form')
            </div>
    </div>
@endsection
