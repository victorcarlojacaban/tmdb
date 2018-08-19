<?php

namespace App\Http\Controllers;

use Tmdb\Helper\ImageHelper;
use Tmdb\Repository\TvRepository;
use Tmdb\Laravel\Facades\Tmdb;
use Illuminate\Http\Request;

class TvController extends Controller
{
    private $tvs;
    private $helper;

    public function __construct(TvRepository $tvs, ImageHelper $helper)
    {
        $this->helper = $helper;
        $this->tvs = $tvs;
    }

    /**
     * Show airing tv shows
     *
     * @return Response
     */
    public function airing(Request $request, $id)
    {
        $tvshows = $this->tvs->getAiringToday(['page' => $id]);

        $count = Tmdb::getTvApi()->getAiringToday()['total_pages'];

        return view('tvs.airing', compact('tvshows', 'count', 'id'));
    }

     /**
     * Show onair tv shows
     *
     * @return Response
     */
    public function onair(Request $request, $id)
    {
        $tvshows = $this->tvs->getOnTheAir(['page' => $id]);

        $count = Tmdb::getTvApi()->getOnTheAir()['total_pages'];

        return view('tvs.onair', compact('tvshows', 'count', 'id'));
    }

    /**
     * Show popular tv shows
     *
     * @return Response
     */
    public function popular(Request $request, $id)
    {
        $tvshows = $this->tvs->getPopular(['page' => $id]);

        $count = Tmdb::getTvApi()->getPopular()['total_pages'];

        return view('tvs.popular', compact('tvshows', 'count', 'id'));
    }

    /**
     * Show specific tv show detail
     */
    public function show($id)
    {
    	$tv = $this->tvs->load($id);

        $video =  Tmdb::getTvApi()->getVideos($id)['results'][0]['key'] ?? null;

        return view('tvs.show', compact('tv', 'video'));
    }
}
