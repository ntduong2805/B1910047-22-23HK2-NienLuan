<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_number', 5)->unique();
            $table->text('description');
            $table->boolean('available')->default(true);
            $table->boolean('status');
            $table->integer('room_type_id')->unsigned()->index();
            $table->timestamps();
            //QUAN HE
            $table->foreign('room_type_id')->references('id')->on('room_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
