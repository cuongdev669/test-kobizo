<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface PostServiceInterface
{
    public function lists(Request $request): LengthAwarePaginator;

    public function show(Post $post): Post;

    public function store(Request $request): Post;

    public function update(Request $request, Post $post): Post;

    public function destroy(Post $post);
}
