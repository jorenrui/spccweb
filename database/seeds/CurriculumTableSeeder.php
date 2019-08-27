<?php

use App\Models\Curriculum;

use Illuminate\Database\Seeder;

class CurriculumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curriculum')->delete();

        $curriculum = new Curriculum;
        $curriculum->curriculum_id = 2012;
        $curriculum->effective_sy = '2012-2013';
        $curriculum->save();

        $curriculum = new Curriculum;
        $curriculum->curriculum_id = 2018;
        $curriculum->effective_sy = '2018-2019';
        $curriculum->save();
    }
}
