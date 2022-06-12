<?php

namespace Tests\Unit;

use Tests\BaseTestCase;

class PurchaseTest extends BaseTestCase
{
    const Quantity = 2;
    const Amount = 10;
    const Amounts = [5,10,20,50];
    const Coins = [0.01, 0.02, 0.05, 0.10, 0.20, 0.50, 1.00, 2.00];

    public function test_it_has_equal_quantity()
    {
        $snackMachine = $this->loadMachine(self::Amount,self::Quantity);
        $this->assertEquals(self::Quantity, $snackMachine['quantity']);
    }

    public function test_it_has_amount()
    {
        $snackMachine = $this->loadMachine(self::Amount,self::Quantity);
        $this->assertEquals(self::Amount, $snackMachine['amount']);
    }

    public function test_change_is_not_null()
    {
        $snackMachine = $this->loadMachine(self::Amount,self::Quantity);
        $this->assertNotNull("null", $snackMachine['change']);
    }

    public function test_it_has_correct_amount()
    {
        $this->assertTrue(in_array(self::Amount, self::Amounts));
    }

    public function test_it_has_wrong_input_amount()
    {
        $this->assertFalse(in_array(1000, self::Amounts));
    }

}