<?php


namespace BeerMath\Value;


class TemperatureTest extends \PHPUnit_Framework_TestCase {


    /**
     * @dataProvider values
     */
    public function testFromCelsius($celsius, $fahrenheit)
    {
        $value = Temperature::FromCelsius($celsius);
        $this->assertEquals($celsius, $value->celsius());
        $this->assertEquals($fahrenheit, $value->fahrenheit());

    }

    /**
     * @dataProvider values
     */
    public function testFromFahrenheit($celsius, $fahrenheit)
    {
        $value = Temperature::FromFahrenheit($fahrenheit);
        $this->assertEquals($celsius, $value->celsius());
        $this->assertEquals($fahrenheit, $value->fahrenheit());
    }


    public function values()
    {
        // [celsius, fahrenheit]
        return array(
            array(0.0, 32.0),
            array(100.0, 212.0),
            array(37.0, 98.6),
        );
    }
}
