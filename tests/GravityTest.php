<?php

namespace BeerMath\Test;

class GravityTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var \BeerMath\Gravity
     */
    private $gravity;

    protected function setUp()
    {
        $this->gravity = new \BeerMath\Gravity();
    }


    public function testGravityToPlato()
    {
        $this->assertEquals(14.9, round($this->gravity->convertGravityToPlato(1.061), 1));
        $this->assertEquals(0, $this->gravity->convertGravityToPlato(1.000));
    }

    public function testPlatoToGravity()
    {
        $this->assertEquals(1.061, round($this->gravity->convertPlatoToGravity(14.9), 3));
        $this->assertEquals(1.000, round($this->gravity->convertPlatoToGravity(0), 3));
    }
}
