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
                'price'      => '1.20'
            ],
            'Grapes' => [
                'price'      => '2.0'
            ],
            'Bananas' => [
                'price'      => '1.0'
        ]];

        Foreach ($items as $itemName => $itemProperties) {
            $item = new Item();
            $item->setName($itemName);
            $item->setPrice($itemProperties['price']);

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

        $item = new Item();
        $item->setName('Grapes');
        $basket->addItem($item);

        self::assertEquals('Grapes', $item->getName());
    }

    /** @test */
    public function threeItemsBasket()
    {
        $basket = $this->setUpItems();

        self::assertCount(3, $basket->getItems());
        self::assertEquals('4.20', $basket->getTotal());
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
        $offer->setOfferTypeQuantity(2);

        self::assertEquals(2, $offer->getOfferTypeQuantity());
    }

    /** @test */
    public function checkQuantityOfItem()
    {
        $itemPeaches = new Item();
        $itemPeaches->setName('Peaches');
        $itemPeaches->setPrice(1.10);

        $itemOrange = new Item();
        $itemOrange->setName('Oranges');
        $itemOrange->setPrice(1.0);

        $basket = new Basket();
        $basket->addItem($itemPeaches);
        $basket->addItem($itemPeaches);
        $basket->addItem($itemPeaches);
        $basket->addItem($itemOrange);

        self::assertEquals(3, $basket->getQuantity($itemPeaches));
        self::assertEquals(1, $basket->getQuantity($itemOrange));
    }

    /** @test */
    public function applyOfferThreeItems()
    {
        $itemPeaches = new Item();
        $itemPeaches->setName('Peaches');
        $itemPeaches->setPrice(30);

        $offer = new Offer();
        $offer->setName('2 for 45');
        $offer->setOfferPrice(45);
        $offer->setOfferTypeQuantity(2);
        $offer->setAffectedItem('Peaches');

        $basket = new Basket();
        $basket->setOffers([$offer]);

        $basket->addItem($itemPeaches);
        $basket->addItem($itemPeaches);
        $basket->addItem($itemPeaches);

        self::assertEquals(75, $basket->getTotal());
    }

    /** @test */
    public function applyOfferRandomItems()
    {
        $itemPeaches = new Item();
        $itemPeaches->setName('Peaches');
        $itemPeaches->setPrice(30);

        $offer = new Offer();
        $offer->setName('2 for 45');
        $offer->setOfferPrice(45);
        $offer->setOfferTypeQuantity(2);
        $offer->setAffectedItem('Peaches');

        $itemOrange = new Item();
        $itemOrange->setName('Oranges');
        $itemOrange->setPrice(15);

        $basket = new Basket();
        $basket->setOffers([$offer]);

        $basket->addItem($itemPeaches);
        $basket->addItem($itemPeaches);
        $basket->addItem($itemOrange);

        self::assertEquals(60, $basket->getTotal());
    }

    /** @test */
    public function applyTwoOffers()
    {
        $itemPeaches = new Item();
        $itemPeaches->setName('Peaches');
        $itemPeaches->setPrice(30);

        $peachOffer = new Offer();
        $peachOffer->setName('2 for 45');
        $peachOffer->setOfferPrice(45);
        $peachOffer->setOfferTypeQuantity(2);
        $peachOffer->setAffectedItem('Peaches');

        $itemOrange = new Item();
        $itemOrange->setName('Oranges');
        $itemOrange->setPrice(75);

        $orangeOffer = new Offer();
        $orangeOffer->setName('3 for 130');
        $orangeOffer->setOfferPrice(130);
        $orangeOffer->setOfferTypeQuantity(3);
        $orangeOffer->setAffectedItem('Oranges');

        $basket = new Basket();
        $basket->setOffers([$peachOffer, $orangeOffer]);
        $basket->addItem($itemPeaches);
        $basket->addItem($itemPeaches);
        $basket->addItem($itemOrange);
        $basket->addItem($itemOrange);
        $basket->addItem($itemOrange);

        self::assertEquals(175, $basket->getTotal());
    }

    /** @test */
    public function canApplyMultipleOffersToBasket()
    {
        $basket = new Basket();

        $offer1 = new Offer();
        $offer1->setName('3 for 130');
        $offer1->setOfferPrice(130);
        $offer1->setOfferTypeQuantity(3);

        $offer2 = new Offer();
        $offer2->setName('2 for 75');
        $offer2->setOfferPrice(75);
        $offer2->setOfferTypeQuantity(2);

        $offers = [$offer1, $offer2];
        $basket->setOffers($offers);

        self::assertEquals($basket->getOffers(), $offers);
    }

    /** @test */
    public function offersAreAppliedOnBasketCorrectly()
    {
        $basket = new Basket();

        $lemons = new Item();
        $lemons->setName('Lemons');
        $lemons->setPrice(0.80);

        $limes = new Item();
        $limes->setName('Limes');
        $limes->setPrice(0.9);

        $offer1 = new Offer();
        $offer1->setName('2 for 1.20');
        $offer1->setOfferPrice(1.20);
        $offer1->setOfferTypeQuantity(2);
        $offer1->setAffectedItem('Lemons');

        $offers = [$offer1];
        $basket->setOffers($offers);

        $basket->addItem($lemons);
        $basket->addItem($lemons);
        $basket->addItem($limes);

        self::assertEquals(2.10, $basket->getTotal());
    }
}
