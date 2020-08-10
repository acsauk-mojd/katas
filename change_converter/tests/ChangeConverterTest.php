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

    public function testOutputIsArray()
    {
        $test = new ChangeConverter();
            $results = $test->convert(5.0);
            $this->assertIsArray($results);
    }

    public function testValueReturnedEqualsInputValue()
    {
        $test = new ChangeConverter();
        $this->assertEquals(["£20", "£10", "£5", "£1", "£1"], $test->convert(37.00));
    }

    public function testAllDemoninationsWork()
    {
        $test = new ChangeConverter();
        $this->assertEquals(["£20", "£10", "£5", "£1", "50p", "20p", "10p", "5p", "2p", "1p"], $test->convert(36.88));
    }

}