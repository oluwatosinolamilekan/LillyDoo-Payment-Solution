<?php

namespace Tests;

use App\Machine\Firmware\WorkingPrototypeFirmware;
use App\Machine\Purchase\Transaction;
use App\Machine\SnackMachine;
use Exception;
use PHPUnit\Framework\TestCase;

abstract class BaseTestCase extends TestCase
{
    /**
     * @throws Exception
     */
    protected function execute($amount, $quantity): array|string
    {
        $prototype = (new WorkingPrototypeFirmware('', '', $amount, $quantity));
        $transaction = (new Transaction());
        return (new SnackMachine($prototype))->execute($transaction);
    }

    protected function loadMachine($row,$column): array
    {
        return (new SnackMachine(new WorkingPrototypeFirmware($row, $column)))->loadMachine();
    }
}