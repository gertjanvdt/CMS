<?php

namespace models;

class ShipSelect
{
    public $shipId;
    public $shipRegion;
    public $shipCosts;

    public function __construct($shipId, $shipRegion, $shipCosts)
    {
        $this->shipId = $shipId;
        $this->shipRegion = $shipRegion;
        $this->shipCosts = $shipCosts;
    }
}
