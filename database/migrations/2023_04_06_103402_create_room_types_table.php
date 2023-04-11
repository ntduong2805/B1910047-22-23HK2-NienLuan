<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomtypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->integer('cost_per_day');
            $table->integer('discount_percentage')->default();
            $table->integer('size');
            $table->integer('max_adult')->nullable()->default(0);
            $table->integer('max_child')->nullable()->default(0);
            $table->text('description')->nullable();
            $table->boolean('room_service')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomtypes');
    }
}
