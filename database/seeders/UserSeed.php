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
        $users = [
            [
                'name'           => 'Thái Dương',
                'email'          => 'ntduong2805@gmail.com',
                'password'       => bcrypt('Duong2805'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
