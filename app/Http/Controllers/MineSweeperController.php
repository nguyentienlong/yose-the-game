<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MineSweeperController extends Controller
{

    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        $mineMatrix = $this->generateMatrix();

        return view('minesweeper/index', compact('mineMatrix'));
    }

    /**
     * load maxtrix
     * @param  Request $request [description]
     * @return JsonResponse
     */
    public function load(Request $request)
    {
        $mineMatrix = $this->generateMatrix();

        return new JsonResponse($mineMatrix);
    }

    /**
     * generate mine matrix
     *
     */
    protected function generateMatrix()
    {
        $mineMatrix = [];

        $size = config('minesweeper.size');

        for($i = 0; $i < $size; $i++) {
            for($j = 0; $j < $size; $j++) {
                $mineMatrix[$i][$j] = rand(0, 1);
            }
        }

        return $mineMatrix;
    }
}
