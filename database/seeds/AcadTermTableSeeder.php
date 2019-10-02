<?php

use App\Models\AcadTerm;
use Illuminate\Database\Seeder;

class AcadTermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acad_term')->delete();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '181901';
        $acadTerm->sy = '2018-2019';
        $acadTerm->semester = 1;
        $acadTerm->prelims_start_date = null;
        $acadTerm->prelims_end_date = null;
        $acadTerm->midterms_start_date = null;
        $acadTerm->midterms_end_date = null;
        $acadTerm->finals_start_date = null;
        $acadTerm->finals_end_date = null;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '181902';
        $acadTerm->sy = '2018-2019';
        $acadTerm->semester = 2;
        $acadTerm->prelims_start_date = null;
        $acadTerm->prelims_end_date = null;
        $acadTerm->midterms_start_date = null;
        $acadTerm->midterms_end_date = null;
        $acadTerm->finals_start_date = null;
        $acadTerm->finals_end_date = null;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '192001';
        $acadTerm->sy = '2019-2020';
        $acadTerm->semester = 1;
        $acadTerm->prelims_start_date = '2019-07-29';
        $acadTerm->prelims_end_date = '2019-08-02';
        $acadTerm->midterms_start_date = '2019-09-09';
        $acadTerm->midterms_end_date = '2019-09-13';
        $acadTerm->finals_start_date = '2019-10-21';
        $acadTerm->finals_end_date = '2019-10-25';
        $acadTerm->save();
    }
}
