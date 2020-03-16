<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\File;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public static function userInfo($user_id, $name, $birthdate, $info, $links) {
        $result = DB::insert(
            'insert into userinfo (user_id, name, birthdate, info, links) values (?, ?, ?, ?, ?)',
            [$user_id, $name, $birthdate, $info, $links]
        );
    }

    public static function getUserInfo($id) {
        $info = DB::table('userinfo')->where('user_id', $id)->get()->toArray();
        return $info;
    }

    public static function editUserInfo($id, $name, $birthdate, $info, $links) {
        $result = DB::table('userinfo')
            ->where('user_id', $id)
            ->update([
                'name' => $name,
                'birthdate' => $birthdate,
                'info' => $info,
                'links' => $links,
            ]);
    }

    public static function getUserAvatar($user) {
        $path = "storage/" . $user . "/";
        if(count(scandir($path)) === 3) {
            $imgName = scandir($path);
            $pathToAvatar = $path . $imgName[2];
            return $pathToAvatar;
        } else {
            $pathToAvatar = "storage/user-512.png";
            return $pathToAvatar;
        }
    }
}
