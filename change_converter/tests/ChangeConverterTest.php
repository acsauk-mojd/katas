<?php declare(strict_types=1);

namespace App\Tests;

use App\ChangeConverter;
use PHPUnit\Framework\TestCase;

class ChangeConverterTest extends TestCase
{
    public function testItsChangeConverterClass()
    {
        $test = new ChangeConverter();
        $this->assertInstanceOf(ChangeConverter::class, $test);
    }

    public function testRaisesExceptionIfInputNotFloat()
    {
        $test = new ChangeConverter();
            $this->expectExceptionMessage('Input was not a float.');
            $test->convert('string');
    }
}