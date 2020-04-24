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
                'price'      => '1.20',
                'offer'      => true,
                'offerRules' => '3 for 1.20'
            ],
            'Grapes' => [
                'price'      => '2.0',
                'offer'      => false,
                'offerRules' => '4 for 3.00'
            ],
            'Bananas' => [
                'price'      => '1.0',
                'offer'      => false,
                'offerRules' => '2 for 1.00'
        ]];

        Foreach ($items as $itemName => $itemProperties) {
            $item = new Item();
            $item->setName($itemName);
            $item->setPrice($itemProperties['price']);

            $offer = new Offer();
            $offer->setName($itemProperties['offerRules']);
            $item->setOffer($offer);

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
        $offer = new Offer();

        $items = 'Grapes';
        $item = new Item();
        $item->setName($items);
        $offer->setName('2 for 3.50');
        $item->setOffer($offer);
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

        $offer = new Offer();
        $item->setOffer($offer);

        self::assertInstanceOf(Offer::class, $item->getOffer());
    }

    /** @test */
    public function setOfferRule()
    {
        $offer = new Offer();

        $offer->setName('2 for 0.45');
        $offer->setAffectedItem('Pear');

        self::assertEquals('Pear', $offer->getAffectedItem());
        self::assertEquals('2 for 0.45', $offer->getName());
    }

    /** @test */
    public function checkOfferExistsOnBasketAndIsApplied()
    {
        $itemPeaches = new Item();
        $itemPeaches->setName('Peaches');
        $itemPeaches->setPrice(1.10);

        $offer = new Offer();
        $offer->setName('2 for 1.50');
        $offer->getAffectedItem('Peaches');
        $offer->setOfferQuantity(2);
        $offer->setOfferPrice(1.5);
        $itemPeaches->setOffer($offer);

        $itemOrange = new Item();
        $itemOrange->setName('Oranges');
        $itemOrange->setPrice(1.0);
        $itemOrange->setOfferExists(false);

        $basket = new Basket();
        // 3.20
        $basket->addItem($itemPeaches);
        $basket->addItem($itemPeaches);
        $basket->addItem($itemOrange);

        // with offer = 2.50

        self::assertTrue($basket->offersExisting());
        self::assertEquals(2.5, $basket->getTotal());
    }

    /** @test */
    public function checkOfferApplyFails()
    {
        $item = new Item();
        $item->setName('Peaches');
        $item->setPrice(1.10);

        $offer = new Offer();
        $offer->setName('2 for 2.00');
        $offer->getAffectedItem('Peaches');
        $item->setOffer($offer);

        $basket = new Basket();
        $basket->addItem($item);

        self::assertTrue($basket->offersExisting());
        self::assertFalse($basket->applyOfferTypeQuantity($item, $basket->getQuantity($item)));
    }

    /** @test */
    public function checkOfferCanGetPrice()
    {
        $offer = new Offer();
        $offer->setName('2 for 2.00');
        $offer->getAffectedItem('Peaches');
        $offer->setOfferPrice(2);

        self::assertEquals(2, $offer->getOfferPrice());
    }

    /** @test */
    public function checkOfferTypeQuantity()
    {
        $offer = new Offer();
        $offer->setName('2 for 2.00');
        $offer->getAffectedItem('Peaches');
        $offer->setOfferPrice(2);
        $offer->setOfferQuantity(2);

        self::assertEquals(2, $offer->getOfferQuantity());
    }

    /** @test */
    public function checkQuantityOfItem()
    {
        $itemPeaches = new Item();
        $itemPeaches->setName('Peaches');
        $itemPeaches->setPrice(1.10);
        $itemPeaches->setOfferExists(false);

        $itemOrange = new Item();
        $itemOrange->setName('Oranges');
        $itemOrange->setPrice(1.0);
        $itemOrange->setOfferExists(false);

        $basket = new Basket();
        $basket->addItem($itemPeaches);
        $basket->addItem($itemPeaches);
        $basket->addItem($itemPeaches);
        $basket->addItem($itemOrange);

        self::assertEquals(3, $basket->getQuantity($itemPeaches));
    }

    /** @test */
    public function applyOffer2For45()
    {
        $itemPeaches = new Item();
        $itemPeaches->setName('Peaches');
        $itemPeaches->setPrice(30);
        $itemPeaches->setOfferExists(false);

        $basket = new Basket();
        $basket->addItem($itemPeaches);
        $basket->addItem($itemPeaches);

        self::assertEquals(45, $basket->getTotal());
    }

}
