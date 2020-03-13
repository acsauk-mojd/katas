<?php

declare(strict_types=1);

namespace Checkout;

class Basket
{

    private $item;

    public function getItem()
    {
        return $this->item;
    }

    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }
}