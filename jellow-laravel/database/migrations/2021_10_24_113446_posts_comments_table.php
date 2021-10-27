<?php

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Comment::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(Comment::NAME);
            $table->string(Comment::EMAIL)->unique();
            $table->text(Comment::BODY);
            $table->unsignedBigInteger(Comment::POST_ID);
            $table->foreign(Comment::POST_ID)->references(Post::ID)
                ->on(Post::TABLE)
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_comments');
    }
}
