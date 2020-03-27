<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Checkout\Basket;
use Checkout\Item;
use Checkout\Offer;

class checkoutTest extends TestCase
{
    //TODO: Not checking for duplicate items
    private function setUpItems()
    {
        $basket = new Basket();
        $items = [
            'Apples' => [
                'price' => '1.20',
                'offer' => true
            ],
            'Grapes' => [
                'price' => '2.0',
                'offer' => false
            ],
            'Bananas' => [
                'price' => '1.0',
                'offer' => false
        ]];

        Foreach ($items as $itemName => $itemProperties) {
            $item = new Item();
            $item->setName($itemName);
            $item->setPrice($itemProperties['price']);
            $item->setOfferExists($itemProperties['offer']);

            $basket->addItem($item);
        }

        return $basket;
    }

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
    public function threeItemsBasket()
    {
        $basket = $this->setUpItems();

        self::assertCount(3, $basket->getItems());
        self::assertEquals('4.20', $basket->getTotal());
    }

    /** @test */
    public function checkForSpecialOffer()
    {
        $basket = $this->setUpItems();
        $offerExists = $basket->offersExisting();

        self::assertTrue($offerExists);
    }

    /** @test */
    public function getOfferCLass()
    {
        self::assertInstanceOf(Offer::class, new Offer());
    }

    /** @test */
    public function getOfferOnItem()
    {
        $items = 'Pears';
        $item = new Item();
        $item->setName($items);
        $item->setOffer('2 for 0.45');

        self::assertEquals('2 for 0.45', $item->getOffer());
    }

    /** @test */
    public function setOfferRule()
    {
        $offer = new Offer();

        $offer->setName('2 for 0.45');
        $offer->setAffectedItem('Pear');

        self::assertEquals('Pear', $offer->getAffectedItem());
    }
}
