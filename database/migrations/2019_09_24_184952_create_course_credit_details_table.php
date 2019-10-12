<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCreditDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_credit_details', function (Blueprint $table) {
            $table->increments('credit_details_id');
            $table->string('course_code', 20);
            $table->string('description', 100);
            $table->char('grade', 4);
            $table->tinyInteger('units');
            $table->boolean('is_inc')->default(false);
            $table->integer('credit_id')->unsigned();
            $table->foreign('credit_id')->references('credit_id')->on('course_creditation')->onDelete('cascade');
            $table->integer('curriculum_details_id')->nullable();
            $table->string('acad_term_id', 6);
            $table->foreign('acad_term_id')->references('acad_term_id')->on('acad_term')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_credit_details');
    }
}
