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
        $parameters = $this->getParameterRequest();

        $tvshows = $this->tvs->getAiringToday(['page' => $id]);

        $count = $this->getResourceCount($tvshows);

        return view('tvs.airing', compact('tvshows', 'count', 'id', 'parameters'));
    }

     /**
     * Show onair tv shows
     *
     * @return Response
     */
    public function onair(Request $request, $id)
    {
        $parameters = $this->getParameterRequest();

        $tvshows = $this->tvs->getOnTheAir(['page' => $id]);

        $count = $this->getResourceCount($tvshows);

        return view('tvs.onair', compact('tvshows', 'count', 'id', 'parameters'));
    }

    /**
     * Show popular tv shows
     *
     * @return Response
     */
    public function popular(Request $request, $id)
    {
        $parameters = $this->getParameterRequest();

        $tvshows = $this->tvs->getPopular(['page' => $id]);

        $count = $this->getResourceCount($tvshows);

        return view('tvs.popular', compact('tvshows', 'count', 'id', 'parameters'));
    }

    /**
     * Show specific tv show detail
     */
    public function show($id)
    {
        $parameters = $this->getParameterRequest(); 

    	$tv = $this->tvs->load($id);

        $video =  Tmdb::getTvApi()->getVideos($id)['results'][0]['key'] ?? null;

        return view('tvs.show', compact('tv', 'video', 'parameters'));
    }
}
