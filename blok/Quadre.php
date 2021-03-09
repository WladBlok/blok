<?php


namespace blok;
use BlokException;
use core\EquationInterface;
use Exception;
class Quadre extends Linear implements EquationInterface{
    protected $d;
    protected $k;


    public function solve($a, $b, $c):array
    {
        if ($a == 0) {

            return $this->x = array($this->line_equation($b, $c));
        }
        $d = pow($b, 2) - 4 * $a * $c;

        if ($d < 0) {
            throw new BlokException("D<0");
        }
        if ($d == 0) {
            $x = (-$b) / (2 * $a);
            return $this->x = array($x);

        }
        $x = -$b + sqrt($d) / (2 * $a);
        $k = -$b - sqrt($d) / (2 * $a);
        return $this->x = array($x,$k);
    }


}
