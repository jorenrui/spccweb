<?php

use App\Models\Prerequisite;

use Illuminate\Database\Seeder;

class Prerequisite2012TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prerequisite')->delete();

        /* 2012 Curriculum */

        /* 1nd Year 2nd Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 1;
        $prereq->course_code = 'ENG1';
        $prereq->curriculum_details_id = 10;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 2;
        $prereq->course_code = 'IT111';
        $prereq->curriculum_details_id = 14;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 3;
        $prereq->course_code = 'IT111';
        $prereq->curriculum_details_id = 15;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 4;
        $prereq->course_code = 'IT112';
        $prereq->curriculum_details_id = 16;
        $prereq->save();

        /* 2nd Year 1st Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 5;
        $prereq->course_code = 'ENG2';
        $prereq->curriculum_details_id = 19;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 6;
        $prereq->course_code = 'MATH1';
        $prereq->curriculum_details_id = 21;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 7;
        $prereq->course_code = 'MATH1';
        $prereq->curriculum_details_id = 22;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 8;
        $prereq->course_code = 'MATH2';
        $prereq->curriculum_details_id = 22;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 9;
        $prereq->course_code = 'IT111';
        $prereq->curriculum_details_id = 23;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 10;
        $prereq->course_code = 'IT122';
        $prereq->curriculum_details_id = 24;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 11;
        $prereq->course_code = 'IT123';
        $prereq->curriculum_details_id = 25;
        $prereq->save();

        /* 2nd Year 2nd Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 12;
        $prereq->course_code = 'ENG3';
        $prereq->curriculum_details_id = 27;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 13;
        $prereq->course_code = 'FIL1';
        $prereq->curriculum_details_id = 28;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 14;
        $prereq->course_code = 'NATSCI1';
        $prereq->curriculum_details_id = 29;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 15;
        $prereq->course_code = 'IT111';
        $prereq->curriculum_details_id = 30;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 16;
        $prereq->course_code = 'IT213';
        $prereq->curriculum_details_id = 31;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 17;
        $prereq->course_code = 'IT123';
        $prereq->curriculum_details_id = 32;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 18;
        $prereq->course_code = 'IT123';
        $prereq->curriculum_details_id = 33;
        $prereq->save();

        /* 3rd Year 1st Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 19;
        $prereq->course_code = 'MATH1';
        $prereq->curriculum_details_id = 37;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 20;
        $prereq->course_code = 'MATH2';
        $prereq->curriculum_details_id = 37;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 21;
        $prereq->course_code = 'MATH1';
        $prereq->curriculum_details_id = 38;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 22;
        $prereq->course_code = 'IT213';
        $prereq->curriculum_details_id = 39;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 23;
        $prereq->course_code = 'IT224';
        $prereq->curriculum_details_id = 40;
        $prereq->save();

        /* 3rd Year 2nd Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 24;
        $prereq->course_code = 'MATH4';
        $prereq->curriculum_details_id = 45;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 25;
        $prereq->course_code = 'IT221';
        $prereq->curriculum_details_id = 46;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 26;
        $prereq->course_code = 'IT313';
        $prereq->curriculum_details_id = 47;
        $prereq->save();

        /* 4th Year 1st Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 27;
        $prereq->course_code = 'IT313';
        $prereq->curriculum_details_id = 52;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 28;
        $prereq->course_code = 'IT323';
        $prereq->curriculum_details_id = 53;
        $prereq->save();
    }
}
