<?php

namespace Tests\Unit;

use Tests\BaseTestCase;

class PurchaseTest extends BaseTestCase
{
    const Quantity = 2;
    const Amount = 10;
    const Amounts = [5,10,20,50];

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
        $confirmAmount = in_array(self::Amount, self::Amounts);
        $this->assertTrue($confirmAmount);
    }

    public function test_it_has_wrong_input_amount()
    {
        $confirmAmount = in_array(1000, self::Amounts);
        $this->assertFalse($confirmAmount);
    }

}