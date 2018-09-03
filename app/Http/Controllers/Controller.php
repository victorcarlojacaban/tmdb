<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get total count from specific resource
     * 
     * @param  collection
     * 
     * @return int
     */
    protected function getResourceCount($resource)
    {
    	return $resource->getTotalPages();
    }

    /**
     * get parameters request for adwords
     * 
     * @param  collection
     * 
     * @return int
     */
    protected function getParameterRequest()
    {
        // adword parameters
        $keyword = request()->keyword ?? '{keyword}';
        $matchtype = request()->matchtype ?? '{matchtype}';
        $creative = request()->creative ?? '{creative}';
        $gclid = request()->gclid ?? '{gclid}';

        $parameters = [
            'keyword' => $keyword,
            'matchtype' => $matchtype,
            'creative' => $creative,
            'gclid' => $gclid,
        ];

        return $parameters;
    }
}
