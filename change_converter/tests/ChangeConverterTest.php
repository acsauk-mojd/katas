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

    public function testInput()
    {
        $test = new ChangeConverter();
        $results = $test->convert(0);
        $this->assertIsArray($results);
    }

    public function testInputNotFloat()
    {
        $test = new ChangeConverter();
        $this->expectException(\TypeError::class);
        $results = $test->convert("string");
    }

}