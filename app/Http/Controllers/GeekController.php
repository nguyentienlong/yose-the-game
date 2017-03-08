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
                if ($wpx < 0) {
                    if ($planePositionX - 1 !== $firePositionX && $planePositionY !== $firePositionY) {
                        $moves[] = ['dx' => -1, 'dy' => 0];
                    }
                } else {
                    if ($planePositionX + 1 !== $firePositionX && $planePositionY !== $firePositionY) {
                        $moves[] = ['dx' => 1, 'dy' => 0];
                    }
                }

            }
        }
        $wpy = $waterPositionY - $planePositionY;
        if ($wpy != 0) {
            for ($i = 0; $i < abs($wpy); $i++) {
                if ($wpx < 0) {
                    if ($planePositionY - 1 !== $firePositionY && $planePositionX !== $firePositionX) {
                        $moves[] = ['dx' => 0, 'dy' => -1];
                    }
                } else {
                    if ($planePositionX + 1 !== $firePositionX && $planePositionY !== $firePositionY) {
                        $moves[] = ['dx' => 0, 'dy' => 1];
                    }
                }

            }
        }

        $wfx = $waterPositionX - $firePositionX;
        if ($wpx != 0) {
            for ($i = 0; $i < abs($wpx); $i++) {
                if ($wpx < 0) {
                    if ($firePositionX - 1 !== $waterPositionX && $firePositionX !== $waterPositionX) {
                        $moves[] = ['dx' => -1, 'dy' => 0];
                    }
                } else {
                    if ($firePositionX + 1 !== $waterPositionX && $firePositionX !== $waterPositionX) {
                        $moves[] = ['dx' => 1, 'dy' => 0];
                    }
                }

            }
        }

        $wfy = $waterPositionY - $firePositionY;
        if ($wpy != 0) {
            for ($i = 0; $i < abs($wpy); $i++) {
                if ($wpx < 0) {
                    if ($firePositionY - 1 !== $waterPositionY && $firePositionY !== $waterPositionY) {
                        $moves[] = ['dx' => 0, 'dy' => -1];
                    }
                } else {
                    if ($firePositionY + 1 !== $waterPositionY && $firePositionY !== $waterPositionY) {
                        $moves[] = ['dx' => 0, 'dy' => 1];
                    }
                }

            }
        }
        return [
            "map" => $map,
            'moves' => $moves
        ];
    }
}
