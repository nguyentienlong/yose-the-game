<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AstroportTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
    public function testShouldHasAstroportName()
    {
        $this->browse(function ($browser) {
            $browser->visit('/astroport')
                    ->assertVisible('#astroport-name');
        });
    }
}
