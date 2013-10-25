<?php


namespace BeerMath\Service\Bitterness;


use BeerMath\Value\Density;
use BeerMath\Value\Volume;
use BeerMath\Value\Weight;

class TinsethTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Tinseth
     */
    private $tinseth;

    protected function setUp()
    {
        $this->tinseth = new Tinseth();
    }

    public function testTinseth()
    {
        $this->assertEquals(34.5, $this->tinseth->tinseth(5.0,
            Weight::FromOunces(2.0),
            Volume::FromGallons(5.0),
            Density::FromGravity(1.050),
            \DateInterval::createFromDateString('60 minutes')),
        '', 0.1);
    }
}
 