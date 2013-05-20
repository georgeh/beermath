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
        $this->assertEquals(38, $this->bitterness->tinseth(5.5, 56.7, 18.9, 1.056, 60));
    }

    /**
     * @covers \BeerMath\Bitterness::rager
     */
    public function testRager()
    {
        $this->assertEquals(47.8, $this->bitterness->rager(5.5, 56.7, 18.9, 1.056, 60));
    }

    /**
     * @covers \BeerMath\Bitterness::daniels
     */
    public function testDaniels()
    {
        $this->assertEquals(49.2, $this->bitterness->daniels(5.5, 56.7, 18.9, 1.056, 60));
    }
}
