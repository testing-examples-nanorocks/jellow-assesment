<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'posts_comments';

    const TABLE = 'posts_comments';

    const ID = 'ID';
    const NAME = 'name';
    const EMAIL = 'email';
    const BODY = 'body';
    const POST_ID = 'post_id';

    public $timestamps = false;
}
