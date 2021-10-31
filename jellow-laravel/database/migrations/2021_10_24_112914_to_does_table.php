<?php

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TodoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Todo::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(Todo::TITLE);
            $table->boolean(Todo::COMPLETED)->default(false);
            $table->unsignedBigInteger(Todo::USER_ID);
            $table->foreign(Todo::USER_ID)->references(User::ID)
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
        Schema::dropIfExists('to_does');
    }
}
