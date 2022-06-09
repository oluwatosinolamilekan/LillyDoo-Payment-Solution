<?php

namespace App\Services\Product;

use App\Machine\Firmware\FirmwareInterface;

class ItemsInStock implements FirmwareInterface
{
    public function __construct(
        protected string $row,
        protected string $column
    ){}


    /**
     * @return array
     */
    public function getSlots(): array
    {
        return [
            "header" => $this->generateHeader(),
            "data" => [
                ["", "Test", "Test2"],
                ["", "Test3", "Test4"]
            ]
        ];
    }

    /**
     * @return string[]
     */
    private function generateHeader(): array
    {
        $header = [""];
        for ($x = 0; $x < $this->column; $x++) {
            $header[] = range('a','z')[$x];
        }
        return $header;
    }

    /**
     * @return array
     */
    private function generateData(): array
    {
        $data = [""];
        for($x = 0; $x < $this->row; $x++){
            $data[] = range(1, $this->row);
        }
        return $data;
    }
}