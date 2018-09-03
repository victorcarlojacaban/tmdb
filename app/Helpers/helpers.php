<?php

/**
 * return constant url
 *
 *  MAKE SURE TO POINT OUT HTTPS OR HTTP EVERYTIME YOU CHANGE URL
 */
function urlPath()
{
    // return '/watching';
    
    // adword parameters
    $keyword = request()->keyword ?? '{keyword}';
    $matchtype = request()->matchtype ?? '{matchtype}';
    $creative = request()->creative ?? '{creative}';
    $gclid = request()->gclid ?? '{gclid}';

    return 'http://www.myleadtracks.com/click.php?c=109&key=063j8y0hsob8r4ur88zz1dfv&keyword='. $keyword .'&matchtype='. $matchtype .'&creative='. $creative .'&gclid='. $gclid .'';
}

/**
 * return constant sign up url
 * THIS is for Sign up button only
 * MAKE SURE TO POINT OUT HTTPS OR HTTP EVERYTIME YOU CHANGE URL
 */
function signUpUrlPath()
{	
    return '/signup';
}