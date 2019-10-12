<?php

use App\Models\SClass;

use Illuminate\Database\Seeder;

class SClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class')->delete();

        /* 2018-2019 2nd Semester */

        $class = new SClass;
        $class->class_id = 1;
        $class->section = null;
        $class->instructor_id = 'K491';
        $class->course_code = 'OS';
        $class->acad_term_id = '181902';
        $class->day = 'T';
        $class->time_start = '13:00:00';
        $class->time_end = '17:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 2;
        $class->section = null;
        $class->instructor_id = 'K491';
        $class->course_code = 'IT 322';
        $class->acad_term_id = '181902';
        $class->day = 'TH';
        $class->time_start = '13:00:00';
        $class->time_end = '17:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 3;
        $class->section = null;
        $class->instructor_id = 'K492';
        $class->course_code = 'Eng 1';
        $class->acad_term_id = '181902';
        $class->day = 'TH';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 4;
        $class->section = null;
        $class->instructor_id = 'K491';
        $class->course_code = 'HumCom';
        $class->acad_term_id = '181902';
        $class->day = 'F';
        $class->time_start = '13:00:00';
        $class->time_end = '17:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 5;
        $class->section = null;
        $class->instructor_id = 'K492';
        $class->course_code = 'IT 422';
        $class->acad_term_id = '181902';
        $class->day = 'F';
        $class->time_start = '13:00:00';
        $class->time_end = '16:00:00';
        $class->room = null;
        $class->save();

        /* 2019-2020 1st Semester */

    }
}
