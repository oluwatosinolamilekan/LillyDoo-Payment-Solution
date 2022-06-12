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
    protected function loadMachine($amount, $quantity): array|string
    {
        $prototype = (new WorkingPrototypeFirmware('', '', $amount, $quantity));
        $transaction = (new Transaction());
        return (new SnackMachine($prototype))->execute($transaction);
    }
}