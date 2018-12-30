<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 取消批量复制保护
        \Illuminate\Database\Eloquent\Model::unguard();

        $this->call(UsersTableSeeder::class);

        // 恢复批量复制保护
        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
