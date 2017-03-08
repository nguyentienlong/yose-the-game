<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FireTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFireFirst()
    {
        $response = $this->get('/fire/geek?width=3&map=...P...WF');
        $response->assertJson([
            'map' => [
                '...',
                'P..',
                '.WF',
            ],
            'moves' => [
                ['dx' => 1,'dy'=>0],
                ['dx' => 0,'dy'=>1],
                ['dx' => 1,'dy'=>0],
            ]
        ]);
    }
}
