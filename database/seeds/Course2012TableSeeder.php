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
        $course->course_code = 'ENG 1';
        $course->description = 'Communication Arts';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'HUM 1';
        $course->description = 'Art, Man, and Society';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'MATH 1';
        $course->description = 'College Algebra';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'SOCSCI 1';
        $course->description = 'Society and Culture with Family Planning';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 111';
        $course->description = 'Programming Fundamentals 1';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 112';
        $course->description = 'Computing Fundamentals';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 113';
        $course->description = 'Productivity Tools';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'PE 1';
        $course->description = 'Physical Fitness 1';
        $course->units = 2;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'NSTP 1';
        $course->description = 'National Service Training Program 1';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ENG 2';
        $course->description = 'Writing in Discipline';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'HUM 2';
        $course->description = 'Introduction to Philosophy';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'MATH 2';
        $course->description = 'Plane and Spherical Trigonometry';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'SOCSCI 2';
        $course->description = 'General Psychology with Drug Addiction';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 121';
        $course->description = 'Programming Fundamentals 2';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 122';
        $course->description = 'Data Structure';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 123';
        $course->description = 'Applied Operating Systems';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'PE 2';
        $course->description = 'Physical Fitness 2';
        $course->units = 2;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'NSTP 2';
        $course->description = 'National Service Training Program 2';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ENG 3';
        $course->description = 'Speech and Oral Communication';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'FIL 1';
        $course->description = 'Komunikasyon sa Akademikong Filipino';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'MATH 3';
        $course->description = 'Statistics and Probability';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'NATSCI 1';
        $course->description = 'College Physics 1';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 211';
        $course->description = 'Programming Fundamentals 3';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 212';
        $course->description = 'Object Oriented Programming';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 213';
        $course->description = 'Networking Fundamentals';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'PE 3';
        $course->description = 'Physical Fitness 3';
        $course->units = 2;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ENG 4';
        $course->description = 'Technical Writing';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'FIL 2';
        $course->description = 'Pagbasa at Pagsulat Tungo sa Pananaliksik';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'NATSCI 2';
        $course->description = 'College Physics 2';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 221';
        $course->description = 'Web Programming';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 223';
        $course->description = 'Routing Protocols and Concepts';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 224';
        $course->description = 'Database Applications';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 225';
        $course->description = 'Computer Systems and Organization';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'PE 4';
        $course->description = 'Physical Fitness 4';
        $course->units = 2;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'HUM 3';
        $course->description = 'Philippine Literature';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'SOCSCI 3';
        $course->description = 'Philippine History';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'MATH 4';
        $course->description = 'Differential Calculus';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 311';
        $course->description = 'Accounting Fundamentals';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 312';
        $course->description = 'Multimedia Systems';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 313';
        $course->description = 'Relational Database Management Systems';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'ITELE 1';
        $course->description = 'IT Elective 1';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'ITELE 2';
        $course->description = 'IT Elective 2';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'SOCSCI 4';
        $course->description = 'Philippine Government and Constitution';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'SOCSCI 5';
        $course->description = 'Rizal\'s Life, Works and Writings';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 321';
        $course->description = 'Discrete Mathematics';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 322';
        $course->description = 'Web Development';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 323';
        $course->description = 'Systems Analysis and Design';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ITELE 3';
        $course->description = 'IT Elective 3';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'ELE 1';
        $course->description = 'Free Elective 1';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'ELE 2';
        $course->description = 'Free Elective 2';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 411';
        $course->description = 'Professional Ethics with Quality Consciousness';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 412';
        $course->description = 'Information Assurance and Security';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 413';
        $course->description = 'Software Engineering';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ITELE 4';
        $course->description = 'IT Elective 4';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ELE 3';
        $course->description = 'Free Elective 3 (Foreign Language)';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 421';
        $course->description = 'Internship (500 hours)';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 422';
        $course->description = 'Field Trip and Seminars';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IT 423';
        $course->description = 'Capstone Project';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();
    }
}
