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
        $acadTerm->acad_term_id = '171801';
        $acadTerm->sy = '2017-2018';
        $acadTerm->semester = 1;
        $acadTerm->prelims_start_date = '2017-07-24';
        $acadTerm->prelims_end_date = '2017-07-28';
        $acadTerm->midterms_start_date = '2017-09-04';
        $acadTerm->midterms_end_date = '2017-09-08';
        $acadTerm->finals_start_date = '2017-10-16';
        $acadTerm->finals_end_date = '2017-10-20';
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '171802';
        $acadTerm->sy = '2017-2018';
        $acadTerm->semester = 2;
        $acadTerm->prelims_start_date = '2017-12-11';
        $acadTerm->prelims_end_date = '2017-12-15';
        $acadTerm->midterms_start_date = '2018-02-12';
        $acadTerm->midterms_end_date = '2018-02-16';
        $acadTerm->finals_start_date = '2018-03-26';
        $acadTerm->finals_end_date = '2018-03-30';
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '181901';
        $acadTerm->sy = '2018-2019';
        $acadTerm->semester = 1;
        $acadTerm->prelims_start_date = '2018-07-23';
        $acadTerm->prelims_end_date = '2018-07-27';
        $acadTerm->midterms_start_date = '2018-09-03';
        $acadTerm->midterms_end_date = '2018-09-07';
        $acadTerm->finals_start_date = '2018-10-15';
        $acadTerm->finals_end_date = '2018-10-19';
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '181902';
        $acadTerm->sy = '2018-2019';
        $acadTerm->semester = 2;
        $acadTerm->prelims_start_date = '2018-12-17';
        $acadTerm->prelims_end_date = '2018-12-18';
        $acadTerm->midterms_start_date = '2019-02-11';
        $acadTerm->midterms_end_date = '2019-02-15';
        $acadTerm->finals_start_date = '2019-03-25';
        $acadTerm->finals_end_date = '2019-03-29';
        $acadTerm->save();
    }
}
