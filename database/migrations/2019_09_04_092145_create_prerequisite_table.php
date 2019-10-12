<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrerequisiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prerequisite', function (Blueprint $table) {
            $table->bigIncrements('prerequisite_id');
            $table->integer('curriculum_details_id')->unsigned();
            $table->foreign('curriculum_details_id')->references('curriculum_details_id')->on('curriculum_details')->onDelete('cascade');
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
        Schema::dropIfExists('prerequisite');
    }
}
