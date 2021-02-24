<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //create the users
        $user = new User();
        $user->name = 'Brandon Stewart';
        $user->email = 'brandonstewart300055@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $user = new User();
        $user->name = 'test user';
        $user->email = 'test@test.com';
        $user->password = bcrypt('password');
        $user->save();
    }
}
