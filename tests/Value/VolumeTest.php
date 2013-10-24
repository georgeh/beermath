<?php


namespace BeerMath\Value;


class VolumeTest extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider values
     */
    public function testFromLiters($liters, $ml, $gallons, $ounces)
    {
        $volume = Volume::FromLiters($liters);
        $this->assertEquals($ml, $volume->milliliters(), '', 0.01);
        $this->assertEquals($gallons, $volume->gallons(), '', 0.01);
        $this->assertEquals($ounces, $volume->ounces(), '', 0.01);
    }

    /**
     * @dataProvider values
     */
    public function testFromMilliliters($liters, $ml, $gallons, $ounces)
    {
        $volume = Volume::FromMilliliters($ml);
        $this->assertEquals($liters, $volume->liters(), '', 0.01);
        $this->assertEquals($gallons, $volume->gallons(), '', 0.01);
        $this->assertEquals($ounces, $volume->ounces(), '', 0.01);
    }
    /**
     * @dataProvider values
     */
    public function testFromGallons($liters, $ml, $gallons, $ounces)
    {
        $volume = Volume::FromGallons($gallons);
        $this->assertEquals($ml, $volume->milliliters(), '', 0.01);
        $this->assertEquals($liters, $volume->liters(), '', 0.01);
        $this->assertEquals($ounces, $volume->ounces(), '', 0.01);
    }
    /**
     * @dataProvider values
     */
    public function testFromOunces($liters, $ml, $gallons, $ounces)
    {
        $volume = Volume::FromOunces($ounces);
        $this->assertEquals($ml, $volume->milliliters(), '', 0.01);
        $this->assertEquals($liters, $volume->liters(), '', 0.01);
        $this->assertEquals($gallons, $volume->gallons(), '', 0.01);
    }

    public function values()
    {
        return array(
            //   [liters     ml       gallons      ounces]
            array(1.0,       1000.0,  0.264172,    33.814),
            array(0.001,     1.0,     0.000264172, 0.033814),
            array(3.78541,   3785.41, 1.0,         128.0),
            array(0.0295735, 29.5735, 0.0078125,   1.0),
        );

    }
}
 