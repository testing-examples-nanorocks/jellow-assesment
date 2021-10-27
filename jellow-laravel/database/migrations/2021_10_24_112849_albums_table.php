<?php

use App\Models\Album;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Album::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(Album::TILE);
            $table->unsignedBigInteger(Album::USER_ID)->nullable();
            $table->foreign(Album::USER_ID)->references(User::ID)
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
        Schema::dropIfExists('albums');
    }
}
