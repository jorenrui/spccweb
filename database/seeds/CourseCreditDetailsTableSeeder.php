<?php

use App\Models\CourseCreditationDetails;

use Illuminate\Database\Seeder;

class CourseCreditDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_credit_details')->delete();

        /* Joeylene's Credited Courses
         * Credit ID: 1 (PLM)
         * =============================*/

        // Acad Term: 141501 (2014-2015 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ENG 101';
        $ccourse->description = 'English Proficiency Instruction I';
        $ccourse->grade = 2.50;
        $ccourse->units = 4;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 1; // ENG 1
        $ccourse->acad_term_id = 141501;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'FIL 101';
        $ccourse->description = 'Komunikasyon sa Akademikong Filipino';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 20; // FIL 1
        $ccourse->acad_term_id = 141501;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CHEM 11';
        $ccourse->description = 'General Chemistry I (Lecture)';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 141501;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CHEM 11.1A';
        $ccourse->description = 'General Chemistry I (Laboratory)';
        $ccourse->grade = 2.25;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 141501;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOCSCI 101';
        $ccourse->description = 'General Psychology';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 13; // SOCSCI 2
        $ccourse->acad_term_id = 141501;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 111';
        $ccourse->description = 'Introduction to Information Technology';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 6; // IT 112
        $ccourse->acad_term_id = 141501;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 112';
        $ccourse->description = 'College Algebra';
        $ccourse->grade = 2.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 3; // MATH 1
        $ccourse->acad_term_id = 141501;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 113';
        $ccourse->description = 'Plane and Spherical Trigonometry';
        $ccourse->grade = 2.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 12; // MATH 2
        $ccourse->acad_term_id = 141501;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE 11';
        $ccourse->description = 'Foundation of Physical Activities';
        $ccourse->grade = 1.00;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 8; // PE 1
        $ccourse->acad_term_id = 141501;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'NSTP 1';
        $ccourse->description = 'National Service Trng Prog - ROTC1';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 9; // NSTP 1
        $ccourse->acad_term_id = 141501;
        $ccourse->save();

        // Acad Term: 141502 (2014-2015 2nd Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ENG 102';
        $ccourse->description = 'English Proficiency Instruction II';
        $ccourse->grade = 1.75;
        $ccourse->units = 4;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 10; // ENG 2
        $ccourse->acad_term_id = 141502;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'FIL 102';
        $ccourse->description = 'Pagbasa at Pagsulat Tungo sa Pananaliksik';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 28; // FIL 2
        $ccourse->acad_term_id = 141502;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 121';
        $ccourse->description = 'Fundamentals of Problem Solving and Programming I (Lecture)';
        $ccourse->grade = 1.50;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 5; // IT 111
        $ccourse->acad_term_id = 141502;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 121.1';
        $ccourse->description = 'Fundamentals of Problem Solving and Programming I (Laboratory)';
        $ccourse->grade = 1.50;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 141502;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 122';
        $ccourse->description = 'Presentation Skills in Information Technology';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 7; // IT 113
        $ccourse->acad_term_id = 141502;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 123';
        $ccourse->description = 'Values and Professional Ethics';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 51; // IT 411
        $ccourse->acad_term_id = 141502;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 122';
        $ccourse->description = 'Advanced Algebra';
        $ccourse->grade = 2.50;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 141502;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 123';
        $ccourse->description = 'Solid Mensuration';
        $ccourse->grade = 2.00;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 141502;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 124';
        $ccourse->description = 'Analytic Geometry';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 141502;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE 13C';
        $ccourse->description = 'Table Tennis';
        $ccourse->grade = 1.25;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 17; // PE 2
        $ccourse->acad_term_id = 141502;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'NSTP 2';
        $ccourse->description = 'National Service Trng Prog - ROTC2';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 18; // NSTP 2
        $ccourse->acad_term_id = 141502;
        $ccourse->save();

        // Acad Term: 151601 (2015-2016 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ENG 203';
        $ccourse->description = 'Technical Communication';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 19; // ENG 3
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 121';
        $ccourse->description = 'Physics I (Lecture)';
        $ccourse->grade = 2.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 22; // NATSCI 1
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 121.1';
        $ccourse->description = 'Physics I (Laboratory)';
        $ccourse->grade = 2.25;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOCSCI 102';
        $ccourse->description = 'Politics and Governance with Philippine Constitution';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 43; // SOCSCI 4
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 211';
        $ccourse->description = 'Fundamentals of Problem Solving and Programming II (Lecture)';
        $ccourse->grade = 1.75;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 14; // IT 121
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 211.1';
        $ccourse->description = 'Fundamentals of Problem Solving and Programming II (Laboratory)';
        $ccourse->grade = 1.75;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 212';
        $ccourse->description = 'Principles of File Organization (Lecture)';
        $ccourse->grade = 1.50;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 212.1';
        $ccourse->description = 'Principles of File Organization (Laboratory)';
        $ccourse->grade = 1.00;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 211';
        $ccourse->description = 'Probability and Statistics';
        $ccourse->grade = 3.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 21; // MATH 3
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 212';
        $ccourse->description = 'Differential Calculus';
        $ccourse->grade = 2.75;
        $ccourse->units = 4;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 37; // MATH 4
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE 12E';
        $ccourse->description = 'Soccer';
        $ccourse->grade = 1.75;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 26; // PE 3
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        // Acad Term: 151602 (2015-2016 2nd Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ENG 201';
        $ccourse->description = 'Rhetoric';
        $ccourse->grade = 1.25;
        $ccourse->units = 5;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 27; // ENG 4
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 211';
        $ccourse->description = 'Physics II (Lecture)';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 29; // NATSCI 2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 211.1';
        $ccourse->description = 'Physics II (Laboratory)';
        $ccourse->grade = 1.50;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOCSCI 201';
        $ccourse->description = 'Introduction to Economics with Taxation & Agrarian Reform';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 221';
        $ccourse->description = 'Data Structures (Lecture)';
        $ccourse->grade = 1.25;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 15; // IT 122
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 221.1';
        $ccourse->description = 'Data Structures (Laboratory)';
        $ccourse->grade = 1.00;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 222';
        $ccourse->description = 'Discrete Mathematics';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 45; // IT 321
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'HUM 21';
        $ccourse->description = 'Art, Man and Society';
        $ccourse->grade = 1.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 2; // HUM 1
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 222';
        $ccourse->description = 'Integral Calculus';
        $ccourse->grade = 2.25;
        $ccourse->units = 4;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE 13K';
        $ccourse->description = 'Touch Rugby';
        $ccourse->grade = 1.50;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 34; // PE 4
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        // Acad Term: 161701 (2016-2017 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'FIL 22';
        $ccourse->description = 'Ang Buhay at Mga Sinulat ni Dr. Jose Rizal';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 44; // SOCSCI 5
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOCSCI 202';
        $ccourse->description = 'Society and Culture with Family Planning';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 4; // SOCSCI 1
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 311';
        $ccourse->description = 'Quality Standards and Management';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 52; // IT 412
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 312';
        $ccourse->description = 'System Analysis and Design';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 47; // IT 323
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 313';
        $ccourse->description = 'Principles of Programming Languages (Lecture)';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 24; // IT 212
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 313.1';
        $ccourse->description = 'Principles of Programming Languages (Laboratory)';
        $ccourse->grade = 1.25;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 314';
        $ccourse->description = 'Logic Design and Digital Computer Circuits';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'HUM 23';
        $ccourse->description = 'History of Philippine Art';
        $ccourse->grade = 1.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        // Acad Term: 161702 (2016-2017 2nd Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 321';
        $ccourse->description = 'Special Topics';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = true;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 54; // ITELE 4
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 322';
        $ccourse->description = 'Principles of Operating Systems';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 16; // IT 123
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 323';
        $ccourse->description = 'Introduction to Accounting for CS';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 38; // IT 311
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 324';
        $ccourse->description = 'Database Management System';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 32; // IT 224
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 325';
        $ccourse->description = 'Computer Organization and Assembly Language (Lecture)';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 33; // IT 225
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 325.1';
        $ccourse->description = 'Computer Organization and Assembly Language (Laboratory)';
        $ccourse->grade = 2.00;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 326';
        $ccourse->description = 'Design Analysis of Algorithms';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'HIST 101';
        $ccourse->description = 'Philippine History';
        $ccourse->grade = 3.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 36; // SOCSCI 3
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHILO 11';
        $ccourse->description = 'Introduction to Philosophy';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 11; // HUM 2
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        // Acad Term: 161709 (2016-2017 Summer)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 195';
        $ccourse->description = 'Practicum (240 Hrs)';
        $ccourse->grade = 1.25;
        $ccourse->units = 6;
        $ccourse->is_inc = true;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161709;
        $ccourse->save();

        // Acad Term: 171801 (2017-2018 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 401';
        $ccourse->description = 'CS Elective I';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 41; // ITELE 1
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 402';
        $ccourse->description = 'CS Elective II';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = 42; // ITELE 2
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 411';
        $ccourse->description = 'Data Communication and Networking';
        $ccourse->grade = 5.00;
        $ccourse->units = 0;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 412';
        $ccourse->description = 'Software Engineering';
        $ccourse->grade = 5.00;
        $ccourse->units = 0;
        $ccourse->is_inc = true;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 413';
        $ccourse->description = 'Research Writing I';
        $ccourse->grade = 5.00;
        $ccourse->units = 0;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 414';
        $ccourse->description = 'Automata and Language Theory';
        $ccourse->grade = 5.00;
        $ccourse->units = 0;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 501';
        $ccourse->description = 'Free Elective I';
        $ccourse->grade = 5.00;
        $ccourse->units = 0;
        $ccourse->is_inc = true;
        $ccourse->credit_id = 1;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        /* Joeylene's Credited Courses
         * Credit ID: 2 (TIP)
         * =============================*/

        // Acad Term: 181901 (2018-2019 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CS 100';
        $ccourse->description = 'Fundamentals of Algorithms';
        $ccourse->grade = 1.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 2;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'HUM 002';
        $ccourse->description = 'Logic';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 2;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ITE 007';
        $ccourse->description = 'Database Systems 2 (ORACLE 2)';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 2;
        $ccourse->curriculum_details_id = 40; // IT 313
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'LIT 203';
        $ccourse->description = 'Philippine Literature';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 2;
        $ccourse->curriculum_details_id = 35; // HUM 3
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'MATH 027';
        $ccourse->description = 'Number Theory';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 2;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        /* Geraldine's Credited Courses
         * Credit ID: 3 (PLM)
         * =============================*/

        // Acad Term: 151601 (2015-2016 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CHEM 11';
        $ccourse->description = 'General Chemistry (lec)';
        $ccourse->grade = 2.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CHEM 11.1A';
        $ccourse->description = 'General Chemistry (lab)';
        $ccourse->grade = 2.25;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ENG 101';
        $ccourse->description = 'English Proficiency Instruction I';
        $ccourse->grade = 1.75;
        $ccourse->units = 4;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 1; // ENG1
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 111.1';
        $ccourse->description = 'Engineering Drawing I';
        $ccourse->grade = 3.00;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 112';
        $ccourse->description = 'College Algebra';
        $ccourse->grade = 3.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 3; // MATH1
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 113';
        $ccourse->description = 'Plane and Spherical Trigonometry';
        $ccourse->grade = 2.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 12; // MATH2
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'FIL 101';
        $ccourse->description = 'Komunikasyon sa Akademikong Filipino';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 20; // FIL1
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'HIST 101';
        $ccourse->description = 'Philippine History';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 36; // SOCSCI3
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOC SCI 102';
        $ccourse->description = 'Politics and Governance with Philippine Constitution';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 43; // SOCSCI4
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE11';
        $ccourse->description = 'Foundation of Physical Activities';
        $ccourse->grade = 1.00;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 8; // PE1
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'NSTP1';
        $ccourse->description = 'National Service Training Program - ROTC1';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 9; // NSTP1
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        // Acad Term: 151602 (2015-2016 2nd Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ENG 102';
        $ccourse->description = 'English Proficiency Instruction II';
        $ccourse->grade = 2.25;
        $ccourse->units = 4;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 10; // ENG2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 121.1';
        $ccourse->description = 'Engineering Drawing II';
        $ccourse->grade = 2.50;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 122';
        $ccourse->description = 'Advanced Algebra';
        $ccourse->grade = 2.00;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 123';
        $ccourse->description = 'Solid Mensuration';
        $ccourse->grade = 2.25;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 124';
        $ccourse->description = 'Analytic Geometry';
        $ccourse->grade = 2.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'FIL 102';
        $ccourse->description = 'Pagbasa at Pagsulat Tungo sa Pananaliksik';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 28; // FIL2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHILO 11';
        $ccourse->description = 'Introduction to Philosophy';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 11; // HUM2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOC SCI 101';
        $ccourse->description = 'General Psychology';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 13; // SOCSCI2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 121';
        $ccourse->description = 'Physics I (lec)';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 22; // NATSCI1
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 121.1';
        $ccourse->description = 'Physics I (lab)';
        $ccourse->grade = 2.25;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE12E';
        $ccourse->description = 'Soccer';
        $ccourse->grade = 1.50;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 17; // PE2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'NSTP2';
        $ccourse->description = 'National Service Training Program - ROTC2';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 18; // NSTP2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        // Acad Term: 161701 (2016-2017 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CPE 211';
        $ccourse->description = 'Discrete Mathematics';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 45; // IT321
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ENG 23';
        $ccourse->description = 'Technical Writing';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 27; // ENG4
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'MATH 204';
        $ccourse->description = 'Differential Calculus';
        $ccourse->grade = 2.75;
        $ccourse->units = 4;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 37; // MATH4
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ETHICS 100';
        $ccourse->description = 'Ethics';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 231';
        $ccourse->description = 'Physics II (lec)';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 29; // NATSCI2
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 231.1';
        $ccourse->description = 'Physics II (lab)';
        $ccourse->grade = 1.75;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 315.1';
        $ccourse->description = 'Computer-Aided Drafting';
        $ccourse->grade = 1.75;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOC SCI 201';
        $ccourse->description = 'Intro to Econimics with Taxation & Agrarian Reform';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE13D';
        $ccourse->description = 'Bowling';
        $ccourse->grade = 1.25;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 26; // PE3
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        // Acad Term: 161702 (2016-2017 2nd Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 225.1';
        $ccourse->description = 'Computer Fundamentals  and Programming';
        $ccourse->grade = 1.75;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'MATH 206';
        $ccourse->description = 'Integral Calculus';
        $ccourse->grade = 1.75;
        $ccourse->units = 4;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 223';
        $ccourse->description = 'Fundamentals of Material and Engineering';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'RIZAL 101';
        $ccourse->description = 'Life and Works of Rizal';
        $ccourse->grade = 2.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 44; // SOCSCI5
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'HUM 21';
        $ccourse->description = 'Art, Man and Society';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 2; // HUM1
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOC SCI 202';
        $ccourse->description = 'Society and Culture with Family Planning';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 4; // SOCSCI1
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 322';
        $ccourse->description = 'Safety Management';
        $ccourse->grade = 1.75;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE13K';
        $ccourse->description = 'Volleyball';
        $ccourse->grade = 1.00;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 34; // PE4
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        // Acad Term: 171801 (2017-2018 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ECE 311';
        $ccourse->description = 'Electronic Devices and Circuits (lec)';
        $ccourse->grade = 5.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ECE 311.1';
        $ccourse->description = 'Electronic Devices and Circuits (lab)';
        $ccourse->grade = 1.50;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ECE 312';
        $ccourse->description = 'Vector Analysis';
        $ccourse->grade = 5.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ELE 316';
        $ccourse->description = 'Circuit Analysis I (lec)';
        $ccourse->grade = 2.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ELE 316.1';
        $ccourse->description = 'Circuit Analysis I (lab)';
        $ccourse->grade = 1.75;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 311';
        $ccourse->description = 'Differential Equations';
        $ccourse->grade = 5.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 312';
        $ccourse->description = 'Statics of Rigid Bodies';
        $ccourse->grade = 5.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 313A';
        $ccourse->description = 'Probability and Statistics';
        $ccourse->grade = 2.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 3;
        $ccourse->curriculum_details_id = 21; // MATH3
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

 		// Acad Term: 181901 (2018-2019 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CS 100';
        $ccourse->description = 'Fundamentals of Algorithms';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 4;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ITE 001';
        $ccourse->description = 'Computer Programming 1';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 4;
        $ccourse->curriculum_details_id = 5; // IT111
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'MATH 014';
        $ccourse->description = 'Fundamentals of Algorithms';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 4;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'HUM 002';
        $ccourse->description = 'Logic';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 4;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        /* Bryan's Credited Courses
         * Credit ID: 5 (PLM)
         * =============================*/

        // Acad Term: 151601 (2015-2016 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ENG 101';
        $ccourse->description = 'English Proficiency Instruction I';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 1; // ENG1
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'FIL 101';
        $ccourse->description = 'Komunikasyon sa Akademikong Filipino';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 20; // FIL 1
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CHEM 11';
        $ccourse->description = 'General Chemistry I (Lecture)';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CHEM 11.1A';
        $ccourse->description = 'General Chemistry I (Laboratory)';
        $ccourse->grade = 2.25;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOCSCI 101';
        $ccourse->description = 'General Psychology';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 13; // SOCSCI 2
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 111';
        $ccourse->description = 'Introduction to Information Technology';
        $ccourse->grade = 2.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 6; // IT 112
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 112';
        $ccourse->description = 'College Algebra';
        $ccourse->grade = 3.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 3; // MATH 1
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 113';
        $ccourse->description = 'Plane and Spherical Trigonometry';
        $ccourse->grade = 2.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 12; // MATH 2
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE 11';
        $ccourse->description = 'Foundation of Physical Activities';
        $ccourse->grade = 1.25;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 8; // PE 1
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'NSTP 1';
        $ccourse->description = 'National Service Trng Prog - ROTC1';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 9; // NSTP 1
        $ccourse->acad_term_id = 151601;
        $ccourse->save();

        // Acad Term: 151602 (2015-2016 2nd Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ENG 102';
        $ccourse->description = 'English Proficiency Instruction II';
        $ccourse->grade = 2.75;
        $ccourse->units = 4;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 10; // ENG 2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'FIL 102';
        $ccourse->description = 'Pagbasa at Pagsulat Tungo sa Pananaliksik';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 28; // FIL 2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 121';
        $ccourse->description = 'Fundamentals of Problem Solving and Programming I (Lecture)';
        $ccourse->grade = 2.50;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 5; // IT 111
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 121.1';
        $ccourse->description = 'Fundamentals of Problem Solving and Programming I (Laboratory)';
        $ccourse->grade = 2.25;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 122';
        $ccourse->description = 'Presentation Skills in Information Technology';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 7; // IT 113
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 123';
        $ccourse->description = 'Values and Professional Ethics';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 51; // IT 411
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 124';
        $ccourse->description = 'Analytic Geometry';
        $ccourse->grade = 3.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE 13C';
        $ccourse->description = 'Soccer';
        $ccourse->grade = 1.25;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 17; // PE 2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'NSTP 2';
        $ccourse->description = 'National Service Trng Prog - ROTC2';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 18; // NSTP 2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        // Acad Term: 161701 (2016-2017 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ENG 203';
        $ccourse->description = 'Technical Communication';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 19; // ENG 3
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 121';
        $ccourse->description = 'Physics I (Lecture)';
        $ccourse->grade = 3.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 22; // NATSCI 1
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 121.1';
        $ccourse->description = 'Physics I (Laboratory)';
        $ccourse->grade = 3.00;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOCSCI 102';
        $ccourse->description = 'Politics and Governance with Philippine Constitution';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 43; // SOCSCI 4
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 211';
        $ccourse->description = 'Fundamentals of Problem Solving and Programming II (Lecture)';
        $ccourse->grade = 3.00;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 14; // IT 121
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 211.1';
        $ccourse->description = 'Fundamentals of Problem Solving and Programming II (Laboratory)';
        $ccourse->grade = 3.00;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 212';
        $ccourse->description = 'Principles of File Organization (Lecture)';
        $ccourse->grade = 2.50;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 212.1';
        $ccourse->description = 'Principles of File Organization (Laboratory)';
        $ccourse->grade = 2.00;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE 12E';
        $ccourse->description = 'Volley Ball';
        $ccourse->grade = 1.75;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 26; // PE 3
        $ccourse->acad_term_id = 161701;
        $ccourse->save();

        // Acad Term: 161702 (2016-2017 2nd Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ENG 201';
        $ccourse->description = 'Rhetoric';
        $ccourse->grade = 1.75;
        $ccourse->units = 5;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 27; // ENG 4
        $ccourse->acad_term_id = 161702;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 211';
        $ccourse->description = 'Physics II (Lecture)';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 29; // NATSCI 2
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PHY 211.1';
        $ccourse->description = 'Physics II (Laboratory)';
        $ccourse->grade = 1.50;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOCSCI 201';
        $ccourse->description = 'Introduction to Economics with Taxation & Agrarian Reform';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 221';
        $ccourse->description = 'Data Structures (Lecture)';
        $ccourse->grade = 1.25;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 15; // IT 122
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 221.1';
        $ccourse->description = 'Data Structures (Laboratory)';
        $ccourse->grade = 1.00;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 222';
        $ccourse->description = 'Discrete Mathematics';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 45; // IT 321
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'HUM 21';
        $ccourse->description = 'Art, Man and Society';
        $ccourse->grade = 1.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 2; // HUM 1
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ESC 222';
        $ccourse->description = 'Integral Calculus';
        $ccourse->grade = 2.25;
        $ccourse->units = 4;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'PE 13K';
        $ccourse->description = 'Touch Rugby';
        $ccourse->grade = 1.50;
        $ccourse->units = 2;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 34; // PE 4
        $ccourse->acad_term_id = 151602;
        $ccourse->save();

        // Acad Term: 171801 (2017-2018 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'FIL 22';
        $ccourse->description = 'Ang Buhay at Mga Sinulat ni Dr. Jose Rizal';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 44; // SOCSCI 5
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'SOCSCI 202';
        $ccourse->description = 'Society and Culture with Family Planning';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 4; // SOCSCI 1
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 311';
        $ccourse->description = 'Quality Standards and Management';
        $ccourse->grade = 1.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 52; // IT 412
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 312';
        $ccourse->description = 'System Analysis and Design';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 47; // IT 323
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 313';
        $ccourse->description = 'Principles of Programming Languages (Lecture)';
        $ccourse->grade = 2.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 24; // IT 212
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 313.1';
        $ccourse->description = 'Principles of Programming Languages (Laboratory)';
        $ccourse->grade = 1.75;
        $ccourse->units = 1;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'HUM 23';
        $ccourse->description = 'History of Philippine Art';
        $ccourse->grade = 1.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171801;
        $ccourse->save();

        // Acad Term: 171802 (2017-2018 2nd Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 321';
        $ccourse->description = 'Special Topics';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = true;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 54; // ITELE 4
        $ccourse->acad_term_id = 171802;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 323';
        $ccourse->description = 'Introduction to Accounting for CS';
        $ccourse->grade = 3.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 38; // IT 311
        $ccourse->acad_term_id = 171802;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 324';
        $ccourse->description = 'Database Management System';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 32; // IT 224
        $ccourse->acad_term_id = 171802;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'CSC 326';
        $ccourse->description = 'Design Analysis of Algorithms';
        $ccourse->grade = 2.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 171802;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'HIST 101';
        $ccourse->description = 'Philippine History';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 5;
        $ccourse->curriculum_details_id = 36; // SOCSCI 3
        $ccourse->acad_term_id = 171802;
        $ccourse->save();


        /* Bryan's Credited Courses
         * Credit ID: 6 (TIP)
         * =============================*/

        // Acad Term: 181901 (2018-2019 1st Semester)

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'HUM 002';
        $ccourse->description = 'Logic';
        $ccourse->grade = 2.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 6;
        $ccourse->curriculum_details_id = null;
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'LIT 203';
        $ccourse->description = 'Philippine Literature';
        $ccourse->grade = 2.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 6;
        $ccourse->curriculum_details_id = 35; // HUM 3
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ITE 005';
        $ccourse->description = 'Operating Systems';
        $ccourse->grade = 1.75;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 6;
        $ccourse->curriculum_details_id = 16; // IT 123
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ITE 004';
        $ccourse->description = 'Object-Oriented Programming 2';
        $ccourse->grade = 2.25;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 6;
        $ccourse->curriculum_details_id = 24; // IT 212
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'IT 200';
        $ccourse->description = 'Multimedia Systems Development';
        $ccourse->grade = 2.00;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 6;
        $ccourse->curriculum_details_id = 39; // HUM 3
        $ccourse->acad_term_id = 181901;
        $ccourse->save();

        $ccourse = new CourseCreditationDetails;
        $ccourse->course_code = 'ECE 504B';
        $ccourse->description = 'Principles of Data Communication and Networking';
        $ccourse->grade = 2.50;
        $ccourse->units = 3;
        $ccourse->is_inc = false;
        $ccourse->credit_id = 6;
        $ccourse->curriculum_details_id = 25; // IT 213
        $ccourse->acad_term_id = 181901;
        $ccourse->save();
    }
}
