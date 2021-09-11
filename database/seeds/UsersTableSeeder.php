<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_at' => '2019-09-05 11:13:00',
            'updated_at' => '2019-09-05 11:13:00',
        ]);


        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Mehedi',
            'email' => 'mehedi@gmail.com',
            'image' => 'default.png',
            'mobile_number' => '01878831122',
            'password' => bcrypt('123456'),
            'created_at' => '2019-09-05 11:13:00',
            'updated_at' => '2019-09-05 11:13:00',
        ]);
    }
}
