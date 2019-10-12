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
        $acadTerm->acad_term_id = '141501';
        $acadTerm->sy = '2014-2015';
        $acadTerm->semester = 1;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '141502';
        $acadTerm->sy = '2014-2015';
        $acadTerm->semester = 2;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '151601';
        $acadTerm->sy = '2015-2016';
        $acadTerm->semester = 1;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '151602';
        $acadTerm->sy = '2015-2016';
        $acadTerm->semester = 2;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '161701';
        $acadTerm->sy = '2016-2017';
        $acadTerm->semester = 1;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '161702';
        $acadTerm->sy = '2016-2017';
        $acadTerm->semester = 2;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '161709';
        $acadTerm->sy = '2016-2017';
        $acadTerm->semester = 9;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '171801';
        $acadTerm->sy = '2017-2018';
        $acadTerm->semester = 1;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '171802';
        $acadTerm->sy = '2017-2018';
        $acadTerm->semester = 2;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '181901';
        $acadTerm->sy = '2018-2019';
        $acadTerm->semester = 1;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '181902';
        $acadTerm->sy = '2018-2019';
        $acadTerm->semester = 2;
        $acadTerm->prelims_id = 2;
        $acadTerm->midterms_id = 5;
        $acadTerm->finals_id = 6;
        $acadTerm->save();

        $acadTerm = new AcadTerm;
        $acadTerm->acad_term_id = '192001';
        $acadTerm->sy = '2019-2020';
        $acadTerm->semester = 1;
        $acadTerm->prelims_id = 7;
        $acadTerm->midterms_id = 8;
        $acadTerm->finals_id = 9;
        $acadTerm->save();
    }
}
