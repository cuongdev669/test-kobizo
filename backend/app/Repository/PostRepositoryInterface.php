<?php
namespace App\Repository;

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function lists(Request $request): LengthAwarePaginator;

    public function show(Post $post): Post;

    public function store(Request $request): Post;

    public function update(Request $request, Post $post): Post;

    public function destroy(Post $post);
}
