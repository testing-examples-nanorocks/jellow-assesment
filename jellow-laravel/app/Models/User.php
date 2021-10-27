<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const TABLE = 'users';

    const ID = 'id';
    const USERNAME = 'username';
    const EMAIL = 'email';
    const NAME = 'name';
    const WEBSITE = 'website';
    const IMAGE = 'image';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        self::USERNAME,
        self::EMAIL,
        self::NAME,
        self::WEBSITE,
        self::IMAGE
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [

    ];

}
