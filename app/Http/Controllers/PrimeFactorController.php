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
        $query  = explode('&', $_SERVER['QUERY_STRING']);
        $params = [];

        foreach( $query as $param )
        {
          list($name, $value) = explode('=', $param, 2);
          $params[urldecode($name)][] = urldecode($value);
        }

        $numbers = $params['number'];
        if (count($numbers) == 1){
            return $this->calcPrimes($numbers[0]);
        }

        $output = [];
        foreach ($numbers as $number) {
            $output[] = $this->calcPrimes($number);
        }

        return $output;
    }

    private function calcPrimes($number){
        $original_number = $number;

        if (!is_numeric($number)) {
            return ['number' => $number, "error" => "not a number"];
        }

        if ($number>1000000) {
            return['number'=> $number,"error"=>"too big number (>1e6)"];
        }

        if ($number<0) {
            return['number'=> $number,"error"=>$number." is not an integer > 1"];
        }

        $decomposition = [];
        
        for ($candidate = 2; $number > 1; $candidate++)
        {
            for (; $number % $candidate == 0; $number /= $candidate)
            {
                $decomposition[] = $candidate;
            }
        }

        return ['number' => $original_number, "decomposition" => $decomposition];
    }
}