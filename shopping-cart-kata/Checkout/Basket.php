<?php

declare(strict_types=1);

namespace Checkout;

class Basket
{
    private $items;
    private $total = 0;
    private $offersExist = false;
    private $offers;

    public function addItem($item)
    {
        $this->items[] = $item;
        $this->total += $item->getPrice();

        if (!empty($this->offers)) {
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
        return $this->offersExist;
    }

    public function applyOfferTypeQuantity(Item $item, int $quantity)
    {
        foreach ($this->offers as $offer) {
            if ($item->getName() === $offer->getAffectedItem()) {
                if ($quantity === $offer->getOfferTypeQuantity()) {

                    // subtract the cost of the item's original price and quantity for the offer
                    $this->total -= ($item->getPrice() * $quantity);

                    // add the cost for the offer
                    $this->total += $offer->getOfferPrice();

                    return $this->total;
                }
            }
        }

        return false;

    }

    public function getQuantity(Item $item)
    {
        $objectToStr = array_map(function ($object) { return $object->getName(); }, $this->items);

        $itemAmounts = array_count_values($objectToStr);

        return $itemAmounts[$item->getName()];
    }

    public function setOffers(array $offers)
    {
        $this->offers = $offers;
    }

    public function getOffers()
    {
        return $this->offers;
    }

}