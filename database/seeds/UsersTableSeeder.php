<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::first();
        $user->name = 'pepsi';
        $user->password = bcrypt('qwerty');
        $user->email = '1484663282@qq.com';
        $user->save();
    }
}
