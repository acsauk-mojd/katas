<?php

declare(strict_types=1);

namespace Checkout;

class Offer
{
    private $offer;

    private $affectedItem;

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
}