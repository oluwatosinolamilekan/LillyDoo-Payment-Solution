<?php

declare(strict_types=1);

namespace App\Machine\Firmware;

use App\Helpers\Helper;
use Exception;

class WorkingPrototypeFirmware implements FirmwareInterface
{
    public function __construct(
        public  ?string   $row = null,
        public  ?string   $column = null,
        public  ?string   $amount = null,
        public  ?string   $quantity = null
    ){}

    /**
     * @return array
     * @throws Exception
     */
    public function getSlots(): array
    {
        return [
            "header" => Helper::generateHeader($this->column),
            "data" => Helper::generateRowlandColumn($this->row, $this->column),
        ];
    }

    /**
     * @return array
     */
    public function transactionsDetails(): array
    {
        return [
            'quantity' => $this->quantity,
            'amount' => $this->amount
        ];
    }

}
