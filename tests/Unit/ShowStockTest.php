<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Machine\Firmware\WorkingPrototypeFirmware;
use App\Machine\SnackMachine;
use PHPUnit\Framework\TestCase;

class ShowStockTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_show_stock()
    {
        $stocks = [
            ["1", "Mars", "Coke"],
            ["2", "M&M's", "Pepsi"]
        ];
        $snackMachine = (new SnackMachine(new WorkingPrototypeFirmware(2, 2)))->loadMachine();
        $this->assertEquals($stocks, $snackMachine);
    }
}