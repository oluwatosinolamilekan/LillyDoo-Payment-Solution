<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Helpers\Helper;
use App\Machine\Firmware\WorkingPrototypeFirmware;
use App\Machine\SnackMachine;
use Tests\BaseTestCase;

class ShowStockTest extends BaseTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_show_incorrect_stock()
    {
        $stocks = [
            ["1", "Mars", "Coke"],
            ["2", "M&M's", "Pepsi"]
        ];
        $snackMachine = (new SnackMachine(new WorkingPrototypeFirmware('2', '2')))->loadMachine();
        $this->assertNotEquals($stocks, $snackMachine);
    }
}