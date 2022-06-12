<?php

declare(strict_types=1);

namespace App\Machine;

use App\Helpers\ConvertChangeToCoins;
use App\Machine\Firmware\FirmwareInterface;
use App\Machine\Purchase\TransactionInterface as PurchaseTransactionInterface;
use Exception;

class SnackMachine implements MachineInterface
{
    public function __construct(
        protected FirmwareInterface $firmware
    ){}

    public function loadMachine()
    {
        return $this->firmware->getSlots();
    }

    /**
     * @throws Exception
     */
    public function execute(PurchaseTransactionInterface $purchaseTransaction)
    {
        $amountPaid = (string) $purchaseTransaction->getPaidAmount();
        $amount = $this->firmware->transactionsDetails()['amount'];
        $quantity = $this->firmware->transactionsDetails()['quantity'];
        $totalAmount = $amountPaid * $quantity;
        if ($totalAmount > $amount) throw new Exception("total Amount is {$totalAmount} and you have {$amount}");
        $change = (float) $amount - $totalAmount;
        $coins = (new ConvertChangeToCoins())->action($change);
        return [
            'coins' => $coins,
            'change' => $change,
            'amount' => $amount,
            'quantity' => $quantity,
            'totalAmount' => $totalAmount
        ];

    }

}
