<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FizzbuzzTest extends TestCase
{
    public function testProgramCanBePassed1AndReturns1()
    {
        $sut = new Fizzbuzz();
        self::assertEquals('1', $sut->fizzbuzzer('1'));
    }

    public function testProgramCanBePassed2AndReturns2()
    {
        $sut = new Fizzbuzz();
        self::assertEquals('2', $sut->fizzbuzzer('2'));
    }

    public function testProgramCanBePReturnsFizz()
    {
        $sut = new Fizzbuzz();
        self::assertEquals('Fizz', $sut->fizz('Fizz'));
    }
}
