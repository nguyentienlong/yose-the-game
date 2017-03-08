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

            if( strpos($numbers[0], ', ') === false ){
                return $this->calcPrimes($numbers[0]);
            }else{
                $numbers = explode(', ', $numbers[0]);
                $output = '<ol id="results">';
                foreach ($numbers as $number) {
                    $result = $this->calcPrimes($number);
                    if( !empty($result['error']) ){
                        $output .= '<li>'.$result['number'].' is '.$result['error'].'</li>';
                    }else{
                        $output .= '<li>'.$result['number'].' = '.implode(' x ', $result['decomposition']).'</li>';
                    }
                }
                $output .= '<ol>';
                return $output;
            }
        }

        $output = [];
        foreach ($numbers as $number) {
            $output[] = $this->calcPrimes($number);
        }

        return $output;
    }

    private function calcPrimes($number){
        $original_number = $number;
        $roman = false;

        if (!is_numeric($number)) {
            $number = $this->numberFromRoman($number);
            if( $number > 0 && $number < 400 ){
                $roman = true;
            }else{
                return ['number' => $number, "error" => "not a number"];
            }
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
                $decomposition[] = ($roman == true)?$this->integerToRoman($candidate):$candidate;
            }
        }

        return ['number' => $original_number, "decomposition" => $decomposition];
    }

    private function numberFromRoman($roman){
        $romans = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        );

        $result = 0;

        foreach ($romans as $key => $value) {
            while (strpos($roman, $key) === 0) {
                $result += $value;
                $roman = substr($roman, strlen($key));
            }
        }
        return $result;
    }

    function integerToRoman($integer)
    {
        $integer = intval($integer);
        $result = '';

        $lookup = array('M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1);

        foreach($lookup as $roman => $value){
            $matches = intval($integer/$value);
            $result .= str_repeat($roman,$matches);
            $integer = $integer % $value;
        }

        return $result;
    }
}