<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{


    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'name'         => 'admin',
            'email'         => 'admin@admin.com',
            'password'    => bcrypt('admin')
        ));
        User::create(array(
            'name'         => 'user',
            'email'         => 'user@user.com',
            'password'    => bcrypt('user')
        ));

    }
}
