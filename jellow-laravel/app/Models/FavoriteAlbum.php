<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteAlbum extends Model
{
    use HasFactory;

    protected $table = 'favorite_albums';

    const TABLE = 'favorite_albums';
    const ALBUM_ID = 'album_id';
    const USER_ID = 'user_id';

    public $timestamps = false;

    protected $fillable = [
        self::ALBUM_ID,
        self::USER_ID
    ];

    public function album(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Album::class, Album::ID, self::ALBUM_ID);
    }
}
