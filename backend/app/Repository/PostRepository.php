<?php
namespace App\Repository;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository implements PostRepositoryInterface
{
    public function lists(Request $request): LengthAwarePaginator
    {
        return Post::with('metas')->paginate(10);
    }

    public function show(Post $post): Post
    {
        $post->load('metas');
        return $post;
    }

    public function store(Request $request): Post
    {
        try {
            DB::beginTransaction();
            for($i = 0; $i < 50000; $i++) {
                $request->title = $request->title . $i;
                $post = Post::create($request->all());
            }
            DB::commit();
            return $post;
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Request $request, Post $post): Post
    {
        try {
            DB::beginTransaction();
            $post->update($request->all());
            DB::commit();
            return $post;
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy(Post $post)
    {
        try {
            DB::beginTransaction();
            $post->metas()->delete();
            $post->delete();
            DB::commit();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();
            throw $e;
        }
    }
}
