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

    public static function getDivisionByKey($column,$key)
    {
        switch ($column){
            case 'title':
                $division=DB::selectOne('select * from division where title=?',[$key]);
                return $division;
            case 'id':
                $division=DB::selectOne('select * from division where id=?',[$key]);
                return $division;
            default:
                return '';
        }
    }

    public static function getAllDivision()
    {
        $allDivisions=DB::select('select id from division');
        return $allDivisions;
    }
}
