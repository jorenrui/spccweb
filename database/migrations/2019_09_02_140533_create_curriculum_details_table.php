<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculumDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_details', function (Blueprint $table) {
            $table->increments('curriculum_details_id');
            $table->tinyInteger('sy');
            $table->tinyInteger('semester');
            $table->boolean('is_year_standing');
            $table->integer('curriculum_id')->unsigned();
            $table->foreign('curriculum_id')->references('curriculum_id')->on('curriculum')->onDelete('cascade');
            $table->string('course_code', 20);
            $table->foreign('course_code')->references('course_code')->on('course')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_details');
    }
}
