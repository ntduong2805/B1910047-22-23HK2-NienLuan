<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityRoomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_roomtype', function (Blueprint $table) {
            $table->integer('facility_id')->unsigned()->index();
            $table->integer('room_type_id')->unsigned()->index();
            $table->timestamps();

            //QUAN HE

            $table->foreign('facility_id')->references('id')->on('facilities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('room_type_id')->references('id')->on('roomtypes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility_roomtype');
    }
}
