<?php

namespace App\Repository;

use App\Models\Meta;
use Illuminate\Http\Request;

interface MetaRepositoryInterface
{
    public function store(Request $request): Meta;

    public function show(Meta $meta);

    public function update(Request $request, Meta $meta): Meta;

    public function destroy(Meta $meta): null;
}
