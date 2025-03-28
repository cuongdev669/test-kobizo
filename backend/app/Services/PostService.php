<?php

namespace App\Services;

use App\Repository\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService implements PostServiceInterface
{
    protected $postRepo;

    public function __construct(PostRepositoryInterface $postRepo) {
        $this->postRepo = $postRepo;
    }

    public function lists(Request $request): LengthAwarePaginator
    {
        return $this->postRepo->lists($request);
    }

    public function show(Post $post): Post
    {
        return $this->postRepo->show($post);
    }

    public function store(Request $request): Post
    {
        return $this->postRepo->store($request);
    }

    public function update(Request $request, Post $post): Post
    {
        return $this->postRepo->update($request, $post);
    }

    public function destroy(Post $post)
    {
        $this->postRepo->destroy($post);
    }
}
