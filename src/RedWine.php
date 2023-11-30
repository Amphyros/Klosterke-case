<?php

namespace App;

class RedWine extends KlosterkeItem
{
    public function tick()
    {
        $qualityModifier = ($this->daysBeforeExpiration <= 0) ? 2 : 1;

        $this->setDaysBeforeExpiration($this->daysBeforeExpiration - 1);
        $this->setQuality($this->quality + $qualityModifier);
    }
}