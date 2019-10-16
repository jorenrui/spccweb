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
        $class->time_end = '18:00:00';
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
        $class->time_end = '18:00:00';
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
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 5;
        $class->section = null;
        $class->instructor_id = 'K492';
        $class->course_code = 'IT 422';
        $class->acad_term_id = '181902';
        $class->day = 'F';
        $class->time_start = '9:00:00';
        $class->time_end = '12:00:00';
        $class->room = null;
        $class->save();

        $class = new SClass;
        $class->class_id = 6;
        $class->section = null;
        $class->instructor_id = 'K491';
        $class->course_code = 'IT 121';
        $class->acad_term_id = '181902';
        $class->day = 'M';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 7;
        $class->section = null;
        $class->instructor_id = 'K491';
        $class->course_code = 'IT 323';
        $class->acad_term_id = '181902';
        $class->day = 'W';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        /* 2019-2020 1st Semester */

        $class = new SClass;
        $class->class_id = 8;
        $class->section = '401-A';
        $class->instructor_id = 'K519';
        $class->course_code = 'IT 413';
        $class->acad_term_id = '192001';
        $class->day = 'TH';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 9;
        $class->section = '401-A';
        $class->instructor_id = 'K519';
        $class->course_code = 'ELE 3';
        $class->acad_term_id = '192001';
        $class->day = 'W';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 10;
        $class->section = '401-A';
        $class->instructor_id = 'K491';
        $class->course_code = 'IT 211';
        $class->acad_term_id = '192001';
        $class->day = 'T';
        $class->time_start = '10:00:00';
        $class->time_end = '13:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 11;
        $class->section = '401-A';
        $class->instructor_id = 'K491';
        $class->course_code = 'IT 321';
        $class->acad_term_id = '192001';
        $class->day = 'F';
        $class->time_start = '10:00:00';
        $class->time_end = '13:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 12;
        $class->section = '401-A';
        $class->instructor_id = 'K519';
        $class->course_code = 'IT 213';
        $class->acad_term_id = '192001';
        $class->day = 'W';
        $class->time_start = '17:00:00';
        $class->time_end = '20:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 13;
        $class->section = '401-A';
        $class->instructor_id = 'K519';
        $class->course_code = 'IT 223';
        $class->acad_term_id = '192001';
        $class->day = 'TH';
        $class->time_start = '17:00:00';
        $class->time_end = '20:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 14;
        $class->section = '401-A';
        $class->instructor_id = 'K346';
        $class->course_code = 'IT 221';
        $class->acad_term_id = '192001';
        $class->day = 'M';
        $class->time_start = '10:00:00';
        $class->time_end = '13:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 15;
        $class->section = '401-A';
        $class->instructor_id = 'K491';
        $class->course_code = 'IT 221';
        $class->acad_term_id = '192001';
        $class->day = 'M';
        $class->time_start = '10:00:00';
        $class->time_end = '13:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 16;
        $class->section = '401-A';
        $class->instructor_id = 'K491';
        $class->course_code = 'IT 411';
        $class->acad_term_id = '192001';
        $class->day = 'M';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 17;
        $class->section = '401-A';
        $class->instructor_id = 'K491';
        $class->course_code = 'IT 412';
        $class->acad_term_id = '192001';
        $class->day = 'T';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();
    }
}
