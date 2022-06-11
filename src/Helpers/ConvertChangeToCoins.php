<?php

namespace App\Helpers;

class ConvertChangeToCoins
{
    /**
     * @param $change
     * @return int|array
     */
    public  function action($change): int|array
    {
        $coins = [0.01, 0.02, 0.05, 0.10, 0.20, 0.50, 1.00, 2.00];
        $countCoins = count($coins);
        if ($change == 0) return 0;
        sort($coins);
        $results = [];
        $sum = 0;
        $i = $countCoins - 1;
        $c = 0;
        //  Find the change coins by given value
        while ($i >= 0 && $sum < $change){
            // Get coin
            $c = $coins[$i];
            while ($c + $sum <= $change) {
                // Add coin
                $results[] = $c;
                // Update sum
                $sum += $c;
            }
            // Reduce position of element
            $i--;
        }
        return $this->countValues($results);

    }

    private function countValues($array): array
    {
        $data = [];
        foreach ($array as $value) {
            if (!array_key_exists(strtolower($value), $data)) {
                $data[strtolower($value)] = 0;
            }
            $data[strtolower($value)] += 1;
        }
        return $data;
    }
}