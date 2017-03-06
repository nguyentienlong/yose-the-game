<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrimeFactorController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  Request $request
     * @param  int $number
     * @return Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'numeric',
        ]);

        if ($validator->fails()) {
            return ['number' => $request->input('number'), "error" => "not a number"];
        }

        $number = $request->input('number');

        if ($number>1000000) {
            return['number'=>$request->input('number'),"error"=>"toobignumber(>1e6)"];
        }

        $decomposition = [];
        
        for ($candidate = 2; $number > 1; $candidate++)
        {
            for (; $number % $candidate == 0; $number /= $candidate)
            {
                $decomposition[] = $candidate;
            }
        }

        return ['number' => (int)$request->input('number'), "decomposition" => $decomposition];
    }
}