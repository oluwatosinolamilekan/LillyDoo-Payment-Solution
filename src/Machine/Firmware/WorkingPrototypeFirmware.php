<?php

declare(strict_types=1);

namespace App\Machine\Firmware;

use App\Helpers\Helper;

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
     */
    public function getSlots(): array
    {
        return [
            "header" => Helper::generateHeader($this->column),
            "data" => Helper::generateRows($this->row),
//            "data" => [
//                ["1", "Mars", "Coke"],
//                ["2", "M&M's", "Pepsi"]
//            ]
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

    /**
     * @return array
     */
    private function generateData(): array
    {
        $input = $this->items;
        shuffle($input);
        $data = [];
        for($x = 0; $x < $this->row; $x++){
            $data[] = array_chunk(array_slice($input,0, count($this->items)), count($this->items));
        }
        return $data;
    }
}
