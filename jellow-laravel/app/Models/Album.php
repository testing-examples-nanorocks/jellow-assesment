<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

class Album extends Model
{
    use HasFactory;

    const TABLE = 'albums';

    const ID = 'id';
    const TILE = 'tile';
    const USER_ID = 'user_id';

    public $timestamps = false;

    public function allowedFilters(array $params)
    {
        return QueryBuilder::for(self::class)
            ->allowedFilters($params);
    }

    public function photo()
    {
        return $this->hasOne(AlbumPhoto::class, AlbumPhoto::ALBUM_ID)->orderBy(AlbumPhoto::TITLE);
    }
}
