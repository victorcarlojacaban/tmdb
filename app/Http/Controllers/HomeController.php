<?php

namespace App\Http\Controllers;

use Tmdb\Repository\MovieRepository;
use Tmdb\Repository\TvRepository;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{

    private $movies;
    private $tvs;

    public function __construct(MovieRepository $movies, TvRepository $tvs)
    {
        $this->movies = $movies;
        $this->tvs = $tvs;
    }

    /**
     * Show popular tv and movies
     *
     * @return Response
     */
    public function index()
    {
        $movies = $this->movies->getPopular();
        $tvshows = $this->tvs->getPopular();

        return view('home', compact('movies', 'tvshows'));
    }
 }
