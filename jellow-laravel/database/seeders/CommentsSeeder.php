<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res = Http::get('https://jsonplaceholder.typicode.com/comments');
        $comments = json_decode($res->body());

        echo "Importing comments ...";
        $comments_dump = [];
        foreach ($comments as $key => $comment) {
            array_push($comments_dump, [
                Comment::NAME => $comment->name,
                Comment::EMAIL => $comment->email,
                Comment::BODY => $comment->body,
                Comment::POST_ID => $comment->postId,
            ]);
        }

        DB::table(Comment::TABLE)->insert($comments_dump);

        echo "\nComments imported.\n";
    }
}
