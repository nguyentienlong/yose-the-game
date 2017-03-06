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
        $decomposition = [];

        while ($number / 2 >= 1 && $number % 2 == 0) {
            $number = $number / 2;
            $decomposition[] = 2;
        }

        return ['number' => (int)$request->input('number'), "decomposition" => $decomposition];
    }
}