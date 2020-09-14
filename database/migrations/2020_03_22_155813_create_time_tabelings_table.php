<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTabelingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_tabelings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('day_id');
            $table->string('day_name');
            $table->unsignedBigInteger('timeslot_id');
            $table->string('timeslot_name');
            $table->unsignedBigInteger('room_id');
            $table->string('room_name');
            $table->unsignedBigInteger('professor_id');
            $table->string('professor_first_name');
            $table->string('professor_last_name');
            $table->unsignedBigInteger('cours_id');
            $table->string('cours_name');
            $table->unsignedBigInteger('set_id');
            $table->string('set_name');
            $table->string('type');
            $table->boolean('available');
            $table->unsignedBigInteger('fitness');
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
        Schema::dropIfExists('time_tabelings');
    }
}
