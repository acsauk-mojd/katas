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

    public function applyOffer($offerQuantity, $itemQuantity)
    {
        if ($offerQuantity === $itemQuantity) {
            return $offerQuantity;
        }

        return false;
    }

}