<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::create([
            'name' => 'rakhman',
            'email' => 'auliarakhman234@gmail.com',
            'password' => bcrypt('k1k1b0n3nk')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'auliarakhman346@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('user');
    }
}
