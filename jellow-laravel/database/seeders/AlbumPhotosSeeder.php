<?php

namespace Database\Seeders;

use App\Models\AlbumPhoto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AlbumPhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res = Http::get('https://jsonplaceholder.typicode.com/photos');
        $photos = json_decode($res->body());

        echo "Importing photos ...";

        $photos_dump = [];
        foreach ($photos as $key => $photo) {
            array_push($photos_dump, [
                AlbumPhoto::URL => $photo->url,
                AlbumPhoto::THUMBNAIL_URL => $photo->thumbnailUrl,
                AlbumPhoto::TITLE => $photo->title,
                AlbumPhoto::ALBUM_ID => $photo->albumId
            ]);
        }

        DB::table(AlbumPhoto::TABLE)->insert($photos_dump);

        echo "\nPhotos imported.\n";
    }
}
