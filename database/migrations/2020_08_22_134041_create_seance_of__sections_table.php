<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeanceOfSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seance_of__sections', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cours_id');
            $table->string('cours_name');
            $table->unsignedBigInteger('section_id');
            $table->string('section_name');
            $table->string('type');
            $table->string('priority');
            $table->boolean('available');
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
        Schema::dropIfExists('seance_of__sections');
    }
}
