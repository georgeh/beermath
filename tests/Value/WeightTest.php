<?php


namespace BeerMath\Value;


class WeightTest extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider values
     */
    public function testFromGrams($grams, $ounces, $pounds, $kilograms)
    {
        $weight = Weight::FromGrams($grams);
        $this->assertEquals($ounces, $weight->ounces(), '', 0.001);
        $this->assertEquals($pounds, $weight->pounds(), '', 0.001);
        $this->assertEquals($kilograms, $weight->kilograms(), '', 0.001);
    }

    /**
     * @dataProvider values
     */
    public function testFromOunces($grams, $ounces, $pounds, $kilograms)
    {
        $weight = Weight::FromOunces($ounces);
        $this->assertEquals($grams, $weight->grams(), '', 0.001);
        $this->assertEquals($pounds, $weight->pounds(), '', 0.0001);
        $this->assertEquals($kilograms, $weight->kilograms(), '', 0.0001);
    }

    /**
     * @dataProvider values
     */
    public function testFromPounds($grams, $ounces, $pounds, $kilograms)
    {
        $weight = Weight::FromPounds($pounds);
        $this->assertEquals($grams, $weight->grams(), '', 0.01);
        $this->assertEquals($ounces, $weight->ounces(), '', 0.0001);
        $this->assertEquals($kilograms, $weight->kilograms(), '', 0.0001);
    }

    /**
     * @dataProvider values
     */
    public function testFromKilograms($grams, $ounces, $pounds, $kilograms)
    {
        $weight = Weight::FromKilograms($kilograms);
        $this->assertEquals($grams, $weight->grams(), '', 0.0001);
        $this->assertEquals($pounds, $weight->pounds(), '', 0.0001);
        $this->assertEquals($ounces, $weight->ounces(), '', 0.0001);
    }

    /**
     * Values per Google
     *
     * @return array
     */
    public function values()
    {
        return array(
            //   [grams,   ounces,   pounds,     kilograms]
            array(1.0,     0.035274, 0.00220462, 0.001),     // 0
            array(28.3495, 1.0,      0.0625,     0.0283495), // 1
            array(453.592, 16.0,     1.0,        0.453592),  // 2
            array(1000.0,  35.274,   2.20462,    1.0),       // 3
            array(0,       0,        0,          0),         // 4
        );
    }
}
