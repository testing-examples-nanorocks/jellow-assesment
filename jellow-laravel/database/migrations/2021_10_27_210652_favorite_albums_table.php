<?php

use App\Models\FavoriteAlbum;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FavoriteAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(FavoriteAlbum::TABLE, function (Blueprint $table) {
            $table->unsignedBigInteger(FavoriteAlbum::USER_ID);
            $table->unsignedBigInteger(FavoriteAlbum::ALBUM_ID);

            $table->primary([FavoriteAlbum::USER_ID, FavoriteAlbum::ALBUM_ID]);

            $table->foreign(FavoriteAlbum::USER_ID)->references(User::ID)
                ->on(User::TABLE)
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign(FavoriteAlbum::ALBUM_ID)->references(User::ID)
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
        Schema::dropIfExists('favorite_albums');
    }
}
