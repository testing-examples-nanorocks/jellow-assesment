<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumPhoto extends Model
{
    use HasFactory;

    protected $table = 'albums_photos';

    const TABLE = 'albums_photos';

    const TITLE = 'title';
    const URL = 'url';
    const THUMBNAIL_URL = 'thumbnail_url';
    const ALBUM_ID = 'album_id';

    public $timestamps = false;
}
