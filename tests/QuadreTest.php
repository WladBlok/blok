<?php


use blok\Quadre;
class QuadreTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider providerSolve
     */

    public function testSolve($a, $b, $c,$x,$k)
    {
        $o = new Quadre();
        $this->assertEquals(array($x,$k), $o->Solve($a, $b, $c));
    }


    public function providerSolve()
    {
        return array(
            array(2, -5, 3, 5.25, 4.75),
            array(1, 4, 3,-3,-5)
        );
    }


}
