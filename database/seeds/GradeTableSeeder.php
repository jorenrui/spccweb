<?php

use App\Models\Grade;

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

        /* 2018-2019 2nd Semester */

        // Class ID: 1 (OS)

        $grade = new Grade;
        $grade->prelims = 84;
        $grade->midterms = 85;
        $grade->finals = 85;
        $grade->class_id = 1;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 48; // ITELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85;
        $grade->midterms = 83;
        $grade->finals = 85;
        $grade->class_id = 1;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 48; // ITELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 84;
        $grade->midterms = 84;
        $grade->finals = 85;
        $grade->class_id = 1;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 48; // ITELE 3
        $grade->save();

        // Class ID: 2 (IT 322)

        $grade = new Grade;
        $grade->prelims = 87;
        $grade->midterms = 86;
        $grade->finals = 87;
        $grade->class_id = 2;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 46; // IT 322
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86;
        $grade->midterms = 88;
        $grade->finals = 87;
        $grade->class_id = 2;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 46; // IT 322
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85;
        $grade->midterms = 86;
        $grade->finals = 87;
        $grade->class_id = 2;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 46; // IT 322
        $grade->save();

        // Class ID: 3 (Eng 1)

        $grade = new Grade;
        $grade->prelims = 88;
        $grade->midterms = 88;
        $grade->finals = 87;
        $grade->class_id = 3;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 50; // ELE 2
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89;
        $grade->midterms = 88;
        $grade->finals = 90;
        $grade->class_id = 3;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 50; // ELE 2
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = 87;
        $grade->finals = 89;
        $grade->class_id = 3;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 50; // ELE 2
        $grade->save();

        // Class ID: 4 (HumCom)

        $grade = new Grade;
        $grade->prelims = 85;
        $grade->midterms = 88;
        $grade->finals = 86;
        $grade->class_id = 4;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 49; // ELE 1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86;
        $grade->midterms = 87;
        $grade->finals = 88;
        $grade->class_id = 4;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 49; // ELE 1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 87;
        $grade->midterms = 87;
        $grade->finals = 88;
        $grade->class_id = 4;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 49; // ELE 1
        $grade->save();

        // Class ID: 5 (IT 422)

        $grade = new Grade;
        $grade->prelims = 85;
        $grade->midterms = 86;
        $grade->finals = 87;
        $grade->class_id = 5;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 57; // IT 422
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 87;
        $grade->midterms = 86;
        $grade->finals = 86;
        $grade->class_id = 5;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 57; // IT 422
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86;
        $grade->midterms = 87;
        $grade->finals = 87;
        $grade->class_id = 5;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 57; // IT 422
        $grade->save();

        // Class ID: 6 (IT 121)

        $grade = new Grade;
        $grade->prelims = 88;
        $grade->midterms = 88;
        $grade->finals = 87;
        $grade->class_id = 6;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 14; // IT 121
        $grade->save();

        // Class ID: 7 (IT 323)

        $grade = new Grade;
        $grade->prelims = 88;
        $grade->midterms = 89;
        $grade->finals = 90;
        $grade->class_id = 7;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 14; // IT 323
        $grade->save();

        /* 2019-2020 1st Semester */

        // Class ID: 8 (IT 413)

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = 90;
        $grade->finals = 91;
        $grade->class_id = 8;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = 90;
        $grade->finals = 91;
        $grade->class_id = 8;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = 90;
        $grade->finals = 91;
        $grade->class_id = 8;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        // Class ID: 9 (ELE 3)

        $grade = new Grade;
        $grade->prelims = 86;
        $grade->midterms = 87;
        $grade->finals = 88;
        $grade->class_id = 9;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 87;
        $grade->midterms = 86;
        $grade->finals = 87;
        $grade->class_id = 9;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88;
        $grade->midterms = 89;
        $grade->finals = 86;
        $grade->class_id = 9;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        // Class ID: 10 (IT 211)

        $grade = new Grade;
        $grade->prelims = 84;
        $grade->midterms = 88;
        $grade->finals = 86;
        $grade->class_id = 10;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 23; // IT 211
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86;
        $grade->midterms = 85;
        $grade->finals = 88;
        $grade->class_id = 10;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 23; // IT 211
        $grade->save();

        // Class ID: 11 (IT 321)

        $grade = new Grade;
        $grade->prelims = 83;
        $grade->midterms = 84;
        $grade->finals = 88;
        $grade->class_id = 11;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 45; // IT 321
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83;
        $grade->midterms = 84;
        $grade->finals = 88;
        $grade->class_id = 11;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 45; // IT 321
        $grade->save();

        // Class ID: 12 (IT 213)

        $grade = new Grade;
        $grade->prelims = 88;
        $grade->midterms = 89;
        $grade->finals = 90;
        $grade->class_id = 12;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 25; // IT 213
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88;
        $grade->midterms = 88;
        $grade->finals = 90;
        $grade->class_id = 12;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 25; // IT 213
        $grade->save();

        // Class ID: 13 (IT 223)

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = 90;
        $grade->finals = 90;
        $grade->class_id = 13;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 31; // IT 223
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = 90;
        $grade->finals = 90;
        $grade->class_id = 13;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 31; // IT 223
        $grade->save();

        // Class ID: 14 (IT 221)

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = 90;
        $grade->finals = 90;
        $grade->class_id = 14;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 30; // IT 221
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = 90;
        $grade->finals = 90;
        $grade->class_id = 14;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 30; // IT 221
        $grade->save();

        // Class ID: 15 (IT 221)

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = 90;
        $grade->finals = 90;
        $grade->class_id = 15;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 30; // IT 221
        $grade->save();

        // Class ID: 16 (IT 411)

        $grade = new Grade;
        $grade->prelims = 85;
        $grade->midterms = 88;
        $grade->finals = 87;
        $grade->class_id = 16;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 51; // IT 411
        $grade->save();

        // Class ID: 17 (IT 412)

        $grade = new Grade;
        $grade->prelims = 86;
        $grade->midterms = 87;
        $grade->finals = 88;
        $grade->class_id = 17;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 52; // IT 412
        $grade->save();
    }
}
