<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'name' => "1.jpg",
            'small_title' => "One Experience the hotel",
            'big_title' => "One Royal Gardens",
            'description' => "One Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.",
            'link' => 'roomtype/1',
            'link_text' => 'Book Now',
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('sliders')->insert([
            'name' => "2.jpg",
            'small_title' => "Two Experience the hotel",
            'big_title' => "Two Royal Gardens",
            'description' => "Two Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.",
            'link' => 'roomtype/2',
            'link_text' => 'Book Now',
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('sliders')->insert([
            'name' => "3.jpg",
            'small_title' => "Three Experience the hotel",
            'big_title' => "Three Royal Gardens",
            'description' => "Three Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.",
            'link' => 'roomtype/3',
            'link_text' => 'Book Now',
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('sliders')->insert([
            'name' => "4.jpg",
            'small_title' => "Four Experience the hotel",
            'big_title' => "Four Royal Gardens",
            'description' => "Four Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.",
            'link' => 'roomtype/4',
            'link_text' => 'Book Now',
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
