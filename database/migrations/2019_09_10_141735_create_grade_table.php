<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade', function (Blueprint $table) {
            $table->increments('grade_id');
            $table->decimal('prelims', 4, 2)->nullable();
            $table->decimal('midterms', 4, 2)->nullable();
            $table->decimal('finals', 4, 2)->nullable();
            $table->string('grade')->nullable()->default(null);
            $table->boolean('is_inc')->default(false);
            $table->string('note', 20)->nullable();
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('class_id')->on('class')->onDelete('cascade');
            $table->string('student_no', 10);
            $table->foreign('student_no')->references('student_no')->on('student')->onDelete('cascade');
            $table->integer('curriculum_details_id')->unsigned()->nullable();
            $table->foreign('curriculum_details_id')->references('curriculum_details_id')->on('curriculum_details')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade');
    }
}
