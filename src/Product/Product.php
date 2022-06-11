<?php

namespace App\Product;

#. created by me..
class Product implements ProductInterface
{
    public function getName(): string
    {
        return 'Test';
    }

    public function getPrice(): float
    {
        return 10.00;
    }
}