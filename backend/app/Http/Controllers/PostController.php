<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService) {
        $this->postService = $postService;
    }

    public function index(Request $request)
    {
        $posts = $this->postService->lists($request);
        return response()->json($posts);
    }

    public function show(Post $post)
    {
        $post = $this->postService->show($post);
        return response()->json($post);
    }

    public function store(Request $request)
    {
        try {
            $post = $this->postService->store($request);
            return response()->json($post, 201);
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, Post $post)
    {
        try {
            $post = $this->postService->update($request, $post);
            return response()->json($post);
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    public function destroy(Post $post)
    {
        try {
            $this->postService->destroy($post);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }
}

