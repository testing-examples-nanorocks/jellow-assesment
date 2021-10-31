<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsService
{
    /**
     * @param int $userId
     * @param int $limit
     * @return LengthAwarePaginator
     */
    public function chunkPosts(int $userId, int $limit = 5): LengthAwarePaginator
    {
        return Post::where(Post::USER_ID, $userId)->withCount('comments')->orderBy('comments_count')->paginate($limit);
    }
}
