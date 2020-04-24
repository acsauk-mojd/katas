<?php

declare(strict_types=1);

namespace Checkout;

class Basket
{
    private $items;
    private $total = 0;
    private $offers = false;

    public function addItem($item)
    {
        $this->items[] = $item;
        $this->total += $item->getPrice();

        if ($item->getOfferExists()) {
            $this->offers = $item->getOfferExists();

            $this->applyOfferTypeQuantity($item, $this->getQuantity($item));
        }

        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function offersExisting()
    {
        return $this->offers;
    }

    public function applyOfferTypeQuantity(Item $item, int $quantity)
    {
        if ($item->getOffer()->getOfferTypeQuantity() === $quantity) {

            // subtract the cost of the item's original price and quantity for the offer
            $this->total -= ($item->getPrice() * $quantity);

            // add the cost for the offer
            $this->total += $item->getOffer()->getOfferPrice();
            return $this->total;
        }

        return false;
    }

    public function getQuantity(Item $item)
    {
        $objectToStr = array_map(function ($object) { return $object->getName(); }, $this->items);

        $itemAmounts = array_count_values($objectToStr);

        return $itemAmounts[$item->getName()];
    }

}