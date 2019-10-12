<?php

use App\Models\CourseCreditation;

use Illuminate\Database\Seeder;

class CourseCreditationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_creditation')->delete();

        // Joeylene's Credited Courses - Schools

        $ccourse = new CourseCreditation;
        $ccourse->credit_id = 1;
        $ccourse->description = 'Pamantasan ng Lungsod ng Maynila';
        $ccourse->student_no = '041830904';
        $ccourse->save();

        $ccourse = new CourseCreditation;
        $ccourse->credit_id = 2;
        $ccourse->description = 'Technological Institute of the Philippines';
        $ccourse->student_no = '041830904';
        $ccourse->save();

        // Geraldine's Credited Courses - Schools

        $ccourse = new CourseCreditation;
        $ccourse->credit_id = 3;
        $ccourse->description = 'Pamantasan ng Lungsod ng Maynila';
        $ccourse->student_no = '041830905';
        $ccourse->save();

        $ccourse = new CourseCreditation;
        $ccourse->credit_id = 4;
        $ccourse->description = 'Technological Institute of the Philippines';
        $ccourse->student_no = '041830905';
        $ccourse->save();

        // Bryan's Credited Courses - Schools

        $ccourse = new CourseCreditation;
        $ccourse->credit_id = 5;
        $ccourse->description = 'Pamantasan ng Lungsod ng Maynila';
        $ccourse->student_no = '041830903';
        $ccourse->save();

        $ccourse = new CourseCreditation;
        $ccourse->credit_id = 6;
        $ccourse->description = 'Technological Institute of the Philippines';
        $ccourse->student_no = '041830903';
        $ccourse->save();
    }
}
