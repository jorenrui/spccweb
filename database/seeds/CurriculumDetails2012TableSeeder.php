<?php

use App\Models\CurriculumDetails;

use Illuminate\Database\Seeder;

class CurriculumDetails2012TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curriculum_details')->delete();

        /* 2012 Curriculum */

        /* 1st Year 1st Sem */
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 1;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ENG 1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 2;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'HUM 1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 3;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'MATH 1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 4;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'SOCSCI 1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 5;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 111';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 6;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 112';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 7;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 113';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 8;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'PE 1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 9;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'NSTP 1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        /* 1st Year 2nd Sem */
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 10;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ENG 2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 11;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'HUM 2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 12;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'MATH 2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 13;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'SOCSCI 2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 14;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 121';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 15;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 122';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 16;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 123';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 17;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'PE 2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 18;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'NSTP 2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        /* 2nd Year 1st Sem */
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 19;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ENG 3';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 20;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'FIL 1';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 21;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'MATH 3';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 22;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'NATSCI 1';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 23;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 211';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 24;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 212';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 25;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 213';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 26;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'PE 3';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        /* 2nd Year 2nd Sem */
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 27;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ENG 4';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 28;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'FIL 2';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 29;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'NATSCI 2';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 30;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 221';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 31;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 223';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 32;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 224';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 33;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 225';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 34;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'PE 4';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        /** 3rd Year 1st Sem **/
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 35;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'HUM 3';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 36;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'SOCSCI 3';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 37;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'MATH 4';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 38;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 311';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 39;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 312';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 40;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 313';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 41;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ITELE 1';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 42;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ITELE 2';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        /** 3rd Year 2nd Sem **/
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 43;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'SOCSCI 4';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 44;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'SOCSCI 5';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 45;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 321';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 46;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 322';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 47;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 323';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 48;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ITELE 3';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 49;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ELE 1';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 50;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ELE 2';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        /** 4th Year 1st Sem **/
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 51;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 411';
        $cur_details->sy = 4;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 52;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 412';
        $cur_details->sy = 4;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 53;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 413';
        $cur_details->sy = 4;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 54;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ITELE 4';
        $cur_details->sy = 4;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 55;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ELE 3';
        $cur_details->sy = 4;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        /** 4th Year 2nd Sem **/
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 56;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 421';
        $cur_details->sy = 4;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 57;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 422';
        $cur_details->sy = 4;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 58;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT 423';
        $cur_details->sy = 4;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();
    }
}
