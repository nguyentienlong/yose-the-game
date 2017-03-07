<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PrimeFactorTest extends DuskTestCase
{
    /**
     * @return void
     */
    public function testNumber()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/primeFactors?number=16')

                ->assertSee('{"number" : 16, "decomposition" : [ 2, 2, 2, 2 ]}');
        });
    }

    /**
     * @return void
     */
    public function testNotNumber()
    {
        $this->browse(function ($browser) {
            $browser->visit('/primeFactors?number=hello')
                ->assertSee('{"number" : "hello", "error" : "not a number"}');
        });
    }

    /**
     * @return void
     */
    public function testDecomposition()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/primeFactors?number=300')
                ->assertSee('{"number" : 16, "decomposition" : [ 2, 2, 3, 5, 5 ]}');
        });
    }

    /**
     * @return void
     */
    public function testBigNumber()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/primeFactors?number=1000001')
                ->assertSee('{"number" : 16, "error" : "too big number (>1e6)"}');
        });
    }

    /**
     * @return void
     */
    public function testMultipleNumbers()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/primeFactors?number=300&number=120&number=hello')
                ->assertSee('[{"number" : 300,"decomposition" : [ 2, 2, 3, 5, 5 ]},{"number" : 120,"decomposition" : [ 2, 2, 2, 3, 5 ]},{"number" : "hello","error" : "not a number"},]
');
        });
    }
}
