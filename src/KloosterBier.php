<?php

namespace App;

class KloosterBier extends KlosterkeItem
{
    public function tick()
    {
        $qualityModifier = ($this->daysBeforeExpiration <= 0) ? 4 : 2;

        $this->setDaysBeforeExpiration($this->daysBeforeExpiration - 1);
        $this->setQuality($this->quality - $qualityModifier);
    }
}