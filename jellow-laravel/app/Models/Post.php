<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const TABLE = 'posts';

    const ID = 'id';
    const TITLE = 'title';
    const BODY = 'body';
    const USER_ID = 'user_id';

    public $timestamps = false;

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class, Comment::POST_ID);
    }
}
