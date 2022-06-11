<?php

namespace App\Machine\Purchase;

class Transaction implements TransactionInterface
{
    public function getPaidAmount(): float
    {
        return 10.00;
    }
}