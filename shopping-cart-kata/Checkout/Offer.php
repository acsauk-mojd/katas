<?php

declare(strict_types=1);

namespace Checkout;

class Offer
{
    private $offer;
    private $affectedItem;
    private $itemPrice;
    private $offerQuantity;

    public function setName(string $offer)
    {
        $this->offer = $offer;
    }

    public function getName()
    {
        return $this->offer;
    }

    public function setAffectedItem(string $affectedItem)
    {
        $this->affectedItem = $affectedItem;
    }

    public function getAffectedItem()
    {
        return $this->affectedItem;
    }

    /**
     * @return mixed
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    /**
     * @param mixed $price
     */
    public function setItemPrice($itemPrice)
    {
        $this->itemPrice = $itemPrice;
    }

    /**
     * @return mixed
     */
    public function getOfferQuantity()
    {
        return $this->offerQuantity;
    }

    /**
     * @param mixed $offerQuantity
     */
    public function setOfferQuantity($offerQuantity)
    {
        $this->offerQuantity = $offerQuantity;
    }

}