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
        $cur_details->course_code = 'ENG1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 2;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'HUM1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 3;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'MATH1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 4;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'SOCSCI1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 5;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT111';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 6;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT112';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 7;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT113';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 8;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'PE1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 9;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'NSTP1';
        $cur_details->sy = 1;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        /* 1st Year 2nd Sem */
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 10;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ENG2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 11;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'HUM2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 12;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'MATH2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 13;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'SOCSCI2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 14;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT121';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 15;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT122';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 16;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT123';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 17;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'PE2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 18;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'NSTP2';
        $cur_details->sy = 1;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        /* 2nd Year 1st Sem */
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 19;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ENG3';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 20;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'FIL1';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 21;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'MATH3';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 22;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'NATSCI1';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 23;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT211';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 24;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT212';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 25;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT213';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 26;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'PE3';
        $cur_details->sy = 2;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        /* 2nd Year 2nd Sem */
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 27;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ENG4';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 28;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'FIL2';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 29;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'NATSCI2';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 30;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT221';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 31;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT223';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 32;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT224';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 33;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT225';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 34;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'PE4';
        $cur_details->sy = 2;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        /** 3rd Year 1st Sem **/
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 35;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'HUM3';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 36;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'SOCSCI3';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 37;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'MATH4';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 38;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT311';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 39;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT312';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 40;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT313';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 41;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ITELE1';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 42;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ITELE2';
        $cur_details->sy = 3;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        /** 3rd Year 2nd Sem **/
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 43;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'SOCSCI4';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 44;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'SOCSCI5';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 45;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT321';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 46;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT322';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 47;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT323';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 48;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ITELE3';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 49;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ELE1';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 50;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ELE2';
        $cur_details->sy = 3;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        /** 4th Year 1st Sem **/
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 51;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT411';
        $cur_details->sy = 4;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 52;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT412';
        $cur_details->sy = 4;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 53;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT413';
        $cur_details->sy = 4;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = false;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 54;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ITELE4';
        $cur_details->sy = 4;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 55;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'ELE3';
        $cur_details->sy = 4;
        $cur_details->semester = 1;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        /** 4th Year 2nd Sem **/
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 56;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT421';
        $cur_details->sy = 4;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 57;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT422';
        $cur_details->sy = 4;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();

        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_details_id = 58;
        $cur_details->curriculum_id = 2012;
        $cur_details->course_code = 'IT423';
        $cur_details->sy = 4;
        $cur_details->semester = 2;
        $cur_details->is_year_standing = true;
        $cur_details->save();
    }
}
