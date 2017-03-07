<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StartTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFirstPage()
    {
        $response = $this->get('/');
        $response->assertSee('Hello Yose');
    }

    public function testFirstWebService()
    {
        $response = $this->get('/ping');
        $response->assertJson(['alive'=>true]);
    }

    public function testShare()
    {
        $response = $this->get('/share');
        $response->assertSee('YoseTheGame');
    }
}
