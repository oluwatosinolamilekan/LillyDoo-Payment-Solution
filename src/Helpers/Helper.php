<?php

namespace App\Helpers;

class Helper
{
    /**
     * @return string[]
     */
    private static function generateHeader($column): array
    {
        $header = [""];
        for ($x = 0; $x < $column; $x++) {
            $header[] = range('a','z')[$x];
        }
        return $header;
    }
}