<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 取消批量复制保护
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(FollowersTableSeeder::class);

        // 恢复批量复制保护
        Model::reguard();
    }
}
