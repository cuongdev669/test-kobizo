<?php

namespace App\Services;

class CalculationService
{
    /**
     * Calculate S = MAX(A) - MIN(A)
     *
     * @param array $numbers
     * @return int|null
     */
    public function calculateMaxMinDifference(array $numbers): ?int
    {
        if (empty($numbers)) {
            return null;
        }
        return max($numbers) - min($numbers);
    }

    /**
     * Calculate S = 1 + 2 + ... + n
     *
     * @param int $n
     * @return int
     */
    public function calculateSumUpToN(int $n): int
    {
        if ($n < 1) {
            return 0;
        }
        return ($n * ($n + 1)) / 2;
    }
}
