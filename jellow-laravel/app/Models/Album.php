<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    const TABLE = 'albums';

    const ID = 'id';
    const TILE = 'tile';
    const USER_ID = 'user_id';

    public $timestamps = false;
}
