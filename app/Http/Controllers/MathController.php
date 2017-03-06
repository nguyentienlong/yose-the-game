<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MathController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  Request  $request
     * @param  int  $number
     * @return Response
     */
    public function prime(Request $request)
    {
        $number = $request->input('number');
        $decomposition = [];

        while ( $number / 2 >= 1 && $number % 2 == 0  ){
            $number = $number / 2;
            $decomposition[] = 2;
        }

        return ['number' => (int)$request->input('number'), "decomposition" => $decomposition];
    }
}