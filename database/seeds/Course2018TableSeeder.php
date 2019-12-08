<?php

use App\Models\Course;

use Illuminate\Database\Seeder;

class Course2018TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** 2018 Curriculum **/

        $course = new Course;
        $course->course_code = 'IntroComp';
        $course->description = 'Introduction to Computing';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'ComPro1';
        $course->description = 'Computer Programming 1';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'Fil1';
        $course->description = 'Sining ng Komunikasyon';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'Math1';
        $course->description = 'Mathematics in the Modern World';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'Art1';
        $course->description = 'Art Appreciation';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'Philit';
        $course->description = 'Literatures of the Philippines';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'Eng1';
        $course->description = 'Purposive Communication';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'HumCom';
        $course->description = 'Introduction to Human Computer Interaction';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'Fil2';
        $course->description = 'Filipino Panitikan';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ComPro2';
        $course->description = 'Computer Programming 2';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'SciTech';
        $course->description = 'Science Technology and Society';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'USelf';
        $course->description = 'Understanding the Self';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'OS';
        $course->description = 'Operating Systems';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'Datstruc';
        $course->description = 'Data Structures and Algorithms';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'OOP';
        $course->description = 'Object Oriented Programming';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'PlatTech';
        $course->description = 'Platform Technologies';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'DiscMath';
        $course->description = 'Discrete Mathematics';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'Anmod';
        $course->description = 'Analytics Modeling';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'QuanMet';
        $course->description = 'Quantitative Methods';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'Rizal';
        $course->description = 'Rizal\'s Life and Works';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'InfoMan';
        $course->description = 'Information Management';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'Net1';
        $course->description = 'Networking 1 (Fundamentals)';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'InTech1';
        $course->description = 'Integrative Programming and Technologies 1';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'WebApps';
        $course->description = 'Web Applications Development';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'Technop';
        $course->description = 'Technopreneur';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'FunDBS';
        $course->description = 'Fundamentals of Database Systems';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'AnTech';
        $course->description = 'Analytics Techniques and Tools';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'Net2';
        $course->description = 'Networking 2 (Routing Protocols)';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'SIA1';
        $course->description = 'Systems Integration and Architecture 1';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'Intech2';
        $course->description = 'Integrative Programming and Technologies 2';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'FDWDM';
        $course->description = 'Fundamentals of Data Warehousing and Data Mining';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'SAD';
        $course->description = 'Systems Analysis and Design';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'FunBus';
        $course->description = 'Fundamentals of Business Analytics';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IAS1';
        $course->description = 'Information Assurance and Security';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'Ethics';
        $course->description = 'Ethics';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ADET';
        $course->description = 'Application Development and Emerging Technologies';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'EnDaMa';
        $course->description = 'Enterprise Data Management';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'PhilHis';
        $course->description = 'Readings in Philippine History';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ConWorld';
        $course->description = 'The Contemporary World';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'IAS2';
        $course->description = 'Information Assurance and Security 2';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ITProj1';
        $course->description = 'Capstone Project and Research 1';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'SAM';
        $course->description = 'System Administration and Maintenace 1';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'SocPro';
        $course->description = 'Social and Professional Issues';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'ITProj2';
        $course->description = 'Capstone Project and Research 2';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();

        $course = new Course;
        $course->course_code = 'Prac1';
        $course->description = 'Practicum';
        $course->units = 3;
        $course->lab_units = null;
        $course->save();

        $course = new Course;
        $course->course_code = 'SIA2';
        $course->description = 'Systems Integration and Architecture 2';
        $course->units = 3;
        $course->lab_units = 1;
        $course->save();
    }
}
