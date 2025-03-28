<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function store(Request $request)
    {
        $meta = Meta::create($request->all());
        return response()->json($meta, 201);
    }

    public function show(Meta $meta)
    {
        return response()->json($meta);
    }

    public function update(Request $request, Meta $meta)
    {
        $meta->update($request->all());
        return response()->json($meta);
    }

    public function destroy(Meta $meta)
    {
        $meta->delete();
        return response()->json(null, 204);
    }
}

