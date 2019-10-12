<?php

use App\Models\Prerequisite;

use Illuminate\Database\Seeder;

class Prerequisite2018TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 2018 Curriculum */

        /* 1st Year 2nd Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 29;
        $prereq->course_code = 'ComPro1';
        $prereq->curriculum_details_id = 70;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 30;
        $prereq->course_code = 'Art1';
        $prereq->curriculum_details_id = 72;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 31;
        $prereq->course_code = 'PE 1';
        $prereq->curriculum_details_id = 73;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 32;
        $prereq->course_code = 'NSTP 1';
        $prereq->curriculum_details_id = 74;
        $prereq->save();

        /* 2nd Year 1st Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 33;
        $prereq->course_code = 'ComPro2';
        $prereq->curriculum_details_id = 76;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 34;
        $prereq->course_code = 'ComPro2';
        $prereq->curriculum_details_id = 77;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 35;
        $prereq->course_code = 'IntroComp';
        $prereq->curriculum_details_id = 78;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 36;
        $prereq->course_code = 'Math1';
        $prereq->curriculum_details_id = 79;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 37;
        $prereq->course_code = 'Math1';
        $prereq->curriculum_details_id = 80;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 38;
        $prereq->course_code = 'PE 2';
        $prereq->curriculum_details_id = 81;
        $prereq->save();

        /* 2nd Year 2nd Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 39;
        $prereq->course_code = 'PE 3';
        $prereq->curriculum_details_id = 89;
        $prereq->save();

        /* 3rd Year 1st Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 40;
        $prereq->course_code = 'Net1';
        $prereq->curriculum_details_id = 92;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 41;
        $prereq->course_code = 'Intech1';
        $prereq->curriculum_details_id = 93;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 42;
        $prereq->course_code = 'QuanMet';
        $prereq->curriculum_details_id = 93;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 43;
        $prereq->course_code = 'Intech1';
        $prereq->curriculum_details_id = 94;
        $prereq->save();

        /* 3rd Year 2nd Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 44;
        $prereq->course_code = 'SIA1';
        $prereq->curriculum_details_id = 98;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 45;
        $prereq->course_code = 'Intech2';
        $prereq->curriculum_details_id = 100;
        $prereq->save();

        /* 4th Year 1st Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 46;
        $prereq->course_code = 'IAS1';
        $prereq->curriculum_details_id = 104;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 47;
        $prereq->course_code = 'IAS1';
        $prereq->curriculum_details_id = 106;
        $prereq->save();

        /* 4th Year 2nd Semester */
        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 48;
        $prereq->course_code = 'ITProj1';
        $prereq->curriculum_details_id = 108;
        $prereq->save();

        $prereq = new Prerequisite;
        $prereq->prerequisite_id = 49;
        $prereq->course_code = 'SIA1';
        $prereq->curriculum_details_id = 110;
        $prereq->save();
    }
}
