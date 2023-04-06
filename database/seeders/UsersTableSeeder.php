<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'first_name' => "Nguyen",
            'last_name' => "Thai Duong",
            'gender' => "male",
            'phone' => "0913854605",
            'address' => "Can Tho, Viet Nam",
            'email' => "ntduong2805@gmail.com",
            'password' => bcrypt('password'),
            'avatar' => 'boy-1.png',
            'about' => "hello from the other world",
            'status' => TRUE,
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'first_name' => "admin",
            'last_name' => "admin",
            'gender' => "male",
            'phone' => "123456789",
            'address' => "admin's address",
            'email' => "admin@gmail.com",
            'password' => bcrypt('password'),
            'avatar' => 'boy-1.png',
            'about' => "hello from the other world",
            'role' => 'admin',
            'status' => TRUE,
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
