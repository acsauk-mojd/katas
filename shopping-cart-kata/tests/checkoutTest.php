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
    public function addOneItemBasket() {
        $basket = new Basket();

        $items = 'Grapes';
        $item = new Item();
        $item->setName($items);
        $basket->addItem($item);

        self::assertEquals($items, $item->getName());
    }

    /** @test */
    public function twoItemsBasket() {
        $basket = new Basket();

        $items = ['Apples', 'Grapes'];

        Foreach ($items as $itemName) {
            $item = new Item();
            $item->setName($itemName);
            $basket->addItem($item);
        }

        self::assertCount(2, $basket->getItems());
    }
}
