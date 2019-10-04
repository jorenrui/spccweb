<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcadTermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acad_term', function (Blueprint $table) {
            $table->string('acad_term_id', 6);
            $table->primary('acad_term_id');
            $table->string('sy', 9);
            $table->tinyInteger('semester');
            $table->integer('prelims_id')->nullable();
            $table->integer('midterms_id')->nullable();
            $table->integer('finals_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acad_term');
    }
}
