<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'to_does';

    const TABLE = 'to_does';

    const ID = 'id';
    const TITLE = 'title';
    const COMPLETED = 'completed';
    const USER_ID = 'user_id';

    public $timestamps = false;
}
