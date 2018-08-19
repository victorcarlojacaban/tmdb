<?php

namespace App\Http\Controllers;

use Tmdb\Helper\ImageHelper;
use Illuminate\Http\Request;
use Tmdb\Laravel\Facades\Tmdb;
use Tmdb\Repository\MovieRepository;

class MovieController extends Controller
{
    private $movies;
    private $helper;

    public function __construct(MovieRepository $movies, ImageHelper $helper)
    {
        $this->movies = $movies;
        $this->helper = $helper;
    }

    /**
     * Show top rated movies
     *
     * @return Response
     */
    public function toprated(Request $request, $id)
    {
        $movies = $this->movies->getTopRated(['page' => $id]);

        $count = Tmdb::getMoviesApi()->getTopRated()['total_pages'];

        return view('movies.top', compact('movies', 'count', 'id'));
    }

    /**
     * Show upcoming movies
     *
     * @return Response
     */
    public function upcoming(Request $request, $id)
    {
        $movies = $this->movies->getUpcoming(['page' => $id]);

        $count = Tmdb::getMoviesApi()->getUpcoming()['total_pages'];

        return view('movies.upcoming', compact('movies', 'count', 'id'));
    }

    /**
     * Show Now playing movies
     *
     * @return Response
     */
    public function nowplaying(Request $request, $id)
    {
        $movies = $this->movies->getNowPlaying(['page' => $id]);

        $count = Tmdb::getMoviesApi()->getNowPlaying()['total_pages'];

        return view('movies.now-playing', compact('movies', 'count', 'id'));
    }

    /**
     * Show specific detail of a movie
     */
    public function show($id)
    {
        $movie = $this->movies->load($id);

        $video =  Tmdb::getMoviesApi()->getVideos($id)['results'][0]['key'] ?? null;

        return view('movies.show', compact('movie', 'video'));
    }
}
