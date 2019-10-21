<?php

namespace App\Http\Controllers;

use App\Models\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function setCurAcadTerm($acad_term_id) {
        $id = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->setting_id;

        $setting = Setting::find($id);
        $setting->value = $acad_term_id;
        $setting->save();

        return redirect('/acad_terms')->with('success', 'Current Academic Term Updated');
    }

    public function setCurCurriculum($curriculum_id) {
        $id = Setting::where('name', 'LIKE', 'Current Curriculum')->first()->setting_id;

        $setting = Setting::find($id);
        $setting->value = $curriculum_id;
        $setting->save();

        return redirect('/curriculums')->with('success', 'Current Curriculum Updated');
    }
}
