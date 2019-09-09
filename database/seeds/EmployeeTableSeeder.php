<?php

use App\Models\User;
use App\Models\Employee;

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
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

        /*  Admin/OIC
         * ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 1;
        $user->first_name = 'Aaron';
        $user->middle_name = 'Worsfold';
        $user->last_name = 'Berzons';
        $user->gender = 'M';
        $user->birthdate = '1991-01-02';
        $user->contact_no = '09160867798';
        $user->address = '191 1st Center';
        $user->username = 'admin';
        $user->email = 'awberzons2018@spcc.edu.ph';
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

        /*  Head Registrar
         * ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 2;
        $user->first_name = 'Stafford';
        $user->middle_name = 'De Michele';
        $user->last_name = 'Durrett';
        $user->gender = 'M';
        $user->birthdate = '1993-10-21';
        $user->contact_no = '09544486152';
        $user->address = '28087 Southridge Court';
        $user->username = 'R-200';
        $user->email = 'sddurrent2018@spcc.edu.ph';
        $user->password = Hash::make('R-200');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('head registrar');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'R-200';
        $employee->date_employed = '2018-02-09';
        $employee->user_id = 2;
        $employee->save();

        /*  Registrar
         * ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 3;
        $user->first_name = 'Fanny';
        $user->middle_name = 'Jorgesen';
        $user->last_name = 'Clarycott';
        $user->gender = 'F';
        $user->birthdate = '1992-08-12';
        $user->contact_no = '09211296054';
        $user->address = '329 Linden Pass';
        $user->username = 'R-201';
        $user->email = 'fjclarycott@spcc.edu.ph';
        $user->password = Hash::make('R-201');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('registrar');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'R-201';
        $employee->date_employed = '2018-04-10';
        $employee->user_id = 3;
        $employee->save();

        /*  Faculty
         * ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 4;
        $user->first_name = 'Jonalyn';
        $user->middle_name = 'Clemen';
        $user->last_name = 'Villaflor';
        $user->gender = 'F';
        $user->birthdate = '1995-08-31';
        $user->contact_no = '09453208938';
        $user->address = '3456 A. Cecilio St. Barrio Obrero, Tondo, Manila';
        $user->username = 'I-100';
        $user->email = 'jonalynvillaflor@gmail.com';
        $user->password = Hash::make('I-100');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty', 'writer');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'I-100';
        $employee->date_employed = '2017-05-05';
        $employee->user_id = 4;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 5;
        $user->first_name = 'Bethel';
        $user->middle_name = 'Mariano';
        $user->last_name = 'Fajardo';
        $user->gender = 'F';
        $user->birthdate = '1994-03-06';
        $user->contact_no = '09938293732';
        $user->address = '3453 R.Papa St. Barrio Obrero, Tondo, Manila';
        $user->username = 'I-101';
        $user->email = 'bethelfajardo@gmail.com';
        $user->password = Hash::make('I-101');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty', 'moderator');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'I-101';
        $employee->date_employed = '2015-03-01';
        $employee->user_id = 5;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 6;
        $user->first_name = 'Joel';
        $user->middle_name = 'Clemen';
        $user->last_name = 'Seredrica';
        $user->gender = 'M';
        $user->birthdate = '1990-06-09';
        $user->contact_no = '09390293845';
        $user->address = '3473 Delos Santos St. Barrio Obrero, Tondo, Manila';
        $user->username = 'I-102';
        $user->email = 'joelseredrica@gmail.com';
        $user->password = Hash::make('I-102');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'I-102';
        $employee->date_employed = '2016-07-02';
        $employee->user_id = 6;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 7;
        $user->first_name = 'Oliver';
        $user->middle_name = 'Biboi';
        $user->last_name = 'Guinto';
        $user->gender = 'M';
        $user->birthdate = '1997-08-31';
        $user->contact_no = '0915343800';
        $user->address = '4532 Marulas St. Barrio Obrero, Tondo, Manila';
        $user->username = 'I-103';
        $user->email = 'oliverguinto@gmail.com';
        $user->password = Hash::make('I-103');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'I-103';
        $employee->date_employed = '2017-09-04';
        $employee->user_id = 7;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->user_id = 8;
        $user->first_name = 'Reigen';
        $user->middle_name = 'Watson';
        $user->last_name = 'Holmes';
        $user->gender = 'M';
        $user->birthdate = '1988-08-08';
        $user->contact_no = '09473948304';
        $user->address = '3458 M. Ocampo St. Barrio Obrero, Tondo, Manila';
        $user->username = 'I-104';
        $user->email = 'reigenwatson@gmail.com';
        $user->password = Hash::make('I-104');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'I-104';
        $employee->date_employed = '2016-04-04';
        $employee->user_id = 8;
        $employee->save();
    }
}
