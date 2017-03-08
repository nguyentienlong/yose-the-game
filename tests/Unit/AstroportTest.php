<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AstroportTest extends TestCase
{
    public function testAstroportName()
    {
        $response = $this->get('/astroport');
        $element = $this->findElementById($response, 'astroport-name');
        $this->assertNotNull($element);
    }

    public function testAstroportGates()
    {
        $response = $this->get('/astroport');
        $gate1 = $this->findElementById($response, 'gate-1');
        $gate2 = $this->findElementById($response, 'gate-2');
        $gate3 = $this->findElementById($response, 'gate-3');
        $this->assertNotNull($gate1);
        $this->assertNotNull($gate2);
        $this->assertNotNull($gate3);

        $this->assertEquals('ship-1', $gate1->getElementsByTagName('div')->item(0)->getAttribute('id'));
        $this->assertEquals('ship-2', $gate2->getElementsByTagName('div')->item(0)->getAttribute('id'));
        $this->assertEquals('ship-3', $gate3->getElementsByTagName('div')->item(0)->getAttribute('id'));
    }

    private function findElementById($response, $id)
    {
        $html = $response->getContent();
        $dom = new \DOMDocument;
        $dom->loadHTML($html);

        $element = $dom->getElementById($id);
        return $element;
    }
}
