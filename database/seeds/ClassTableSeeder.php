<?php

use App\Models\SClass;

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class')->delete();

        $class = new SClass;
        $class->class_id = 1;
        $class->instructor_id = 'K-211';
        $class->course_code = 'ENG1';
        $class->acad_term_id = '171801';
        $class->day = 'M';
        $class->time_start = '09:00:00';
        $class->time_end = '12:00:00';
        $class->save();

        $class = new SClass;
        $class->class_id = 2;
        $class->instructor_id = 'K-212';
        $class->course_code = 'HUM1';
        $class->acad_term_id = '171801';
        $class->day = 'M';
        $class->time_start = '13:00:00';
        $class->time_end = '15:00:00';
        $class->save();

        $class = new SClass;
        $class->class_id = 3;
        $class->instructor_id = 'K-211';
        $class->course_code = 'MATH1';
        $class->acad_term_id = '171801';
        $class->day = 'M';
        $class->time_start = '15:00:00';
        $class->time_end = '18:00:00';
        $class->save();
    }
}
