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
        $grade->prelims = 78.85;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 8;
        $grade->student_no = '041630874';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 75.55;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 8;
        $grade->student_no = '999910000';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 77.20;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 8;
        $grade->student_no = '041630872';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.10;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 8;
        $grade->student_no = '416100571';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 61.68;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 8;
        $grade->student_no = '999910001';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.58;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 8;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.53;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 8;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 66.13;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 8;
        $grade->student_no = '041630869';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 69.88;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 8;
        $grade->student_no = '999910002';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.18;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 8;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 53; // IT 413
        $grade->save();

        // Class ID: 9 (ELE 3)

        $grade = new Grade;
        $grade->prelims = 84.72;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 9;
        $grade->student_no = '041630874';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 76.13;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 9;
        $grade->student_no = '999910000';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 69.25;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 9;
        $grade->student_no = '041630872';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.45;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 9;
        $grade->student_no = '416100571';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 71.98;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 9;
        $grade->student_no = '999910001';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.52;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 9;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90.25;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 9;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 73.60;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 9;
        $grade->student_no = '041630869';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 77.58;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 9;
        $grade->student_no = '999910002';
        $grade->curriculum_details_id = 55; // ELE 3
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 96.35;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 9;
        $grade->student_no = '041830904';
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

        // Class ID: 11 (IT 312)

        $grade = new Grade;
        $grade->prelims = 83;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 11;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 45; // IT 312
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 11;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 45; // IT 312
        $grade->save();

        // Class ID: 12 (IT 213)

        $grade = new Grade;
        $grade->prelims = 88;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 12;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 25; // IT 213
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 12;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 25; // IT 213
        $grade->save();

        // Class ID: 13 (IT 223)

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 13;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 31; // IT 223
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 13;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 31; // IT 223
        $grade->save();

        // Class ID: 14 (IT 221)

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 14;
        $grade->student_no = '041830904';
        $grade->curriculum_details_id = 30; // IT 221
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 14;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 30; // IT 221
        $grade->save();

        // Class ID: 15 (IT 221)

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 15;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 30; // IT 221
        $grade->save();

        // Class ID: 16 (IT 411)

        $grade = new Grade;
        $grade->prelims = 67.06;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 16;
        $grade->student_no = '041630874';
        $grade->curriculum_details_id = 51; // IT 411
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 66.60;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 16;
        $grade->student_no = '041630872';
        $grade->curriculum_details_id = 51; // IT 411
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 68.62;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 16;
        $grade->student_no = '416100571';
        $grade->curriculum_details_id = 51; // IT 411
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 68.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 16;
        $grade->student_no = '041630869';
        $grade->curriculum_details_id = 51; // IT 411
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 71.60;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 16;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 51; // IT 411
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 16;
        $grade->student_no = '999910000';
        $grade->curriculum_details_id = 51; // IT 411
        $grade->save();

        // Class ID: 17 (IT 412)

        $grade = new Grade;
        $grade->prelims = 87.10;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 17;
        $grade->student_no = '041630874';
        $grade->curriculum_details_id = 52; // IT 412
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 75.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 17;
        $grade->student_no = '999910000';
        $grade->curriculum_details_id = 52; // IT 412
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 77.40;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 17;
        $grade->student_no = '041630872';
        $grade->curriculum_details_id = 52; // IT 412
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.20;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 17;
        $grade->student_no = '416100571';
        $grade->curriculum_details_id = 52; // IT 412
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 64.85;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 17;
        $grade->student_no = '999910001';
        $grade->curriculum_details_id = 52; // IT 412
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.60;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 17;
        $grade->student_no = '041830903';
        $grade->curriculum_details_id = 52; // IT 412
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 75.30;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 17;
        $grade->student_no = '041630869';
        $grade->curriculum_details_id = 52; // IT 412
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 64.05;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 17;
        $grade->student_no = '999910002';
        $grade->curriculum_details_id = 52; // IT 412
        $grade->save();

        // Class ID: 18 (ITELE 4)

        $grade = new Grade;
        $grade->prelims = 92.50;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 18;
        $grade->student_no = '041630874';
        $grade->curriculum_details_id = 54; // ITELE 4
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 18;
        $grade->student_no = '041630872';
        $grade->curriculum_details_id = 54; // ITELE 4
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 18;
        $grade->student_no = '416100571';
        $grade->curriculum_details_id = 54; // ITELE 4
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 93;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 18;
        $grade->student_no = '041830905';
        $grade->curriculum_details_id = 54; // ITELE 4
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.50;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 18;
        $grade->student_no = '041630869';
        $grade->curriculum_details_id = 54; // ITELE 4
        $grade->save();

        // Class ID: 19 (IntroComp)

        $grade = new Grade;
        $grade->prelims = 82.83;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930948';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90.81;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930933';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.83;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930915';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930986';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 81.22;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930976';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 76.54;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041931005';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.86;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930934';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 79.37;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930917';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.51;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930940';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.32;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930952';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.14;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930974';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 50.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930103';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 64.80;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930914';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.17;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930985';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 81.65;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930978';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 81.74;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930912';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.26;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930906';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 67.58;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930907';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.13;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930924';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.47;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930943';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.13;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930913';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 79.65;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930997';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.80;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930977';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.71;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930968';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.61;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930942';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.13;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930988';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 70.86;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930984';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 74.79;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930959';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.21;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930925';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 76.46;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 19;
        $grade->student_no = '041930919';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        // Class ID: 20 (IntroComp)

        $grade = new Grade;
        $grade->prelims = 86.12;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930937';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.92;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930962';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.35;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930953';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.67;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930927';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.14;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930949';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.94;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930958';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.05;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930996';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 93.44;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930910';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.93;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930975';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.03;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930944';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 95.60;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930928';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.26;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930939';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.53;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041700686';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.69;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041931007';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.16;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930931';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 84.08;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930987';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.73;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930909';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.53;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930995';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.21;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041931010';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.55;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930970';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.82;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930920';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.37;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930911';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.11;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930908';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 76.17;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041931011';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90.66;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930966';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.52;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041931013';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041931009';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.42;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930916';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.49;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930929';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.19;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041931008';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.83;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 20;
        $grade->student_no = '041930951';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        // Class ID: 21 (IntroComp)

        $grade = new Grade;
        $grade->prelims = 80.33;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930101';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.68;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930922';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 84.50;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930930';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 82.30;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930926';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.85;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930979';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.63;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930981';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.50;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930957';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 79.48;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930998';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 95.45;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930990';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 75.55;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041530789';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.13;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930918';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.70;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930954';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 75.33;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930100';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.13;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930980';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 84.23;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930999';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.50;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930982';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 79.83;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930941';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 60.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930921';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 82.40;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930989';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.88;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930964';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.35;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930965';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 82.68;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930960';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 77.45;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930947';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 81.43;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930983';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 81.98;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930973';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 87.93;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930972';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 60.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930963';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 76.30;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041931006';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 60.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930923';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 78.35;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041930946';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 79.85;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 21;
        $grade->student_no = '041931016';
        $grade->curriculum_details_id = 59; // IntroComp
        $grade->save();

        // Class ID: 22 (ComPro1)

        $grade = new Grade;
        $grade->prelims = 78.83;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930101';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.01;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930922';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.54;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930930';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.28;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930926';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.20;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930979';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.81;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930981';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 79.87;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930957';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 82.04;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930998';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.47;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930990';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 76.97;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041530789';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 93.36;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930918';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.96;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930954';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 76.60;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930100';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 87.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930980';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930999';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 82.59;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930982';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 81.09;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930941';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 65.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930921';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 82.32;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930989';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.16;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930964';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 81.50;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930965';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930960';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.44;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930947';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.05;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930983';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 87.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930973';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.28;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930972';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 67.58;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930963';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 76.27;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041931006';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 65.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930923';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 84.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041930946';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.26;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 22;
        $grade->student_no = '041931016';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        // Class ID: 23 (ComPro1)

        $grade = new Grade;
        $grade->prelims = 85.13;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930948';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.05;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930933';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90.05;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930915';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.35;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930986';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.08;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930976';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 75.54;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041931005';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.40;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930934';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 81.46;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930917';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.95;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930940';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.95;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930952';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.93;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930974';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 68.75;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930103';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 75.24;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930914';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 93.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930985';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 77.96;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930978';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.35;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930912';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 87.50;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930906';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 77.48;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930907';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 81.96;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930924';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 96.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930943';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.30;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930913';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 77.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930997';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.70;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930977';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.40;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930968';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.54;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930942';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.25;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930988';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 68.75;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930984';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90.48;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930959';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 93.45;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930925';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.05;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 23;
        $grade->student_no = '041930919';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        // Class ID: 24 (ComPro1)

        $grade = new Grade;
        $grade->prelims = 88.18;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930937';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.55;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930962';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.68;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930953';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.85;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930927';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 96.00;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930949';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.23;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930958';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.10;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930996';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 95.35;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930910';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 87.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930975';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.53;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930944';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.35;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930928';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 95.95;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930939';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90.73;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041700686';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 93.88;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041931007';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 95.23;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930931';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.13;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930987';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 96.58;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930909';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 97.55;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930995';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.98;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041931010';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 82.25;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930970';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.30;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930920';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 87.83;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930911';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.60;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930908';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 84.05;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041931011';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.60;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930966';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.60;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041931013';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041931009';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 94.78;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930916';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 93.53;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930929';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90/98;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041931008';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 93.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 24;
        $grade->student_no = '041930951';
        $grade->curriculum_details_id = 60; // ComPro1
        $grade->save();

        // Class ID: 25 (PlatTech)

        $grade = new Grade;
        $grade->prelims = 93.06;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 25;
        $grade->student_no = '041830886';
        $grade->curriculum_details_id = 78; // PlatTech
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.77;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 25;
        $grade->student_no = '041830883';
        $grade->curriculum_details_id = 78; // PlatTech
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 83.05;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 25;
        $grade->student_no = '041830890';
        $grade->curriculum_details_id = 78; // PlatTech
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 77.18;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 25;
        $grade->student_no = '041830895';
        $grade->curriculum_details_id = 78; // PlatTech
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 93.08;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 25;
        $grade->student_no = '041830884';
        $grade->curriculum_details_id = 78; // PlatTech
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.95;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 25;
        $grade->student_no = '041830899';
        $grade->curriculum_details_id = 78; // PlatTech
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 93.96;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 25;
        $grade->student_no = '041830896';
        $grade->curriculum_details_id = 78; // PlatTech
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 95.98;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 25;
        $grade->student_no = '041322078';
        $grade->curriculum_details_id = 78; // PlatTech
        $grade->save();

        // Class ID: 26 (Anmod)

        $grade = new Grade;
        $grade->prelims = 94.25;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 26;
        $grade->student_no = '041830886';
        $grade->curriculum_details_id = 80; // Anmod
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 96.07;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 26;
        $grade->student_no = '041830883';
        $grade->curriculum_details_id = 80; // Anmod
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.20;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 26;
        $grade->student_no = '041830890';
        $grade->curriculum_details_id = 80; // Anmod
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.33;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 26;
        $grade->student_no = '041830895';
        $grade->curriculum_details_id = 80; // Anmod
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 75.74;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 26;
        $grade->student_no = '041931022';
        $grade->curriculum_details_id = 80; // Anmod
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 92.83;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 26;
        $grade->student_no = '041830884';
        $grade->curriculum_details_id = 80; // Anmod
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.39;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 26;
        $grade->student_no = '041830899';
        $grade->curriculum_details_id = 80; // Anmod
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 90.99;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 26;
        $grade->student_no = '041830896';
        $grade->curriculum_details_id = 80; // Anmod
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 93.63;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 26;
        $grade->student_no = '041322078';
        $grade->curriculum_details_id = 80; // Anmod
        $grade->save();

        // Class ID: 27 (Datstruc)

        $grade = new Grade;
        $grade->prelims = 88.53;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 27;
        $grade->student_no = '041830886';
        $grade->curriculum_details_id = 76; // Datstruc
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 85.38;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 27;
        $grade->student_no = '041830883';
        $grade->curriculum_details_id = 76; // Datstruc
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 88.90;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 27;
        $grade->student_no = '041830890';
        $grade->curriculum_details_id = 76; // Datstruc
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 62.35;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 27;
        $grade->student_no = '041830895';
        $grade->curriculum_details_id = 76; // Datstruc
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 82.75;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 27;
        $grade->student_no = '041830884';
        $grade->curriculum_details_id = 76; // Datstruc
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 84.48;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 27;
        $grade->student_no = '041830899';
        $grade->curriculum_details_id = 76; // Datstruc
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 80.28;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 27;
        $grade->student_no = '041830896';
        $grade->curriculum_details_id = 76; // Datstruc
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 98.58;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 27;
        $grade->student_no = '041322078';
        $grade->curriculum_details_id = 76; // Datstruc
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 75.58;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 27;
        $grade->student_no = '999910003';
        $grade->curriculum_details_id = 76; // Datstruc
        $grade->save();

        // Class ID: 28 (OOP)

        $grade = new Grade;
        $grade->prelims = 90.75;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 28;
        $grade->student_no = '041830886';
        $grade->curriculum_details_id = 77; // OOP
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.75;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 28;
        $grade->student_no = '041830883';
        $grade->curriculum_details_id = 77; // OOP
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.75;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 28;
        $grade->student_no = '041830890';
        $grade->curriculum_details_id = 77; // OOP
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 78.50;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 28;
        $grade->student_no = '041830895';
        $grade->curriculum_details_id = 77; // OOP
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 86.93;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 28;
        $grade->student_no = '041830884';
        $grade->curriculum_details_id = 77; // OOP
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 89.18;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 28;
        $grade->student_no = '041830899';
        $grade->curriculum_details_id = 77; // OOP
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 91.25;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 28;
        $grade->student_no = '041830896';
        $grade->curriculum_details_id = 77; // OOP
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 98.75;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 28;
        $grade->student_no = '041322078';
        $grade->curriculum_details_id = 77; // OOP
        $grade->save();

        $grade = new Grade;
        $grade->prelims = 79.50;
        $grade->midterms = null;
        $grade->finals = null;
        $grade->class_id = 28;
        $grade->student_no = '041931022';
        $grade->curriculum_details_id = 77; // OOP
        $grade->save();
    }
}
