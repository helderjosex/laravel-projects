<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(['username'=>'admin', 'email'=>'admin@email.com', 'password' => bcrypt('123456')]);
    }
}