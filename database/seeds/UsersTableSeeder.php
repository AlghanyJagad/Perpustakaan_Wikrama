<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
              'id'  			=> 1,
              'name'  			=> 'Admin',
              'username'		=> 'admin123',
              'email' 			=> 'admin@email.com',
              'password'		=> bcrypt('admin123'),
              'gambar'			=> NULL,
              'level'			=> 'admin',
        ]);
    }
}
