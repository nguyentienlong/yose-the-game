<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testFirstPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Hello Yose');
        });
    }
    public function testFirstWebService()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/ping')
                ->waitforText('{"alive":true}');
        });
    }
}
