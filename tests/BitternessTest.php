<?php


namespace BeerMath\Test;


use BeerMath\Bitterness;

class BitternessTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var Bitterness
     */
    private $bitterness;

    protected function setUp()
    {
        $this->bitterness = new Bitterness();
    }


    /**
     * @covers \BeerMath\Bitterness::tinseth
     */
    public function testTinseth()
    {
        $this->assertEquals(40, (int) $this->bitterness->tinseth(5.5, 60, 19, 1.050, 60));
    }
}
