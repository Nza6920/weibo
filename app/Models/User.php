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

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($user) {
           $user->activation_token = str_random(30);
        });
    }
    // 用户有很多动态
    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function feed()
    {
        $users_ids = $this->followings->pluck('id')->toArray();
        array_push($users_ids, $this->id);
        return Status::whereIn('user_id', $users_ids)
                            ->with('user')
                            ->orderBy('created_at', 'desc');
    }

    // 粉丝
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    // 关注的人
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    // 关注
    public function follow($user_ids)
    {
        if (! is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids, false);
    }

    // 取关
    public function unfollow($user_ids)
    {
        if (! is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }

    // 判断是否关注
    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }
}
