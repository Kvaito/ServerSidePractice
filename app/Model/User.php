<?php

namespace Model;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class User extends Model implements IdentityInterface
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id_role',
        'id_institute',
        'name',
        'login',
        'password',
        'avatar_url'
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            $user->password = md5($user->password);
            $user->save();
        });
    }

    //Выборка пользователя по первичному ключу
    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->id;
    }

//    Получение ID заведения авторизованного пользователя
    public static function getInstituteId()
    {
//        $instituteId=DB::selectOne(DB::raw('select id_institute from users where id= 3'));
        $instituteId=DB::selectOne('select id_institute from users where id= ?',[app()->auth::user()->id]);
        $instituteId=((array) $instituteId)['id_institute'];
        return $instituteId;
    }

    //Возврат аутентифицированного пользователя
    public function attemptIdentity(array $credentials)
    {
        return self::where(['login' => $credentials['login'],
            'password' => md5($credentials['password'])])->first();
    }

    public static function getAvatarUrl()
    {
        $avatarUrl=DB::selectOne('select avatar_url from users where id= ?',[app()->auth::user()->id]);
        $avatarUrl=((array) $avatarUrl)['avatar_url'];
        return $avatarUrl;
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class,'id_institute');
    }
}



