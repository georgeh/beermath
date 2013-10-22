<?php


namespace BeerMath\Value;


class DensityTest extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider gravityToPlatoValues
     * @param $gravity
     * @param $plato
     */
    public function testFromGravity($gravity, $plato)
    {
        $density = Density::FromGravity($gravity);
        $this->assertEquals($plato, $density->plato(), '', 0.1);
        $this->assertEquals($gravity, $density->gravity(), '', 0.001);
    }

    /**
     * @dataProvider platoToGravityValues
     * @param $gravity
     * @param $plato
     */
    public function testFromPlato($gravity, $plato)
    {
        // It turns out Density is non-reversable from plato -> gravity
        // http://math.stackexchange.com/questions/440314/inverse-formula-for-sgspecific-gravity-to-plato
        $density = Density::FromPlato($plato);
        $this->assertEquals($gravity, $density->gravity(), '', 0.001);
    }

    public function gravityToPlatoValues()
    {
        return array(
            // [gravity, plato]
            array(1.048, 11.9), // 0
            array(1.000, 0.0),   // 1
            array(1.004, 1.0),  // 2
            array(1.056, 13.8), // 3
            array(1.100, 23.8), // 4
        );
    }

    public function platoToGravityValues()
    {
        return array(
            // [gravity, plato]
            array(1.048, 12.0),  // 0
            array(1.000, 0.0),   // 1
            array(1.004, 1.0),   // 2
            array(1.056, 13.76), // 3
            array(1.100, 23.75), // 4
        );
    }
}
