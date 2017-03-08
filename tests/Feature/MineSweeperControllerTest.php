<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MineSweeperControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoadMatrix()
    {
        $res = $this->get('/minesweeper/load');

        $res->assertStatus(200);

        $this->assertEquals(count($res->getData()), 8);
    }
}
