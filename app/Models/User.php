<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected  $table = 'users';         // 对应表

    protected $fillable = [              // 允许用户更新的字段
        'name', 'email', 'password',
    ];

    protected $hidden = [                // 需要隐藏的字段
        'password', 'remember_token',
    ];

    // 获取头像
    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }
}
