<?php



namespace BeerMath\Value;


class ColorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider values
     */
    public function testFromEBC($srm, $ebc, $lovibond)
    {
        $color = Color::FromEBC($ebc);
        $this->assertEquals($srm, $color->srm(), '', 0.01);
        $this->assertEquals($ebc, $color->ebc(), '', 0.01);
        $this->assertEquals($lovibond, $color->lovibond(), '', 0.01);
    }

    /**
     * @dataProvider values
     */
    public function testFromLovibond($srm, $ebc, $lovibond)
    {
        $color = Color::FromLovibond($lovibond);
        $this->assertEquals($srm, $color->srm(), '', 0.01);
        $this->assertEquals($ebc, $color->ebc(), '', 0.01);
        $this->assertEquals($lovibond, $color->lovibond(), '', 0.01);
    }

    /**
     * @dataProvider values
     */
    public function testFromSRM($srm, $ebc, $lovibond)
    {
        $color = Color::FromSRM($srm);
        $this->assertEquals($srm, $color->srm(), '', 0.01);
        $this->assertEquals($ebc, $color->ebc(), '', 0.01);
        $this->assertEquals($lovibond, $color->lovibond(), '', 0.01);
    }

    public function values()
    {
        return array(
            //   [srm    ebc    lovibond]
            array(40.0,  78.8,  30.074),
            array(5.0,   9.85,  4.148),
            array(60.91,  120,  45.5629629)
        );

    }

}