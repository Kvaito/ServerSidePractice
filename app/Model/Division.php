<?php


namespace Model;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Division
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_institute',
        'title',
        'description'
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            $user->save();
        });
    }
}
