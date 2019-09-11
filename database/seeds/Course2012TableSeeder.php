<?php

use App\Models\Course;

use Illuminate\Database\Seeder;

class Course2012TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course')->delete();

        /** 2012 Curriculum **/

        $course = new Course;
        $course->course_code = 'ENG1';
        $course->description = 'Communication Arts';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'HUM1';
        $course->description = 'Art, Man, and Society';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'MATH1';
        $course->description = 'College Algebra';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'SOCSCI1';
        $course->description = 'Society and Culture with Family Planning';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT111';
        $course->description = 'Programming Fundamentals 1';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT112';
        $course->description = 'Computing Fundamentals';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT113';
        $course->description = 'Productivity Tools';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'PE1';
        $course->description = 'Physical Fitness 1';
        $course->units = 2;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'NSTP1';
        $course->description = 'National Service Training Program 1';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ENG2';
        $course->description = 'Writing in Discipline';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'HUM2';
        $course->description = 'Introduction to Philosophy';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'MATH2';
        $course->description = 'Plane and Spherical Trigonometry';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'SOCSCI2';
        $course->description = 'General Psychology with Drug Addiction';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT121';
        $course->description = 'Programming Fundamentals 2';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT122';
        $course->description = 'Data Structure';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT123';
        $course->description = 'Applied Operating Systems';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'PE2';
        $course->description = 'Physical Fitness 2';
        $course->units = 2;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'NSTP2';
        $course->description = 'National Service Training Program 2';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ENG3';
        $course->description = 'Speech and Oral Communication';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'FIL1';
        $course->description = 'Komunikasyon sa Akademikong Filipino';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'MATH3';
        $course->description = 'Statistics and Probability';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'NATSCI1';
        $course->description = 'College Physics 1';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT211';
        $course->description = 'Programming Fundamentals 3';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT212';
        $course->description = 'Object Oriented Programming';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT213';
        $course->description = 'Networking Fundamentals';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'PE3';
        $course->description = 'Physical Fitness 3';
        $course->units = 2;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ENG4';
        $course->description = 'Technical Writing';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'FIL2';
        $course->description = 'Pagbasa at Pagsulat Tungo sa Pananaliksik';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'NATSCI2';
        $course->description = 'College Physics 2';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT221';
        $course->description = 'Web Programming';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT223';
        $course->description = 'Routing Protocols and Concepts';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT224';
        $course->description = 'Database Applications';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT225';
        $course->description = 'Computer Systems and Organization';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'PE4';
        $course->description = 'Physical Fitness 4';
        $course->units = 2;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'HUM3';
        $course->description = 'Philippine Literature';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'SOCSCI3';
        $course->description = 'Philippine History';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'MATH4';
        $course->description = 'Differential Calculus';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT311';
        $course->description = 'Accounting Fundamentals';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT312';
        $course->description = 'Multimedia Systems';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT313';
        $course->description = 'Relational Database Management Systems';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'ITELE1';
        $course->description = 'IT Elective 1';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'ITELE2';
        $course->description = 'IT Elective 2';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'SOCSCI4';
        $course->description = 'Philippine Government and Constitution';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'SOCSCI5';
        $course->description = 'Rizal\'s Life, Works and Writings';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT321';
        $course->description = 'Discrete Mathematics';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT322';
        $course->description = 'Web Development';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT323';
        $course->description = 'Systems Analysis and Design';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ITELE3';
        $course->description = 'IT Elective 3';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'ELE1';
        $course->description = 'Free Elective 1';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'ELE2';
        $course->description = 'Free Elective 2';
        $course->units = 3;
        $course->lab_units = 3;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT411';
        $course->description = 'Professional Ethics with Quality Consciousness';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT412';
        $course->description = 'Information Assurance and Security';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT413';
        $course->description = 'Software Engineering';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ITELE4';
        $course->description = 'IT Elective 4';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ELE3';
        $course->description = 'Free Elective 3 (Foreign Language)';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT421';
        $course->description = 'Internship (500 hours)';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT422';
        $course->description = 'Field Trip and Seminars';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT423';
        $course->description = 'Capstone Project';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();
    }
}
