<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteAlbum extends Model
{
    use HasFactory;

    protected $table = 'favourite_albums';

    const ALBUM_ID = 'album_id';
    const USER_ID = 'user_id';

    public $timestamps = false;
}
