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
        'name'  => 'Vlademir Jean Machado',
        'email' => 'vlademir@oi.net.br',
        'password' => bcrypt('123456')
    ]);

    User::create([
        'name'  => 'Outro Usuario ',
        'email' => 'outro@oi.net.br',
        'password' => bcrypt('123456')
    ]);

    }
}
