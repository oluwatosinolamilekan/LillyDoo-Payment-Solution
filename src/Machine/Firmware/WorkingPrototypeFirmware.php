<?php

declare(strict_types=1);

namespace App\Machine\Firmware;

use App\Machine\FirmwareInterface;

class WorkingPrototypeFirmware implements FirmwareInterface
{
    private array $items = [
        'Coke' => 10,
        'Pepsi' => 100,
        'Sun Chips' => 20,
        'Cold Coffee' => 10,
    ];

    public function getSlots()
    {
        $min_number = 2;
        $maxNumber = count($this->items);
        var_dump($min_number, $maxNumber);
        die();
    }
}
