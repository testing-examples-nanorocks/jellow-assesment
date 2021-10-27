<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = json_decode($res->body());

        echo "Importing posts ...";
        $posts_dump = [];
        foreach ($posts as $key => $post) {
            array_push($posts_dump, [
                Post::TITLE => $post->title,
                Post::BODY => $post->body,
                Post::USER_ID => $post->userId,
            ]);
        }

        DB::table(Post::TABLE)->insert($posts_dump);

        echo "\nPosts imported.\n";
    }
}
