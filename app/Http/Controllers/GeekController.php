<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeekController extends Controller
{
    public function index(Request $request)
    {
        $width = $request->get('width');
        $map = $request->get('map');
        $planePositionX = strpos($map,'P') % $width;
        $planePositionY = ceil(strpos($map,'P') / $width);
        var_dump($planePositionX,$planePositionY);

        dd(request()->all());
    }
}
