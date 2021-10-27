<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AlbumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res = Http::get('https://jsonplaceholder.typicode.com/albums');
        $albums = json_decode($res->body());

        echo "Importing albums ...";

        $albums_dump = [];
        foreach ($albums as $key => $album) {
            array_push($albums_dump, [
                Album::TILE => $album->title,
                Album::USER_ID => $album->userId
            ]);
        }

        DB::table(Album::TABLE)->insert($albums_dump);

        echo "\nAlbums imported.\n";
    }
}
