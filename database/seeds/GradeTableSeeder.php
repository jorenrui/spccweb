<?php

use App\Models\Grade;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grade')->delete();

        /* 2012 Curriculum */

        /* 2017-2018 */
        $grade_id = 1;

        for($student_no = 1; $student_no <= 5; $student_no++) {
            for($class_id = 1; $class_id <= 18; $class_id++) {

                $faker = Faker::create();

                $prelims = $faker->numberBetween($min = 75, $max = 98);
                $midterms = $faker->numberBetween($min = 75, $max = 98);
                $finals = $faker->numberBetween($min = 75, $max = 98);
                $average = ($prelims + $midterms + $finals) / 3;

                $grade = new Grade;
                $grade->grade_id = $grade_id;
                $grade->class_id = $class_id;
                $grade->student_no = '0417-' . (30000 + $student_no);
                $grade->curriculum_details_id = $class_id;
                $grade->prelims = number_format($prelims, 2);
                $grade->midterms = number_format($midterms, 2);
                $grade->finals = number_format($finals, 2);
                $grade->average = number_format($average, 2);
                $grade->save();

                $grade_id++;
            }
        }

        /* 2018-2019 */

        for($student_no = 1; $student_no <= 5; $student_no++) {
            for($class_id = 19; $class_id <= 26; $class_id++) {

                $grade = new Grade;
                $grade->grade_id = $grade_id;
                $grade->class_id = $class_id;
                $grade->student_no = '0417-' . (30000 + $student_no);
                $grade->curriculum_details_id = $class_id;
                $grade->save();

                $grade_id++;
            }
        }

        /* 2018 Curriculum */

        /* 2018-2019 */

        for($student_no = 1; $student_no <= 8; $student_no++) {
            for($class_id = 27, $curriculum_details_id = 59; $class_id <= 35; $class_id++, $curriculum_details_id++) {

                $grade = new Grade;
                $grade->grade_id = $grade_id;
                $grade->class_id = $class_id;
                $grade->student_no = '0418-' . (30000 + $student_no);
                $grade->curriculum_details_id = $curriculum_details_id;
                $grade->save();

                $grade_id++;
            }
        }
    }
}
