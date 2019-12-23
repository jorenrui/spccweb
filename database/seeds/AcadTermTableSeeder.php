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
        $acadTerm->acad_term_id = '202101';
        $acadTerm->sy = '2020-2021';
        $acadTerm->semester = 1;
        $acadTerm->prelims_id = 1;
        $acadTerm->midterms_id = 2;
        $acadTerm->finals_id = 3;
        $acadTerm->save();
    }
}
