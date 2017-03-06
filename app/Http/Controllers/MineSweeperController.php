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
        return view('minesweeper/index');
    }
}
