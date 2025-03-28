<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Services\MetaServiceInterface;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    protected $metaService;

    public function __construct(MetaServiceInterface $metaService) {
        $this->metaService = $metaService;
    }

    public function store(Request $request)
    {
        try {
            $meta = $this->metaService->store($request);
            return response()->json($meta, 201);
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    public function show(Meta $meta)
    {
        return response()->json($meta);
    }

    public function update(Request $request, Meta $meta)
    {
        try {
            $this->metaService->update($request, $meta);
            return response()->json($meta);
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    public function destroy(Meta $meta)
    {
        try {
            $this->metaService->destroy($meta);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }
}

