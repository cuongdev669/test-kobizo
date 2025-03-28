<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CalculationService;
use Illuminate\Http\JsonResponse;

class CalculationController extends Controller
{
    protected $calculationService;

    public function __construct(CalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    /**
     * API: Cal S = MAX(A) - MIN(A)
     */
    public function maxMinDifference(Request $request): JsonResponse
    {
        $numbers = $request->input('numbers', []);

        if (!is_array($numbers) || empty($numbers)) {
            return response()->json(['error' => 'Invalid input, numbers must be a non-empty array'], 400);
        }

        $result = $this->calculationService->calculateMaxMinDifference($numbers);

        return response()->json(['result' => $result]);
    }

    /**
     * API: Cal S = 1 + 2 + ... + n
     */
    public function sumUpToN(Request $request): JsonResponse
    {
        $n = $request->input('n', 0);

        if (!is_numeric($n) || $n < 1) {
            return response()->json(['error' => 'Invalid input, n must be a positive integer'], 400);
        }

        $result = $this->calculationService->calculateSumUpToN((int)$n);

        return response()->json(['result' => $result]);
    }
}
