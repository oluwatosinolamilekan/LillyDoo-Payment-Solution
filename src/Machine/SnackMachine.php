<?php

declare(strict_types=1);

namespace App\Machine;

use App\Machine\Firmware\FirmwareInterface;
use App\Machine\Purchase\TransactionInterface as PurchaseTransactionInterface;

class SnackMachine implements MachineInterface
{
    public function __construct(
        protected FirmwareInterface $firmware
    )
    {}

    public function loadMachine()
    {
        return $this->firmware->getSlots();
    }

    public function execute(PurchaseTransactionInterface $purchaseTransaction)
    {
        // TODO
    }
}
