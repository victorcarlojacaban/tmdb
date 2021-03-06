<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>WATCH MOVIES APP</title>

    <link rel="icon"  type="image/png" href="{{ asset('favicon.ico') }}" />

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js" type="text/javascript"></script>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Ads: 793735792 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-793735792"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-793735792');
    </script>

<body>


<?php 
  $urlAdwordUrl = '?&keyword='. $parameters['keyword'].'&matchtype='.$parameters['matchtype'].'&creative='.$parameters['creative'].'&gclid='.$parameters['gclid'];
?>

<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">WATCH MOVIES APP</a>
        </div><!-- navbar-header -->
        <div class="navbar-collapse collapse" id="searchbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <i class="fa fa-film"></i> Movie <span class="caret"></span>
                    </a>
                                                        <ul class="dropdown-menu" role="menu">
                      <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                      <li><a href="/movie/nowplaying/1{{ $urlAdwordUrl }}"><i class="fa fa-dot-circle-o"></i> Now Playing</a></li>
                      <li><a href="/movie/toprated/1{{ $urlAdwordUrl }}"><i class="fa fa-list-alt"></i> Top Rated</a></li>
                      <li><a href="/movie/upcoming/1{{ $urlAdwordUrl }}"><i class="fa fa-star-half-o"></i> Upcoming</a></li>
                                                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <i class="fa fa-file-video-o"></i> TV Show<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/tv/airing/1{{ $urlAdwordUrl }}"><i class="fa fa-dot-circle-o"></i> TV shows Airing</a></li>
                        <li><a href="/tv/onair/1{{ $urlAdwordUrl }}"><i class="fa fa-list-alt"></i> On the Air</a></li>
                        <li><a href="/tv/popular/1{{ $urlAdwordUrl }}"><i class="fa fa-star-half-o"></i> Popular TV Series</a></li>
                    </ul>
                </li>
                <li>&nbsp;</li>
            </ul>
            <form class="navbar-form" method="get" action="/">
                <div class="form-group" style="display:inline;">
                    <div class="input-group" style="display:table;">
                        <input name="do" type="hidden" value="search">
                        <input class="form-control search-form" name="q" placeholder="Type Movie title here?" autocomplete="off" autofocus="autofocus" type="text">
                        <span class="input-group-btn" style="width:1%;cursor: pointer;"><button type="submit" class="btn btn-primary"> Search</button></span>
                     </div>
                </div>
            </form>
        </div><!-- nav-collapse -->
    </div><!-- container -->
</div>
  <!-- column content -->
  <div>
      @yield('content')
  </div>
  <footer class="col-md-12 footer-deck">
  <div class="container">
    <div class="col-sm-6">Copyright © 2018 | www.mediastreamm.com</div>
    <div class="col-sm-6">
        <button class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target=".dcma" style="min-width: 100px;">DMCA</button> 
        <button class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target=".privacy" style="min-width: 100px;">Privacy Police</button>
        <button class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target=".contact" style="min-width: 100px;">About Us</button>
    </div>
  </div>
</footer>
@include('include.modal')

   
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      $('.movie-list img').addClass('img-responsive');
      $('.common img').addClass('img-responsive thumbnail');
      $('.similar-movie img').addClass('gird-pic img-responsive');
      $('.similar-tv img').addClass('gird-pic img-responsive');
    </script>
    @stack('scripts')

</body>

</html>
