<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Checkout\Basket;

class checkoutTest extends TestCase
{
    /** @test */
    public function getShoppingBasket() {
        self::assertInstanceOf(Basket::class, new Basket());
    }

    /** @test */
    public function addOneItemBasket() {
        $basket = new Basket();
        $basket->setItem('Apples');
        self::assertEquals('Apples', $basket->getItem());
    }

    /** @test */
    public function addTwoItemsBasket() {
        $basket = new Basket();
        $basket->setItem('Apples');
        $basket->setItem('Grapes');
        self::assertEquals(['Apples','Grapes'], $basket->getItems());
    }
}
