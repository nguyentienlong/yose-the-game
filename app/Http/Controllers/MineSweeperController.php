<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MineSweeperController extends Controller
{

    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        $minesMatrix = config('minesweeper.minesMatrix');

        return view('minesweeper/index', compact('minesMatrix'));
    }

}
