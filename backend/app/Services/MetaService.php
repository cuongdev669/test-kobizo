<?php

namespace App\Services;

use App\Models\Meta;
use Illuminate\Http\Request;

class MetaService implements MetaServiceInterface
{
    protected $metaRepo;

    public function __construct(MetaServiceInterface $metaRepo) {
        $this->metaRepo = $metaRepo;
    }
    public function store(Request $request): Meta
    {
        return $this->metaRepo->store($request);
    }

    public function show(Meta $meta)
    {
        return $this->metaRepo->show($meta);
    }

    public function update(Request $request, Meta $meta): Meta
    {
        return $this->metaRepo->update($request, $meta);
    }

    public function destroy(Meta $meta): null
    {
        $this->metaRepo->destroy($meta);
    }
}
