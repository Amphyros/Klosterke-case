<?php

namespace App;

class Klosterke
{
    public $naam;

    public $kwaliteit;

    public $verkopenVoor;

    public function __construct($naam, $kwaliteit, $verkopenVoor)
    {
        $this->naam         = $naam;
        $this->kwaliteit    = $kwaliteit;
        $this->verkopenVoor = $verkopenVoor;
    }

    public static function of($naam, $kwaliteit, $verkopenVoor) {
        return new static($naam, $kwaliteit, $verkopenVoor);
    }

    public function tick()
    {
        if ($this->naam !== 'Rode Wijn - Merlot' and $this->naam !== 'Witte Wijn - Chardonnay') {
            if ($this->kwaliteit > 0) {
                if ($this->naam !== 'BBQ - Afkoop drank') {
                    $this->kwaliteit--;
                }
            }
        } else {
            if ($this->kwaliteit < 50) {
                $this->kwaliteit++;

                if ($this->naam === 'Witte Wijn - Chardonnay') {
                    if ($this->verkopenVoor < 11) {
                        if ($this->kwaliteit < 50) {
                            $this->kwaliteit++;
                        }
                    }
                    if ($this->verkopenVoor < 6) {
                        if ($this->kwaliteit < 50) {
                            $this->kwaliteit++;
                        }
                    }
                }
            }
        }

        if ($this->naam !== 'BBQ - Afkoop drank') {
            $this->verkopenVoor--;
        }

        if ($this->verkopenVoor < 0) {
            if ($this->naam !== 'Rode Wijn - Merlot') {
                if ($this->naam !== 'Witte Wijn - Chardonnay') {
                    if ($this->kwaliteit > 0) {
                        if ($this->naam !== 'BBQ - Afkoop drank') {
                            $this->kwaliteit--;
                        }
                    }
                } else {
                    $this->kwaliteit = 0;
                }
            } else {
                if ($this->kwaliteit < 50) {
                    $this->kwaliteit++;
                }
            }
        }
    }
}
