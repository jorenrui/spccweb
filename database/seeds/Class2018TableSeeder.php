<?php

use App\Models\SClass;

use Illuminate\Database\Seeder;

class Class2018TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 2018 Curriculum */

        /* 2018-2019 1st Semester */
        $class = new SClass;
        $class->class_id = 27;
        $class->instructor_id = 'I-101';
        $class->course_code = 'Fil 1';
        $class->acad_term_id = '181901';
        $class->section = 'N/A';
        $class->day = 'M';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->status = 'On-going';
        $class->save();

        $class = new SClass;
        $class->class_id = 28;
        $class->instructor_id = 'I-100';
        $class->course_code = 'IntroComp';
        $class->acad_term_id = '181901';
        $class->section = 'N/A';
        $class->day = 'M';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->status = 'On-going';
        $class->save();

        $class = new SClass;
        $class->class_id = 29;
        $class->instructor_id = 'I-101';
        $class->course_code = 'Math 1';
        $class->acad_term_id = '181901';
        $class->section = 'N/A';
        $class->day = 'T';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->status = 'On-going';
        $class->save();

        $class = new SClass;
        $class->class_id = 30;
        $class->instructor_id = 'I-103';
        $class->course_code = 'ComPro 1';
        $class->acad_term_id = '181901';
        $class->section = 'N/A';
        $class->day = 'T';
        $class->time_start = '13:00:00';
        $class->time_end = '18:00:00';
        $class->status = 'On-going';
        $class->save();

        $class = new SClass;
        $class->class_id = 31;
        $class->instructor_id = 'I-102';
        $class->course_code = 'Art 1';
        $class->acad_term_id = '181901';
        $class->section = 'N/A';
        $class->day = 'W';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->status = 'On-going';
        $class->save();

        $class = new SClass;
        $class->class_id = 32;
        $class->instructor_id = 'I-102';
        $class->course_code = 'Philit';
        $class->acad_term_id = '181901';
        $class->section = 'N/A';
        $class->day = 'W';
        $class->time_start = '13:00:00';
        $class->time_end = '15:00:00';
        $class->status = 'On-going';
        $class->save();

        $class = new SClass;
        $class->class_id = 33;
        $class->instructor_id = 'I-102';
        $class->course_code = 'PE1';
        $class->acad_term_id = '181901';
        $class->section = 'N/A';
        $class->day = 'TH';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->status = 'On-going';
        $class->save();

        $class = new SClass;
        $class->class_id = 34;
        $class->instructor_id = 'I-101';
        $class->course_code = 'Eng 1';
        $class->acad_term_id = '181901';
        $class->section = 'N/A';
        $class->day = 'TH';
        $class->time_start = '13:00:00';
        $class->time_end = '15:00:00';
        $class->status = 'On-going';
        $class->save();

        $class = new SClass;
        $class->class_id = 35;
        $class->instructor_id = 'I-102';
        $class->course_code = 'NSTP1';
        $class->acad_term_id = '181901';
        $class->section = 'N/A';
        $class->day = 'F';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->status = 'On-going';
        $class->save();
    }
}
