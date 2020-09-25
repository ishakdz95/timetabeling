<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeanceOfGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seance_of_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('day_id');
            $table->string('day_name');
            $table->unsignedBigInteger('timeslot_id');
            $table->string('timeslot_name');
            $table->unsignedBigInteger('professor_id');
            $table->string('professor_first_name');
            $table->string('professor_last_name');
            $table->unsignedBigInteger('section_id');
            $table->string('section_name');
            $table->unsignedBigInteger('cours_id');
            $table->string('cours_name');
            $table->string('type');
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
        Schema::dropIfExists('seance_of_groups');
    }
}
