<?php declare(strict_types=1);

namespace App\Tests;

use App\ErrorException;
use App\Fizzbuzz;
use PHPUnit\Framework\TestCase;

class FizzbuzzTest extends TestCase
{
    public function testClassExists()
    {
        $fizzbuzz = new Fizzbuzz();
        self::assertInstanceOf(Fizzbuzz::class, $fizzbuzz);
    }

    public function testInputIsInteger()
    {
        $fizzbuzz = new Fizzbuzz();
            $this->expectException(ErrorException::class);
            $this->expectExceptionMessage('Input was not integer.');
            $fizzbuzz->run('test');

    }

    public function testReturnsFizzfor3()
    {
        $fizzbuzz = new Fizzbuzz();
        $this->assertEquals(
            'Fizz',
            $fizzbuzz->run(3),
            "3 did not equal Fizz"
        );
    }
}
