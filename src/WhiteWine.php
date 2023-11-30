<?php

namespace App;

class WhiteWine extends KlosterkeItem
{
    public function tick()
    {
        $qualityModifier = 1;
        switch (true) {
            case ($this->daysBeforeExpiration <= 0):
                $this->setDaysBeforeExpiration($this->daysBeforeExpiration - 1);
                $this->setQuality(0);
                return;
            break;
            case ($this->daysBeforeExpiration <= 5):
                $qualityModifier = 3;
                break;
            case ($this->daysBeforeExpiration <= 10):
                $qualityModifier = 2;
            break;
        }

        $this->setDaysBeforeExpiration($this->daysBeforeExpiration - 1);
        $this->setQuality($this->quality + $qualityModifier);
    }
}