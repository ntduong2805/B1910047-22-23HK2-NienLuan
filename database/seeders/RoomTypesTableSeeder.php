<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roomtypes')->insert([
            'name' => "Master Suite",
            'cost_per_day' => 2500000,
            'discount_percentage' => 5,
            'size' => 3000,
            'max_adult' => 10,
            'max_child' => 5,
            'description' => 'This type of Suite room has an area in the standard level, the bedroom and living room are slightly separated from each other. This is the type of room in the top room with the highest price in hotels and resorts.',
            'room_service' => true,
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('roomtypes')->insert([
            'name' => "Mini Suite",
            'cost_per_day' => 1800000,
            'discount_percentage' => 10,
            'size' => 2000,
            'max_adult' => 8,
            'max_child' => 4,
            'description' => 'This is a room with a higher standard and service quality than the Deluxe room. Usually has 1 bedroom, 1 living room, very suitable for newlyweds or small families.',
            'room_service' => true,
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('roomtypes')->insert([
            'name' => "Ultra Deluxe",
            'cost_per_day' => 1400000,
            'size' => 1400,
            'max_adult' => 5,
            'max_child' => 2,
            'description' => '
            This is a high-class room, with better quality than a SUP room, usually on a high floor, large area, beautiful view and equipped with high-class facilities and equipment.',
            'room_service' => true,
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('roomtypes')->insert([
            'name' => "Luxury Room",
            'cost_per_day' => 900000,
            'size' => 800,
            'max_adult' => 4,
            'max_child' => 2,
            'description' => '
            LUXURY ROOM is a luxurious, spacious and comfortable room with luxurious design with bathtub and ocean view, you can enjoy both a green space of the sea and immense sky.',
            'room_service' => false,
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('roomtypes')->insert([
            'name' => "Premium Room",
            'cost_per_day' => 600000,
            'size' => 500,
            'max_adult' => 3,
            'max_child' => 2,
            'description' => '
            Premium room, commonly known as Premier room, is a type of high-class room with high standards in hotel interior design.',
            'room_service' => false,
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('roomtypes')->insert([
            'name' => "Normal Room",
            'cost_per_day' => 300000,
            'size' => 300,
            'max_adult' => 2,
            'max_child' => 1,
            'description' => 'A standard room type, usually with the smallest area, on a low floor, with limited views and the lowest price.',
            'room_service' => false,
            'status' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
