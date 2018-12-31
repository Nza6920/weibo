<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected  $table = 'statuses';         // 对应表

    protected $fillable = ['content'];

    // 动态属于用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
