<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExampleService;
use Illuminate\Http\JsonResponse;

class ExampleController extends Controller
{
    protected $exampleService;

    public function __construct(ExampleService $examlpleService)
    {
        $this->exampleService = $examlpleService;
    }

    /**
     * API test
     */
    public function test(Request $request): JsonResponse
    {
        $name = $request->input('name', '');

        $result = $this->exampleService->hello($name);

        return response()->json(['result' => $result]);
    }
}
