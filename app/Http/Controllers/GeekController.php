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
        $planePositionY = (int)ceil(strpos($map, 'P') / $width);

        $waterPositionX = strpos($map, 'W') % $width;
        $waterPositionY = (int)ceil(strpos($map, 'W') / $width);

        $firePositionX = strpos($map, 'F') % $width;
        $firePositionY = (int)ceil(strpos($map, 'F') / $width);


        var_dump($planePositionX, $planePositionY);
        var_dump($waterPositionX, $waterPositionY);
        var_dump($firePositionX, $firePositionY);

        dd(request()->all());
    }
}
