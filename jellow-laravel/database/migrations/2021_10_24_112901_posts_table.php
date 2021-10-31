<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Post::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(Post::TITLE);
            $table->text(Post::BODY);
            $table->unsignedBigInteger(Post::USER_ID);
            $table->foreign(Post::USER_ID)->references(User::ID)
                ->on(User::TABLE)
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
        Schema::dropIfExists('posts');
    }
}
