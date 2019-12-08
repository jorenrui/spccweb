<?php

use App\Models\Setting;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $setting = new Setting;
        $setting->name = 'Degree';
        $setting->value = 'Bachelor of Science in Information Technology';
        $setting->save();

        $setting = new Setting;
        $setting->name = 'Current Acad Term';
        $setting->value = '202101';
        $setting->save();

        $setting = new Setting;
        $setting->name = 'Current Curriculum';
        $setting->value = '2018';
        $setting->save();

        $setting = new Setting;
        $setting->name = 'Annoucement';
        $setting->value = 'For new enrollees on November, please go to the registrar\'s office at 1PM onwards.';
        $setting->save();
    }
}
