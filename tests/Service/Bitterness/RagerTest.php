<?php


namespace BeerMath\Service\Bitterness;


use BeerMath\Value\Density;
use BeerMath\Value\Volume;
use BeerMath\Value\Weight;

class RagerTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Rager
     */
    private $rager;

    public function setUp()
    {
        $this->rager = new Rager();
    }

    public function testRager()
    {
        $this->assertEquals(50.8, $this->rager->rager(5.5,
            Weight::FromOunces(2.0), Volume::FromGallons(5.0),
            Density::FromGravity(1.050), \DateInterval::createFromDateString('60 minutes')),
            '', 0.1
        );
    }

}
 