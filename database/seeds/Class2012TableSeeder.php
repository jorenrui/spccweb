<?php

use App\Models\SClass;

use Illuminate\Database\Seeder;

class Class2012TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class')->delete();

        /* 2012 Curriculum */

        /* 2017-2018 1st Semester */
        $class = new SClass;
        $class->class_id = 1;
        $class->instructor_id = 'I-102';
        $class->course_code = 'ENG1';
        $class->acad_term_id = '171801';
        $class->section = null;
        $class->day = 'M';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 2;
        $class->instructor_id = 'I-102';
        $class->course_code = 'HUM1';
        $class->acad_term_id = '171801';
        $class->section = null;
        $class->day = 'M';
        $class->time_start = '13:00:00';
        $class->time_end = '15:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 3;
        $class->instructor_id = 'I-101';
        $class->course_code = 'MATH1';
        $class->acad_term_id = '171801';
        $class->section = null;
        $class->day = 'M';
        $class->time_start = '15:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 4;
        $class->instructor_id = 'I-102';
        $class->course_code = 'SOCSCI1';
        $class->acad_term_id = '171801';
        $class->section = null;
        $class->day = 'T';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 5;
        $class->instructor_id = 'I-100';
        $class->course_code = 'IT111';
        $class->acad_term_id = '171801';
        $class->section = null;
        $class->day = 'T';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 6;
        $class->instructor_id = 'I-101';
        $class->course_code = 'PE1';
        $class->acad_term_id = '171801';
        $class->section = null;
        $class->day = 'W';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 7;
        $class->instructor_id = 'I-103';
        $class->course_code = 'IT112';
        $class->acad_term_id = '171801';
        $class->section = null;
        $class->day = 'W';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 8;
        $class->instructor_id = 'I-104';
        $class->course_code = 'IT113';
        $class->acad_term_id = '171801';
        $class->section = null;
        $class->day = 'TH';
        $class->time_start = '13:00:00';
        $class->time_end = '15:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 9;
        $class->instructor_id = 'I-102';
        $class->course_code = 'NSTP1';
        $class->acad_term_id = '171801';
        $class->section = null;
        $class->day = 'F';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        /* 2017-2018 2nd Semester */
        $class = new SClass;
        $class->class_id = 10;
        $class->instructor_id = 'I-102';
        $class->course_code = 'ENG2';
        $class->acad_term_id = '171802';
        $class->section = null;
        $class->day = 'M';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 11;
        $class->instructor_id = 'I-102';
        $class->course_code = 'HUM2';
        $class->acad_term_id = '171802';
        $class->section = null;
        $class->day = 'M';
        $class->time_start = '13:00:00';
        $class->time_end = '15:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 12;
        $class->instructor_id = 'I-101';
        $class->course_code = 'MATH2';
        $class->acad_term_id = '171802';
        $class->section = null;
        $class->day = 'M';
        $class->time_start = '15:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 13;
        $class->instructor_id = 'I-101';
        $class->course_code = 'SOCSCI2';
        $class->acad_term_id = '171802';
        $class->section = null;
        $class->day = 'T';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 14;
        $class->instructor_id = 'I-100';
        $class->course_code = 'IT121';
        $class->acad_term_id = '171802';
        $class->section = null;
        $class->day = 'T';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 15;
        $class->instructor_id = 'I-101';
        $class->course_code = 'PE2';
        $class->acad_term_id = '171802';
        $class->section = null;
        $class->day = 'W';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 16;
        $class->instructor_id = 'I-103';
        $class->course_code = 'IT122';
        $class->acad_term_id = '171802';
        $class->section = null;
        $class->day = 'W';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 17;
        $class->instructor_id = 'I-104';
        $class->course_code = 'IT123';
        $class->acad_term_id = '171802';
        $class->section = null;
        $class->day = 'TH';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 18;
        $class->instructor_id = 'I-102';
        $class->course_code = 'NSTP2';
        $class->acad_term_id = '171802';
        $class->section = null;
        $class->day = 'F';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        /* 2018-2019 1st Semester */
        $class = new SClass;
        $class->class_id = 19;
        $class->instructor_id = 'I-102';
        $class->course_code = 'ENG3';
        $class->acad_term_id = '181901';
        $class->section = null;
        $class->day = 'M';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 20;
        $class->instructor_id = 'I-101';
        $class->course_code = 'NATSCI1';
        $class->acad_term_id = '181901';
        $class->section = null;
        $class->day = 'M';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 21;
        $class->instructor_id = 'I-102';
        $class->course_code = 'FIL1';
        $class->acad_term_id = '181901';
        $class->section = null;
        $class->day = 'T';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 22;
        $class->instructor_id = 'I-100';
        $class->course_code = 'IT211';
        $class->acad_term_id = '181901';
        $class->section = null;
        $class->day = 'T';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 23;
        $class->instructor_id = 'I-101';
        $class->course_code = 'MATH3';
        $class->acad_term_id = '181901';
        $class->section = null;
        $class->day = 'W';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 24;
        $class->instructor_id = 'I-103';
        $class->course_code = 'IT212';
        $class->acad_term_id = '181901';
        $class->section = null;
        $class->day = 'W';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 25;
        $class->instructor_id = 'I-101';
        $class->course_code = 'PE3';
        $class->acad_term_id = '181901';
        $class->section = null;
        $class->day = 'TH';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->room = 'College Room';
        $class->save();

        $class = new SClass;
        $class->class_id = 26;
        $class->instructor_id = 'I-104';
        $class->course_code = 'IT213';
        $class->acad_term_id = '181901';
        $class->section = null;
        $class->day = 'TH';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->room = 'College Room';
        $class->save();
    }
}
