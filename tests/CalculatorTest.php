<?php

use PHPUnit\Framework\TestCase;
use App\Calculator;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();
        $result = $calculator->add(2, 3);
        $this->assertEquals(5, $result);
    }

    public function testSub()
    {
        $calculator = new Calculator();
        $result = $calculator->sub(3, 2);
        $this->assertEquals(1, $result);
    }
}

