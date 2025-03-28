<?php

namespace App\Repository;

use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MetaRepository implements MetaRepositoryInterface
{
    public function store(Request $request): Meta
    {
        try {
            DB::beginTransaction();
            $meta = Meta::create($request->all());
            DB::commit();
            return $meta;
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();
            throw $e;
        }
    }

    public function show(Meta $meta)
    {
        return response()->json($meta);
    }

    public function update(Request $request, Meta $meta): Meta
    {
        try {
            DB::beginTransaction();
            $meta->update($request->all());
            DB::commit();
            return $meta;
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy(Meta $meta): null
    {
        try {
            DB::beginTransaction();
            $meta->delete();
            DB::commit();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();
            throw $e;
        }
    }
}
