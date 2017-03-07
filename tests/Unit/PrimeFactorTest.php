<?php

namespace Tests\Browser;

use Tests\TestCase;

class PrimeFactorTest extends TestCase
{
    /**
     * @return void
     */
    public function testIndex()
    {
        $GLOBALS['_SERVER']['QUERY_STRING'] = "number=16";
        $response = $this->get('/primeFactors?number=16');
        $response->assertJson(["number" => 16, "decomposition" => [ 2, 2, 2, 2 ]]);
    }

    /**
     * @return void
     */
    public function testNotNumber()
    {
        $GLOBALS['_SERVER']['QUERY_STRING'] = "number=hello";
        $response = $this->get('/primeFactors?number=hello');
        $response->assertJson(["number" => "hello", "error" => "not a number"]);
    }

    /**
     * @return void
     */
    public function testDecomposition()
    {
        $GLOBALS['_SERVER']['QUERY_STRING'] = "number=300";
        $response = $this->get('/primeFactors?number=300');
        $response->assertJson(["number" => 300, "decomposition" => [ 2, 2, 3, 5, 5 ]]);
    }

    /**
     * @return void
     */
    public function testBigNumber()
    {
        $GLOBALS['_SERVER']['QUERY_STRING'] = "number=1000001";
        $response = $this->get('/primeFactors?number=1000001');
        $response->assertJson(["number" => 1000001, "error" => "too big number (>1e6)"]);
    }

    /**
     * @return void
     */
    public function testMultipleNumbers()
    {
        $GLOBALS['_SERVER']['QUERY_STRING'] = "number=300&number=120&number=hello";
        $response = $this->get('/primeFactors?number=300&number=120&number=hello');
        $response->assertJson([["number" => 300,"decomposition" => [ 2, 2, 3, 5, 5 ]],["number" => 120,"decomposition" => [ 2, 2, 2, 3, 5 ]],["number" => "hello","error" => "not a number"]]);
    }
}
