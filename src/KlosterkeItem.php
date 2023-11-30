<?php

namespace App;

class KlosterkeItem
{
    private string $name;

    protected int $quality;

    protected int $daysBeforeExpiration;

    /**
     * @param string $name
     * @param int    $quality
     * @param int    $daysBeforeExpiration
     */
    public function __construct(string $name, int $quality, int $daysBeforeExpiration)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->daysBeforeExpiration = $daysBeforeExpiration;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): KlosterkeItem
    {
        $this->name = $name;

        return $this;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function setQuality(int $quality): KlosterkeItem
    {
        $quality = ($quality < 0) ? 0 : $quality;
        $quality = ($quality > 50) ? 50 : $quality;

        $this->quality = $quality;

        return $this;
    }

    public function getDaysBeforeExpiration(): int
    {
        return $this->daysBeforeExpiration;
    }

    public function setDaysBeforeExpiration(int $daysBeforeExpiration): KlosterkeItem
    {
        $this->daysBeforeExpiration = $daysBeforeExpiration;

        return $this;
    }

    public function tick() // Kahlan 1.0 doesn't seem to like void typehints?
    {
        $qualityModifier = ($this->daysBeforeExpiration <= 0) ? 2 : 1;

        $this->setDaysBeforeExpiration($this->daysBeforeExpiration - 1);
        $this->setQuality($this->quality - $qualityModifier);
    }

}