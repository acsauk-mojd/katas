<?php

use PHPUnit\Framework\TestCase;
use Checkout\Basket;

class checkoutTest extends TestCase
{
    /** @test */
    public function getShoppingBasket() {
        self::assertInstanceOf(Basket::class, new Basket());
    }
}
