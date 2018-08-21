@extends('layouts.app')

@section('content')
         @inject('image', 'Tmdb\Helper\ImageHelper')
        <div class="container  box-container">
            <div class="row">
                 <div class="col-md-12 col-xs-12">
                    <div class="row" style="padding:5px;">
                        <div class="page-header text-center tittle h3"><strong>{{ $tv->getName() }}</strong></div>
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
                                    <div class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-watch"> <i class="fa fa-cloud-download"></i> Download</div> 
                                    <a class="btn btn-danger btn-lg" target=""  href="{{ urlPath() }}"><i class="fa fa-youtube-play"></i> Watch Now </a><p><i class="fa fa-lock"></i> Secure Verified</p></td>
                            
                            </tbody>
                        </div>
                    </table>
            <div class="tab-content">
            <div id="sectionA" class="tab-pane fade in active">
            <div class="row" style="margin-top:25px;">
            <div class="col-md-12">
                <div class="row">
                <div class="col-sm-3 col-xs-12 common">
                @if (!empty($image->getHtml($tv->getPosterImage(), 'w154', 150, 320)))
                    {!! $image->getHtml($tv->getPosterImage(), 'w154', 150, 320) !!}
                @else
                    <img src="/no-poster.jpg" class="img-responsive">
                @endif
                <div class="rating-stars text-center">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                </div> <!-- rating-stars -->
                <div class="rating-vote text-center">
                8/10 by 79 users
                </div> <!-- rating-vote -->
                </div><!-- col-sm-3 -->
                <div class="col-sm-9 col-xs-12">
                    <table class="table table-striped">
                        <tbody>
                            <tr><th width="150">Title</th><td>:</td><td> {{ $tv->getName() }} </td></tr>
                            <tr><th>Genre</th><td>:</td>
                                <td>
                                @foreach ($tv->getGenres() as $genre)
                                    {{ $genre->getName() }}
                                @endforeach
                            </td>
                            </tr>
                            <tr><th>First Air Date</th><td>:</td><td> {{ $tv->getFirstAirDate()->format('Y-m-d') }} </td></tr>
                            <tr><th>Last Air Date</th><td>:</td><td> {{ $tv->getLastAirDate()->format('Y-m-d') }}</td></tr>
                            <tr><th>Number of Seasons</th><td>:</td><td> {{ $tv->getNumberOfSeasons() }}</td></tr>
                            <tr><th>Number of Episodes</th><td>:</td><td> {{ $tv->getNumberOfEpisodes() }}</td></tr>
                            <tr><th>Runtime</th><td>:</td><td> {{ $tv->getEpisodeRunTime()[0] ?? null }} min/episode</td></tr>
                            <tr><th>Overview</th><td>:</td><td> {{ $tv->getOverview() }}</td></tr>
                            <tr><th>Stars</th><td>:</td><td> 
                                @foreach ($tv->getCredits()->getCast() as $actor)    
                                    <span itemprop="actor" itemscope itemtype="http://schema.org/Person"><span itemprop="name">{{ $actor->getName() }}</span></span>,
                                 @endforeach
                             </td></tr>
                        </tbody>
                    </table>
                </div><!-- col-sm-9 -->
                </div><!-- row -->
            </div><!-- col-md-12 -->
            
            </div><!-- row -->
        </div><!-- sectionA  -->

        <div id="sectionB" class="tab-pane fade" style="padding-bottom:25px;">
        <div class="list-group" style="margin-top: 10px;">
            <a class="list-group-item" href="http://www.free26.tk/tv/65930-1/my-hero-academia.html" itemprop="season" itemscope itemtype="http://schema.org/TVSeason">
            <span class="badge">April 03, 2016</span>
                <span itemprop="name">Season 1</span> 
                <span class="label label-info">13 Episodes</span>    
            </a>        
            <a class="list-group-item" href="http://www.free26.tk/tv/65930-2/my-hero-academia.html" itemprop="season" itemscope itemtype="http://schema.org/TVSeason">
                <span class="badge">April 01, 2017</span>
                <span itemprop="name">Season 2</span> 
                <span class="label label-info">25 Episodes</span>    
            </a>        
            <a class="list-group-item" href="http://www.free26.tk/tv/65930-3/my-hero-academia.html" itemprop="season" itemscope itemtype="http://schema.org/TVSeason"><span class="badge">April 07, 2018</span>
            <span itemprop="name">Season 3</span> 
            <span class="label label-info">20 Episodes</span>    
                </a>        
                                    </div>
        </div><!-- sectionB  -->
    </div><!-- tab-content  -->
        @include('include.comments')
        <div class="col-md-12">
            <div class="text-center h3">Top Related TV Series</div>
            @foreach($tv->getSimilar() as $similartv)
                <div class="col-md-2 col-sm-4 col-xs-4 similar-tv" style="padding:5px;">
                    <a href="/tv/show/{{ $similartv->getID() }}" title="{{ $similartv->getName() }}" title="{{ $similartv->getName() }}" class="text-center">
                         {!! $image->getHtml($similartv->getPosterImage(), 'w154', 150, 320) !!}
                        <span style="font-size: 12px;background-color: rgba(0, 0, 0, 0.77);text-shadow: 1px 1px 1px #000;color: #FFF;padding: 5px;" class="nowrap">{{ $similartv->getName() }}</span>
                    </a>
                </div>
            @endforeach             
        </div>
        @include('include.register-form')
    </div>
</div>


@endsection
