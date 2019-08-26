<?php

namespace App\Http\Controllers;

use App\Models\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function setCurAcadTerm($acad_term_id) {
        $id = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->setting_id;

        $setting = Setting::find($id);
        $setting->value = $acad_term_id;
        $setting->save();

        return redirect('/acad_terms')->with('success', 'Current Academic Term Updated');
    }
}
