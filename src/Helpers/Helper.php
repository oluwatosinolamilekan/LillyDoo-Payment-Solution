<?php

namespace App\Helpers;

class Helper
{
    /**
     * @return string[]
     * @throws \Exception
     */
    public static function generateHeader($column): array
    {
        $header = [""];
        if($column >  26) throw new \Exception('We only have 26 Alphabet...');
        for ($x = 0; $x < $column; $x++) {
            $header[] = range('a','z')[$x];
        }
        return $header;
    }


    public static function generateRowlandColumn($row, $column): array
    {
        $rows = [];
        for($x = 0; $x < $row; $x++){
            $rows[] = [$x+1, ... self::itemList($column)];
        }
        return $rows;
    }

    public static function itemList($column)
    {
        $items =  [
            "Coke",
            "Mars",
            "M&M's",
            "Pepsi",
            "Red Pepper",
            "Voo",
            "CASG",
            "Wale",
            "Pepper",
            "Chips",
        ];

        $r = [];
        foreach (range(1, $column) as $key => $value){
            $rand =  array_rand($items);
            $r[] = $items[$rand];
        }
        return $r;
    }
}