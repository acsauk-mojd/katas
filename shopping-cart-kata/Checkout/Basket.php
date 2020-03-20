<?php

declare(strict_types=1);

namespace Checkout;

class Basket
{

    private $items;

    public function addItem($items)
    {
        $this->items[] = $items;

        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }


}