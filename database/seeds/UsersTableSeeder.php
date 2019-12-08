<?php

use App\Models\User;
use App\Models\Employee;
use App\Models\Student;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('employee')->delete();
        DB::table('student')->delete();

        /*  Admin/OIC
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 1;
        $user->first_name = 'Admin';
        $user->last_name = 'Admin';
        $user->gender = 'M';
        $user->username = 'spccadmin';
        $user->password = Hash::make('spccadmin');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('admin', 'hidden super admin');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K200';
        $employee->user_id = 1;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 2;
        $user->profile_picture = 'K346.jpg';
        $user->first_name = 'Jhensen';
        $user->last_name = 'Foronda';
        $user->gender = 'M';
        $user->username = 'admin';
        $user->password = Hash::make('secret');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('admin', 'super admin');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K346';
        $employee->user_id = 2;
        $employee->save();

        /*  Head Registrar
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 3;
        $user->profile_picture = 'K001.jpg';
        $user->first_name = 'Rosario';
        $user->middle_name = 'Floresca';
        $user->last_name = 'Baga';
        $user->gender = 'F';
        $user->username = 'K001';
        $user->password = Hash::make('K001');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('head registrar');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K001';
        $employee->user_id = 3;
        $employee->save();

        /* Registrar
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 4;
        $user->first_name = 'Vanessa';
        $user->middle_name = 'Penetrante';
        $user->last_name = 'Mendiola';
        $user->gender = 'F';
        $user->username = 'K184';
        $user->password = Hash::make('K184');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('registrar');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K184';
        $employee->user_id = 4;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 5;
        $user->first_name = 'Jackelyn';
        $user->middle_name = 'Langreo';
        $user->last_name = 'Santos';
        $user->gender = 'F';
        $user->username = 'K007';
        $user->password = Hash::make('K007');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('registrar');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K007';
        $employee->user_id = 5;
        $employee->save();

        /* Faculty
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 6;
        $user->profile_picture = 'K519.jpg';
        $user->first_name = 'Rechelle';
        $user->last_name = 'Teves';
        $user->gender = 'F';
        $user->username = 'K519';
        $user->password = Hash::make('K519');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty', 'moderator', 'writer');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K519';
        $employee->user_id = 6;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 7;
        $user->profile_picture = 'K491.jpg';
        $user->first_name = 'Christian';
        $user->last_name = 'Rubiato';
        $user->gender = 'M';
        $user->username = 'K491';
        $user->password = Hash::make('K491');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty', 'writer');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K491';
        $employee->user_id = 7;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 8;
        $user->profile_picture = 'K492.jpg';
        $user->first_name = 'Angelito';
        $user->last_name = 'De Rama';
        $user->gender = 'M';
        $user->username = 'K492';
        $user->password = Hash::make('K492');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K492';
        $employee->user_id = 8;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 9;
        $user->profile_picture = 'K521.jpg';
        $user->first_name = 'Cristine Joy';
        $user->last_name = 'De Jesus';
        $user->gender = 'F';
        $user->username = 'K521';
        $user->password = Hash::make('K521');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K521';
        $employee->user_id = 9;
        $employee->save();


        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 10;
        $user->profile_picture = '041830903.jpg';
        $user->first_name = 'Bryan';
        $user->middle_name = 'Rosario';
        $user->last_name = 'Garcia';
        $user->gender = 'M';
        $user->birthdate = '1998-11-06';
        $user->address = 'Tondo, Manila';
        $user->email = 'gbryanbgarcia@gmail.com';
        $user->username = '041830903';
        $user->password = Hash::make('041830903');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041830903';
        $student->student_type = 'Transferee';
        $student->primary = 'Francisco Benitez Elementary School';
        $student->primary_sy = '2003-2007';
        $student->intermediate = 'Francisco Benitez Elementary School';
        $student->intermediate_sy = '2007-2010';
        $student->secondary = 'Florentino Torres High School';
        $student->secondary_sy = '2010-2015';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '181902';
        $student->user_id = 10;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 11;
        $user->profile_picture = '041830904.jpg';
        $user->first_name = 'Joeylene';
        $user->middle_name = 'Tanagon';
        $user->last_name = 'Rivera';
        $user->gender = 'F';
        $user->birthdate = '1998-04-14';
        $user->address = 'Sampaloc, Manila';
        $user->email = 'joeylenerivera@gmail.com';
        $user->username = '041830904';
        $user->password = Hash::make('041830904');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041830904';
        $student->student_type = 'Transferee';
        $student->primary = 'Dr. A. Albert Elementary School';
        $student->primary_sy = '2004-2008';
        $student->intermediate = 'Dr. A. Albert Elementary School';
        $student->intermediate_sy = '2008-2010';
        $student->secondary = 'Ramon Magsaysay High School';
        $student->secondary_sy = '2010-2014';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '181902';
        $student->user_id = 11;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 12;
        $user->profile_picture = '041830905.jpg';
        $user->first_name = 'Geraldine Mae';
        $user->middle_name = 'Obillo';
        $user->last_name = 'Gonzales';
        $user->gender = 'F';
        $user->birthdate = '1998-12-06';
        $user->address = 'Barrio Obrero, Tondo, Manila';
        $user->email = 'geraldinemaeg@gmail.com';
        $user->username = '041830905';
        $user->password = Hash::make('041830905');
        $user->created_at = now();
        $user->updated_at = now();
        $student->user_id = 12;
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041830905';
        $student->student_type = 'Transferee';
        $student->primary = 'Antionio Luna Elementary School';
        $student->primary_sy = '2004-2008';
        $student->intermediate = 'Antionio Luna Elementary School';
        $student->intermediate_sy = '2008-2011';
        $student->secondary = 'Manila Science High School';
        $student->secondary_sy = '2011-2015';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '181902';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '041630874.jpg';
        $user->first_name = 'Mark Joeby';
        $user->last_name = 'Batang';
        $user->gender = 'M';
        $user->username = '041630874';
        $user->password = Hash::make('041630874');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041630874';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '161701';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '041630872.jpg';
        $user->first_name = 'Justin Jed';
        $user->last_name = 'Buyson';
        $user->gender = 'M';
        $user->username = '041630872';
        $user->password = Hash::make('041630872');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041630872';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '161701';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '416100571.jpg';
        $user->first_name = 'Roy Vincent';
        $user->last_name = 'Collo';
        $user->gender = 'M';
        $user->username = '416100571';
        $user->password = Hash::make('416100571');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '416100571';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '161701';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '041630869.jpg';
        $user->first_name = 'Daisyre';
        $user->last_name = 'Lumanlan';
        $user->gender = null;
        $user->username = '041630869';
        $user->password = Hash::make('041630869');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041630869';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '161701';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Syllet Maan';
        $user->last_name = 'Asuncion';
        $user->gender = 'F';
        $user->username = '041530810';
        $user->password = Hash::make('041530810');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041530810';
        $student->student_type = 'Irregular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '151601';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Aubrey';
        $user->last_name = 'Flores';
        $user->gender = 'F';
        $user->username = '041530849';
        $user->password = Hash::make('041530849');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041530849';
        $student->student_type = 'Irregular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '151601';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Elizabeth';
        $user->last_name = 'Galang';
        $user->gender = null;
        $user->username = '041530815';
        $user->password = Hash::make('041530815');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041530815';
        $student->student_type = 'Irregular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '151601';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Ercell';
        $user->last_name = 'Paguia';
        $user->gender = null;
        $user->username = '041536316';
        $user->password = Hash::make('041536316');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041536316';
        $student->student_type = 'Irregular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '151601';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jessicah';
        $user->last_name = 'Bundalian';
        $user->gender = 'F';
        $user->username = '999910000';
        $user->password = Hash::make('999910000');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '999910000';
        $student->student_type = 'Irregular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '161701';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Whendelle';
        $user->last_name = 'Garabilez';
        $user->gender = 'M';
        $user->username = '999910001';
        $user->password = Hash::make('999910001');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '999910001';
        $student->student_type = 'Irregular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '161701';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Mardof';
        $user->last_name = 'Maningas';
        $user->gender = 'M';
        $user->username = '999910002';
        $user->password = Hash::make('999910002');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '999910002';
        $student->student_type = 'Irregular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '161701';
        $student->user_id = $user->id;
        $student->save();


        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jan Bryan';
        $user->last_name = 'Coronel';
        $user->gender = 'M';
        $user->username = '999910003';
        $user->password = Hash::make('999910003');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '999910003';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '181901';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Kenneth';
        $user->middle_name = 'Go';
        $user->last_name = 'Odtuhan';
        $user->gender = 'M';
        $user->username = 'K100';
        $user->password = Hash::make('K100');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K100';
        $employee->user_id = $user->id;
        $employee->save();

        /* Students
         * ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '041830895.jpg';
        $user->first_name = 'Patrick';
        $user->last_name = 'Loyola';
        $user->gender = 'M';
        $user->username = '041830895';
        $user->password = Hash::make('041830895');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041830895';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '181901';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '041830886.jpg';
        $user->first_name = 'Cathrine';
        $user->last_name = 'Andaca';
        $user->gender = 'F';
        $user->username = '041830886';
        $user->password = Hash::make('041830886');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041830886';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '181901';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '041830899.jpg';
        $user->first_name = 'Kyla Abigaile';
        $user->last_name = 'Pineda';
        $user->gender = 'F';
        $user->username = '041830899';
        $user->password = Hash::make('041830899');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041830899';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '181901';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '041830883.jpg';
        $user->first_name = 'Joyce Abigail';
        $user->last_name = 'Fernandez';
        $user->gender = 'F';
        $user->username = '041830883';
        $user->password = Hash::make('041830883');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041830883';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '181901';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '041830896.jpg';
        $user->first_name = 'Rex Maru';
        $user->last_name = 'Sanchez';
        $user->gender = 'M';
        $user->username = '041830896';
        $user->password = Hash::make('041830896');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041830896';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '181901';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '041830896.jpg';
        $user->first_name = 'Shaina';
        $user->last_name = 'Jaba';
        $user->gender = 'F';
        $user->username = '041830890';
        $user->password = Hash::make('041830890');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041830890';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '181901';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '041322078.jpg';
        $user->first_name = 'Miguel';
        $user->last_name = 'Villarama';
        $user->gender = 'M';
        $user->username = '041322078';
        $user->password = Hash::make('041322078');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041322078';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '181901';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '041830884.jpg';
        $user->first_name = 'Gene Andrei';
        $user->last_name = 'Paulino';
        $user->gender = 'M';
        $user->username = '041830884';
        $user->password = Hash::make('041830884');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041830884';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '181901';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Abdul Napi/Zacaria';
        $user->last_name = 'Macmod';
        $user->gender = 'M';
        $user->username = '041931022';
        $user->password = Hash::make('041931022');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041931022';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '181901';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Gizelle';
        $user->last_name = 'Arandia';
        $user->gender = 'F';
        $user->username = '041930101';
        $user->password = Hash::make('041930101');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930101';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Mitch Jewel';
        $user->last_name = 'Bilbao';
        $user->gender = 'F';
        $user->username = '041930922';
        $user->password = Hash::make('041930922');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930922';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Aries';
        $user->last_name = 'Cabansag';
        $user->username = '041930930';
        $user->password = Hash::make('041930930');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930930';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Alvin Jhon';
        $user->last_name = 'Calimlim';
        $user->gender = 'M';
        $user->username = '041930926';
        $user->password = Hash::make('041930926');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930926';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Alvincent';
        $user->last_name = 'Calma';
        $user->gender = 'M';
        $user->username = '041930979';
        $user->password = Hash::make('041930979');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930979';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Marc Kenneth';
        $user->last_name = 'Cañonaso';
        $user->gender = 'M';
        $user->username = '041930981';
        $user->password = Hash::make('041930981');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930981';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Acezer';
        $user->last_name = 'Dela Cruz';
        $user->gender = 'M';
        $user->username = '041930957';
        $user->password = Hash::make('041930957');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930957';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'David Jefferson Jones';
        $user->last_name = 'Domingo';
        $user->gender = 'M';
        $user->username = '041930998';
        $user->password = Hash::make('041930998');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930998';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Christian Jezreel';
        $user->last_name = 'Festejo';
        $user->gender = 'M';
        $user->username = '041930990';
        $user->password = Hash::make('041930990');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930990';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Keizer Fox';
        $user->last_name = 'Flores';
        $user->gender = 'M';
        $user->username = '041530789';
        $user->password = Hash::make('041530789');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041530789';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jhoven';
        $user->last_name = 'Gagui';
        $user->gender = 'M';
        $user->username = '041930918';
        $user->password = Hash::make('041930918');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930918';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Juvy';
        $user->last_name = 'Ilustrisimo';
        $user->gender = 'F';
        $user->username = '041930954';
        $user->password = Hash::make('041930954');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930954';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Shiela Mae';
        $user->last_name = 'Ladines';
        $user->gender = 'F';
        $user->username = '041930100';
        $user->password = Hash::make('041930100');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930100';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Carren';
        $user->last_name = 'Laeno';
        $user->gender = 'F';
        $user->username = '041930980';
        $user->password = Hash::make('041930980');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930980';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jed Larry';
        $user->last_name = 'Lagman';
        $user->gender = 'M';
        $user->username = '041930999';
        $user->password = Hash::make('041930999');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930999';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'April Joy';
        $user->last_name = 'Lesis';
        $user->gender = 'F';
        $user->username = '041930982';
        $user->password = Hash::make('041930982');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930982';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Ma. Robel';
        $user->last_name = 'Leyte';
        $user->gender = 'F';
        $user->username = '041930941';
        $user->password = Hash::make('041930941');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930941';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Elsir';
        $user->last_name = 'Malihan';
        $user->gender = 'M';
        $user->username = '041930921';
        $user->password = Hash::make('041930921');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930921';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Mark';
        $user->last_name = 'Managbanag';
        $user->gender = 'M';
        $user->username = '041930989';
        $user->password = Hash::make('041930989');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930989';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Donald Marco';
        $user->last_name = 'Mangaliman Jr.';
        $user->gender = 'M';
        $user->username = '041930964';
        $user->password = Hash::make('041930964');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930964';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Joana Marie';
        $user->last_name = 'Maninang';
        $user->gender = 'F';
        $user->username = '041930965';
        $user->password = Hash::make('041930965');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930965';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Dominic';
        $user->last_name = 'Mariano';
        $user->gender = 'M';
        $user->username = '041930960';
        $user->password = Hash::make('041930960');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930960';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'John Lloyd';
        $user->last_name = 'Mesina';
        $user->gender = 'M';
        $user->username = '041930947';
        $user->password = Hash::make('041930947');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930947';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Niño';
        $user->last_name = 'Nicolas';
        $user->gender = 'M';
        $user->username = '041930983';
        $user->password = Hash::make('041930983');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930983';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Niño';
        $user->last_name = 'Obero';
        $user->gender = 'M';
        $user->username = '041930973';
        $user->password = Hash::make('041930973');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930973';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Ian Vincent';
        $user->last_name = 'Penetrante';
        $user->gender = 'M';
        $user->username = '041930972';
        $user->password = Hash::make('041930972');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930972';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jei Marc';
        $user->last_name = 'Quidlat';
        $user->gender = 'M';
        $user->username = '041930963';
        $user->password = Hash::make('041930963');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930963';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Arvie';
        $user->last_name = 'Roquero';
        $user->gender = 'M';
        $user->username = '041931006';
        $user->password = Hash::make('041931006');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041931006';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Reziel Mae';
        $user->last_name = 'Tamayo';
        $user->gender = 'F';
        $user->username = '041930923';
        $user->password = Hash::make('041930923');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930923';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Lyka';
        $user->last_name = 'Tilog';
        $user->gender = 'F';
        $user->username = '041930945';
        $user->password = Hash::make('041930945');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930945';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Rose Jane';
        $user->middle_name = 'Mora';
        $user->last_name = 'Voz';
        $user->gender = 'F';
        $user->username = '041930946';
        $user->password = Hash::make('041930946');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930946';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Johnny';
        $user->last_name = 'Iradiel';
        $user->gender = 'M';
        $user->username = '041931016';
        $user->password = Hash::make('041931016');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041931016';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jarold';
        $user->last_name = 'Abuan';
        $user->gender = 'M';
        $user->username = '041930948';
        $user->password = Hash::make('041930948');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930948';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Erica';
        $user->last_name = 'Agorilla';
        $user->gender = 'F';
        $user->username = '041930933';
        $user->password = Hash::make('041930933');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930933';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jemilie Irysh Joy';
        $user->last_name = 'Alban';
        $user->gender = 'F';
        $user->username = '041930915';
        $user->password = Hash::make('041930915');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930915';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Reamark';
        $user->last_name = 'Alpuerto';
        $user->gender = 'M';
        $user->username = '041930986';
        $user->password = Hash::make('041930986');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930986';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Angela';
        $user->last_name = 'Aquino';
        $user->gender = 'F';
        $user->username = '041930976';
        $user->password = Hash::make('041930976');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930976';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Kyle Ivan';
        $user->last_name = 'Bauzon';
        $user->gender = 'M';
        $user->username = '041931005';
        $user->password = Hash::make('041931005');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041931005';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Nellaine';
        $user->last_name = 'Bautista';
        $user->gender = 'F';
        $user->username = '041930934';
        $user->password = Hash::make('041930934');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930934';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Leanjo';
        $user->last_name = 'Caprecho';
        $user->gender = 'M';
        $user->username = '041930917';
        $user->password = Hash::make('041930917');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930917';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jerald';
        $user->last_name = 'De Villa';
        $user->gender = 'M';
        $user->username = '041930940';
        $user->password = Hash::make('041930940');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930940';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Rosemarie';
        $user->last_name = 'Dela Cruz';
        $user->gender = 'F';
        $user->username = '041930952';
        $user->password = Hash::make('041930952');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930952';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Vincente';
        $user->last_name = 'Dimdam';
        $user->gender = 'M';
        $user->username = '041930974';
        $user->password = Hash::make('041930974');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930974';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Melissa Mae';
        $user->last_name = 'Diwata';
        $user->gender = 'F';
        $user->username = '041930103';
        $user->password = Hash::make('041930103');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930103';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jade Enrica';
        $user->last_name = 'Espiritu';
        $user->gender = 'F';
        $user->username = '041930914';
        $user->password = Hash::make('041930914');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930914';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Milliscent Mar';
        $user->last_name = 'Gabin';
        $user->gender = 'F';
        $user->username = '041930985';
        $user->password = Hash::make('041930985');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930985';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Reynan';
        $user->last_name = 'Eringan';
        $user->gender = 'M';
        $user->username = '041930978';
        $user->password = Hash::make('041930978');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930978';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Julie-Ann';
        $user->last_name = 'Juliata';
        $user->gender = 'F';
        $user->username = '041930912';
        $user->password = Hash::make('041930912');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930912';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Analiza';
        $user->last_name = 'Laguda';
        $user->gender = 'F';
        $user->username = '041930906';
        $user->password = Hash::make('041930906');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930906';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Julie-Ann';
        $user->last_name = 'Laguda';
        $user->gender = 'F';
        $user->username = '041930907';
        $user->password = Hash::make('041930907');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930907';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'John Dalle';
        $user->last_name = 'Macarubbo';
        $user->gender = 'M';
        $user->username = '041930924';
        $user->password = Hash::make('041930924');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930924';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jhon Paul';
        $user->last_name = 'Meñosa';
        $user->gender = 'M';
        $user->username = '041930943';
        $user->password = Hash::make('041930943');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930943';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Ma. Alundra';
        $user->last_name = 'Oñate';
        $user->gender = 'F';
        $user->username = '041930913';
        $user->password = Hash::make('041930913');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930913';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Leocita';
        $user->last_name = 'Pecayo';
        $user->gender = 'F';
        $user->username = '041930997';
        $user->password = Hash::make('041930997');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930997';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Rica';
        $user->last_name = 'Peñalosa';
        $user->gender = 'F';
        $user->username = '041930977';
        $user->password = Hash::make('041930977');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930977';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Dandy';
        $user->last_name = 'Pido';
        $user->gender = 'M';
        $user->username = '041930968';
        $user->password = Hash::make('041930968');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930968';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Patrick Louie';
        $user->last_name = 'Ponseca';
        $user->gender = 'M';
        $user->username = '041930942';
        $user->password = Hash::make('041930942');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930942';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Febrick';
        $user->last_name = 'Quiza';
        $user->gender = 'M';
        $user->username = '041930988';
        $user->password = Hash::make('041930988');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930988';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Zyra Rose';
        $user->last_name = 'Requejo';
        $user->gender = 'F';
        $user->username = '041930984';
        $user->password = Hash::make('041930984');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930984';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jan Malcom';
        $user->last_name = 'Sevilla';
        $user->gender = 'M';
        $user->username = '041930959';
        $user->password = Hash::make('041930959');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930959';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Carlos';
        $user->last_name = 'Torres Jr.';
        $user->gender = 'M';
        $user->username = '041930925';
        $user->password = Hash::make('041930925');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930925';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Kriszelle Ann';
        $user->last_name = 'Virtus';
        $user->gender = 'F';
        $user->username = '041930919';
        $user->password = Hash::make('041930919');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930919';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Aubrey Nicole';
        $user->last_name = 'Albay';
        $user->gender = 'F';
        $user->username = '041930937';
        $user->password = Hash::make('041930937');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930937';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Ricky';
        $user->last_name = 'Amante';
        $user->gender = 'M';
        $user->username = '041930962';
        $user->password = Hash::make('041930962');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930962';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Harold Chris';
        $user->last_name = 'Austria';
        $user->gender = 'M';
        $user->username = '041930953';
        $user->password = Hash::make('041930953');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930953';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Vanessa';
        $user->last_name = 'Benedicio';
        $user->gender = 'F';
        $user->username = '041930927';
        $user->password = Hash::make('041930927');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930927';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jerome';
        $user->last_name = 'Bontog';
        $user->gender = 'M';
        $user->username = '041930949';
        $user->password = Hash::make('041930949');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930949';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jeny Rose';
        $user->last_name = 'Cadiz';
        $user->gender = 'F';
        $user->username = '041930958';
        $user->password = Hash::make('041930958');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930958';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Aarhon';
        $user->last_name = 'Casabuena';
        $user->gender = 'M';
        $user->username = '041930996';
        $user->password = Hash::make('041930996');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930996';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Froilan';
        $user->last_name = 'Castillo Jr.';
        $user->gender = 'M';
        $user->username = '041930910';
        $user->password = Hash::make('041930910');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930910';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Timothy Joshua';
        $user->last_name = 'Catura';
        $user->gender = 'M';
        $user->username = '041930975';
        $user->password = Hash::make('041930975');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930975';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Mark Joseph';
        $user->last_name = 'Cawili';
        $user->gender = 'M';
        $user->username = '041930944';
        $user->password = Hash::make('041930944');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930944';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jhovince';
        $user->last_name = 'Co';
        $user->gender = 'F';
        $user->username = '041930928';
        $user->password = Hash::make('041930928');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930928';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Ely';
        $user->last_name = 'Cruz';
        $user->gender = 'M';
        $user->username = '041930939';
        $user->password = Hash::make('041930939');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930939';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Martin';
        $user->last_name = 'Dela Cruz';
        $user->gender = 'M';
        $user->username = '041700686';
        $user->password = Hash::make('041700686');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041700686';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Erika Mae';
        $user->last_name = 'Diano';
        $user->gender = 'F';
        $user->username = '041931007';
        $user->password = Hash::make('041931007');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041931007';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Rommel';
        $user->last_name = 'Ebarola';
        $user->gender = 'M';
        $user->username = '041930931';
        $user->password = Hash::make('041930931');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930931';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Jericho';
        $user->last_name = 'Espanto';
        $user->gender = 'M';
        $user->username = '041930987';
        $user->password = Hash::make('041930987');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930987';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Denise Lauren';
        $user->last_name = 'Lipata';
        $user->gender = 'F';
        $user->username = '041930909';
        $user->password = Hash::make('041930909');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930909';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Zildjian';
        $user->last_name = 'Magante';
        $user->gender = 'M';
        $user->username = '041930995';
        $user->password = Hash::make('041930995');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930995';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Maria Angela';
        $user->last_name = 'Malana';
        $user->gender = 'F';
        $user->username = '041931010';
        $user->password = Hash::make('041931010');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041931010';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'John Ely';
        $user->last_name = 'Marcelo';
        $user->gender = 'M';
        $user->username = '041930970';
        $user->password = Hash::make('041930970');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930970';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Christian Daniel';
        $user->last_name = 'Nocum';
        $user->gender = 'M';
        $user->username = '041930920';
        $user->password = Hash::make('041930920');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930920';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Daniel';
        $user->last_name = 'Ongayo';
        $user->gender = 'M';
        $user->username = '041930911';
        $user->password = Hash::make('041930911');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930911';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'John Eric';
        $user->last_name = 'Porgal';
        $user->gender = 'M';
        $user->username = '041930908';
        $user->password = Hash::make('041930908');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930908';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Margie';
        $user->last_name = 'Ramos';
        $user->gender = 'F';
        $user->username = '041931011';
        $user->password = Hash::make('041931011');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041931011';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Ronald';
        $user->last_name = 'Ravago';
        $user->gender = 'M';
        $user->username = '041930966';
        $user->password = Hash::make('041930966');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930966';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Liecel Andrea';
        $user->last_name = 'Rebolledo';
        $user->gender = 'F';
        $user->username = '041931013';
        $user->password = Hash::make('041931013');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041931013';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Rachel Anne';
        $user->last_name = 'Relator';
        $user->gender = 'F';
        $user->username = '041931009';
        $user->password = Hash::make('041931009');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041931009';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Christian';
        $user->last_name = 'Sagusay';
        $user->gender = 'M';
        $user->username = '041930916';
        $user->password = Hash::make('041930916');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930916';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Glenn Van';
        $user->last_name = 'Senillo';
        $user->gender = 'M';
        $user->username = '041930929';
        $user->password = Hash::make('041930929');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930929';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Reynalyn';
        $user->last_name = 'Tabora';
        $user->gender = 'F';
        $user->username = '041931008';
        $user->password = Hash::make('041931008');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041931008';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->first_name = 'Joshua Simon';
        $user->last_name = 'Zafra';
        $user->gender = 'M';
        $user->username = '041930951';
        $user->password = Hash::make('041930951');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '041930951';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2018;
        $student->acad_term_admitted_id = '192001';
        $student->user_id = $user->id;
        $student->save();
    }
}
