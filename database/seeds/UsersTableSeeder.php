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
        $user->first_name = 'John';
        $user->last_name = 'Doe';
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
    }
}