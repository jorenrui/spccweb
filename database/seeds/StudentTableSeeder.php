<?php

use App\Models\User;
use App\Models\Student;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->where('id', '>', '8')->delete();
        DB::table('student')->delete();

        /* Generate 50 Second Year Student Accounts - 2012 Curriculum */
        for($i = 1; $i <= 50; $i++) {

            $faker = Faker::create();

            $gender = $faker->randomElement(['male', 'female']);

            // Users Table
            $user = new User;
            $user->first_name = $faker->firstName($gender);
            $user->middle_name = explode(' ', trim($faker->streetName))[0];
            $user->last_name = $faker->lastName($gender);
            $user->gender = $gender == 'male' ? 'M' : 'F';
            $user->birthdate = $faker->dateTimeThisCentury->format('Y-m-d');
            $user->contact_no = '09' . $faker->randomNumber(9, false);
            $user->address = $faker->address;
            $user->username = '0417-' . (30000 + $i);
            $user->email = $faker->email;
            $user->password = Hash::make('0417-' . (30000 + $i));
            $user->created_at = now();
            $user->updated_at = now();
            $user->save();

            $user->assignRole('student');

            $elementary_school = $faker->randomElement(['Lakandula', 'Rizal', 'Bonifacio', 'Aguinaldo', 'Ramon Magsaysay', 'Manila']) . ' Elementary School';
            $high_school = $faker->randomElement(['Lakandula', 'Rizal', 'Bonifacio', 'Aguinaldo', 'Ramon Magsaysay', 'Manila']) . ' High School';

            /* Student Table */
            $student = new Student;
            $student->student_no = '0417-' . (30000 + $i);
            $student->primary = $elementary_school;
            $student->primary_sy = '2005-2009';
            $student->intermediate = $elementary_school;
            $student->intermediate_sy = '2009-2011';
            $student->secondary = $high_school;
            $student->secondary_sy = '2011-2015';
            $student->date_admitted = '2017-06-05';
            $student->student_type = 'Regular';
            $student->curriculum_id = 2012;
            $student->acad_term_admitted_id = '171801';
            $student->user_id = $user->id;
            $student->save();
        }

        /* Generate 50 First Year Student Accounts - 2018 Curriculum */
        for($i = 1; $i <= 50; $i++) {

            $faker = Faker::create();

            $gender = $faker->randomElement(['male', 'female']);

            // Users Table
            $user = new User;
            $user->first_name = $faker->firstName($gender);
            $user->middle_name = explode(' ', trim($faker->streetName))[0];
            $user->last_name = $faker->lastName($gender);
            $user->gender = $gender == 'male' ? 'M' : 'F';
            $user->birthdate = $faker->dateTimeThisCentury->format('Y-m-d');
            $user->contact_no = '09' . $faker->randomNumber(9, false);
            $user->address = $faker->address;
            $user->username = '0418-' . (30000 + $i);
            $user->email = $faker->email;
            $user->password = Hash::make('0418-' . (30000 + $i));
            $user->created_at = now();
            $user->updated_at = now();
            $user->save();

            $user->assignRole('student');

            $elementary_school = $faker->randomElement(['Lakandula', 'Rizal', 'Bonifacio', 'Aguinaldo', 'Ramon Magsaysay', 'Manila']) . ' Elementary School';
            $high_school = $faker->randomElement(['Lakandula', 'Rizal', 'Bonifacio', 'Aguinaldo', 'Ramon Magsaysay', 'Manila']) . ' High School';

            /* Student Table */
            $student = new Student;
            $student->student_no = '0418-' . (30000 + $i);
            $student->primary = $elementary_school;
            $student->primary_sy = '2005-2009';
            $student->intermediate = $elementary_school;
            $student->intermediate_sy = '2009-2011';
            $student->secondary = $high_school;
            $student->secondary_sy = '2011-2015';
            $student->date_admitted = '2017-06-05';
            $student->student_type = 'Regular';
            $student->curriculum_id = 2018;
            $student->acad_term_admitted_id = '181901';
            $student->user_id = $user->id;
            $student->save();
        }
    }
}
