<?php

namespace App\Machine\Purchase;

class Transaction implements TransactionInterface
{
    public function getPaidAmount(): float
    {
        return 2.99;
    }
}