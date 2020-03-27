<?php

declare(strict_types=1);

namespace Checkout;

use phpDocumentor\Reflection\Types\Boolean;

class Item {

    private $name;
    private $price;
    private $offerExists;
    private $offer;
    private $quantity;

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

    /**
     * @param bool $offer
     */
    private function setOfferExists(bool $offer)
    {
        $this->offerExists = $offer;
    }

    /**
     * @return bool
     */
    public function getOfferExists() : bool
    {
        return $this->offerExists;
    }

    /**
     * @return Offer
     */
    public function getOffer() : Offer
    {
        return $this->offer;
    }

    /**
     * @param Offer $offer
     */
    public function setOffer(Offer $offer)
    {
        $this->offer = $offer;
        $this->setOfferExists(true);
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }
}