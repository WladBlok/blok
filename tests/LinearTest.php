<?php


use blok\BlokException;
use blok\Linear;

class LinearTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider providerLine_equation
     */

    public function testLine_equation($b, $c, $x)
    {
        $o = new Linear();
        $this->assertEquals($x, $o->Line_equation($b, $c));
    }


    public function providerLine_equation()
    {
        return array(
            array(5, -4, 0.8),
            array(1, 3, -3)
        );
    }


    public function TestBlokException()
    {
        $o = new Linear();

        $o->line_equation(0, 0);

        $this->expectException(BlokException::class);
        //this->fail('Not raise an exception');
    }




}