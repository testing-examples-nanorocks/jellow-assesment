<?php

use App\Models\Album;
use App\Models\AlbumPhoto;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlbumsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(AlbumPhoto::TABLE, function (Blueprint $table) {
            $table->id();

            $table->string(AlbumPhoto::TITLE);
            $table->string(AlbumPhoto::THUMBNAIL_URL);
            $table->string(AlbumPhoto::URL);
            $table->unsignedBigInteger(AlbumPhoto::ALBUM_ID);
            $table->foreign(AlbumPhoto::ALBUM_ID)->references(Album::ID)
                ->on(Album::TABLE)
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
        Schema::dropIfExists('albums_photos');
    }
}
