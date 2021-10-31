<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(AlbumsSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(AlbumPhotosSeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(ToDoesSeeder::class);
    }
}
