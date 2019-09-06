<?php

use App\Models\User;
use App\Models\Employee;
use App\Models\Student;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $user->user_id = 1;
        $user->first_name = 'Joeylene';
        $user->middle_name = 'Tanagon';
        $user->last_name = 'Rivera';
        $user->username = 'admin';
        $user->gender = 'F';
        $user->birthdate = '1998-04-14';
        $user->email = 'joeylenerivera@gmail.com';
        $user->password = Hash::make('secret');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('admin');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K-210';
        $employee->date_employed = '2018-08-29';
        $employee->user_id = 1;
        $employee->save();

        /*  Facaulty
         * ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 2;
        $user->first_name = 'Geraldine Mae';
        $user->last_name = 'Gonzales';
        $user->username = 'geraldine';
        $user->gender = 'F';
        $user->email = 'geraldinemaeg@gmail.com';
        $user->password = Hash::make('secret');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty', 'writer');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K-211';
        $employee->date_employed = '2018-08-29';
        $employee->user_id = 2;
        $employee->save();

        // Users Table
        $user = new User;
        $user->user_id = 3;
        $user->first_name = 'Bryan';
        $user->last_name = 'Garcia';
        $user->username = 'bryan';
        $user->email = 'gbryanbgarcia@gmail.com';
        $user->gender = 'M';
        $user->password = Hash::make('secret');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty', 'writer', 'moderator');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K-212';
        $employee->date_employed = '2018-08-29';
        $employee->user_id = 3;
        $employee->save();

        /*  Registrar
         * ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 4;
        $user->first_name = 'Edward Evan';
        $user->last_name = 'Delavin';
        $user->username = 'registrar';
        $user->email = 'edwardevandelavin@gmail.com';
        $user->gender = 'M';
        $user->password = Hash::make('secret');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('registrar');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K-213';
        $employee->date_employed = '2018-08-29';
        $employee->user_id = 4;
        $employee->save();

        /*  Head Registrar
         * ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 5;
        $user->first_name = 'Jamillah';
        $user->last_name = 'Guialil';
        $user->username = 'headregistrar';
        $user->email = 'jamguialil@gmail.com';
        $user->gender = 'F';
        $user->password = Hash::make('secret');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('head registrar');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K-214';
        $employee->date_employed = '2018-08-29';
        $employee->user_id = 5;
        $employee->save();

        /*  Student
         * ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 6;
        $user->first_name = 'Gerilyn';
        $user->last_name = 'Quiambao';
        $user->username = 'student';
        $user->email = 'gerilynquiambao@gmail.com';
        $user->gender = 'F';
        $user->password = Hash::make('secret');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '0417-30001';
        $student->primary = 'Lakandula Elementary School';
        $student->primary_sy = '2005-2009';
        $student->intermediate = 'Lakandula Elementary School';
        $student->intermediate_sy = '2009-2011';
        $student->secondary = 'Ramon Magsaysay High School';
        $student->secondary_sy = '2011-2015';
        $student->date_admitted = '2017-06-05';
        $student->student_type = 'Regular';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '171801';
        $student->user_id = 6;
        $student->save();
    }
}
