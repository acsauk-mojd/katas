<?php

declare(strict_types=1);

namespace Checkout;

class Item {

    private $name;
    private $price;
    private $offerExists;

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

    public function setOfferExists($offer)
    {
        $this->offerExists = $offer;
    }

    /**
     * @return mixed
     */
    public function getOfferExists()
    {
        return $this->offerExists;
    }
}