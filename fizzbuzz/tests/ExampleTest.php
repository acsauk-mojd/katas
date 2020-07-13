<?php declare(strict_types=1);

namespace App\Tests;

use App\ExampleClass;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testItsWorking()
    {
        self::assertTrue(ExampleClass::trueIsTrue());
    }
}
