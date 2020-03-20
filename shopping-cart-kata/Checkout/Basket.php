<?php

declare(strict_types=1);

namespace Checkout;

class Basket
{
    private $items;
    private $total = 0;

    public function addItem($item)
    {
        $this->items[] = $item;
        $this->total += $item->getPrice();

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

}