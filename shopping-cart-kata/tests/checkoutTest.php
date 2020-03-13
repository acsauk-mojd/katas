<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Checkout\Basket;
use Checkout\Item;

class checkoutTest extends TestCase
{
    /** @test */
    public function getShoppingBasket() {
        self::assertInstanceOf(Basket::class, new Basket());
    }

    /** @test */
    public function addTwoItemsBasket() {
        $basket = new Basket();
        $items = 'Apples';

        $item = new Item();
        $item->setName($items);
        $basket->addItem($item);

        self::assertEquals($items, $item->getName());

    }
}
