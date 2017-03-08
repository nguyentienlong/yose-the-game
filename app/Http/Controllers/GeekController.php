<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeekController extends Controller
{
    public function index(Request $request)
    {
        $width = $request->get('width');
        $map = $request->get('map');

        $planePositionX = strpos($map, 'P') % $width;
        $planePositionY = (int)floor(strpos($map, 'P') / $width);

        $waterPositionX = strpos($map, 'W') % $width;
        $waterPositionY = (int)floor(strpos($map, 'W') / $width);

        $firePositionX = strpos($map, 'F') % $width;
        $firePositionY = (int)floor(strpos($map, 'F') / $width);
        $hasWater = false;
        $map = str_split($map, $width);

        $moves = [];
        $wpx = $waterPositionX - $planePositionX;
        if ($wpx != 0) {
            for ($i = 0; $i < abs($wpx); $i++) {
                if ($wpx < 0 ) {
                    $moves[] = ['dx' => -1, 'dy' => 0];
                } else {
                    $moves[] = ['dx' => 1, 'dy' => 0];
                }

            }
        }
        dd($moves);


        dd(request()->all());
    }
}
