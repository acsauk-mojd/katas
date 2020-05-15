<?php

declare(strict_types=1);

namespace Checkout;

use phpDocumentor\Reflection\Types\Boolean;

class Item {

    private $name;
    private $price;

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
}