<?php

namespace App\Helpers;

class Helper
{
    /**
     * @return string[]
     */
    public static function generateHeader($column): array
    {
        $header = [""];
        for ($x = 0; $x < $column; $x++) {
            $header[] = range('a','z')[$x];
        }
        return $header;
    }

    public static function generateRows($num): array
    {
        $rows = [];
        $list = array_rand(self::itemList(), $num);
        for($x = 0; $x < $num; $x++){
            $rows[] = [$x+1, $list];
        }
        return $rows;
    }

    public static function itemList(): array
    {
        return [
            "Coke",
            "Mars",
            "M&M's",
            "Pepsi"
        ];
    }
}