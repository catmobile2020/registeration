<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'Admin',
            'username'=>'admin',
            'email'=>'admin@admin.com',
            'phone'=>'0122135265',
            'active'=>true,
            'password'=>bcrypt(123456),
        ]);
    }
}
