<?php

namespace Tests\Browser;

use Tests\TestCase;

class PortfolioTest extends TestCase
{
    /**
     * @return void
     */
    public function testPing()
    {
        $response = $this->get('/ping');
        $response->assertJson(["alive" => true]);
    }
}
