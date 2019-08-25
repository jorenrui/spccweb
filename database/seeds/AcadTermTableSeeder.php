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
        $acadTerm->save();
    }
}
