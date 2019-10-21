<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FizzbuzzTest extends TestCase
{
    public function testProgramCanBePassed1AndReturns1()
    {
        $sut = new Fizzbuzz();
        self::assertEquals('1', $sut->fizzbuzzer('1'));
    }

    public function testProgramCanBePReturnsFizz()
    {
        $sut = new Fizzbuzz();
        self::assertEquals('Fizz', $sut->fizz('Fizz'));
    }

    public function testIfInputIsANumber()
    {
        $this->expectException('Exception');
        $sut = new Fizzbuzz();
        $sut->fizzbuzzer('Exception');
    }

    public function testProgramGetsRemainderOfNumber()
    {
        $sut = new Fizzbuzz();
        self::assertEquals('1', $sut->fizzRemainder('3','3'));
    }
}
