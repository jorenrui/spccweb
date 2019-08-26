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
            $table->date('prelims_start_date');
            $table->date('prelims_end_date');
            $table->date('midterms_start_date');
            $table->date('midterms_end_date');
            $table->date('finals_start_date');
            $table->date('finals_end_date');
            $table->tinyInteger('semester');
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
