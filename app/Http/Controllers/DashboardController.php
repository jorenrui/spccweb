<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use App\Models\User;
use App\Models\Student;
use App\Models\SClass;
use App\Models\AcadTerm;
use App\Models\Curriculum;
use App\Models\Setting;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::where('status', 'LIKE', 'Published')->orderBy('created_at', 'desc')
                        ->limit(5)->get();

        $events = Event::orderBy('start_date', 'desc')->limit(5)->get();

        $cur_acad_term_id = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;
        $curAcadTerm = AcadTerm::find($cur_acad_term_id);

        // For Statistics
        $tot_students = count(Student::where('acad_term_admitted_id', 'LIKE', $cur_acad_term_id)->get());
        $tot_classes = count(SClass::where('acad_term_id', 'LIKE', $cur_acad_term_id)->get());
        $tot_instructors = count(User::whereHas("roles",
                            function($q){ $q->where('name', 'faculty'); })->get());
        $tot_users = count(User::all()) - 1;

        $annoucement = Setting::where('name', 'LIKE', 'Annoucement')->first()->value;

        return view('dashboard')
                    ->with('posts', $posts)
                    ->with('events', $events)
                    ->with('curAcadTerm', $curAcadTerm)
                    ->with('tot_students', $tot_students)
                    ->with('tot_classes', $tot_classes)
                    ->with('tot_instructors', $tot_instructors)
                    ->with('tot_users', $tot_users)
                    ->with('annoucement', $annoucement);
    }

    public function about()
    {
        return view('about');
    }

    public function settings()
    {
        $cur_acad_term_id = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->value;
        $cur_curriculum_id = Setting::where('name', 'LIKE', 'Current Curriculum')->first()->value;
        $degree = Setting::where('name', 'LIKE', 'Degree')->first()->value;
        $annoucement = Setting::where('name', 'LIKE', 'Annoucement')->first()->value;

        $acad_terms = AcadTerm::all();
        $curriculums = Curriculum::all();

        return view('settings')
                ->with('cur_acad_term_id', $cur_acad_term_id)
                ->with('cur_curriculum_id', $cur_curriculum_id)
                ->with('degree', $degree)
                ->with('annoucement', $annoucement)
                ->with('acad_terms', $acad_terms)
                ->with('curriculums', $curriculums);

    }

    public function updateSettings(Request $request)
    {
        $this->validate($request, [
            'annoucement' => 'required',
            'degree' => 'required',
            'acad_term_id' => 'required',
            'curriculum_id' => 'required'
        ]);

        $setting_id = Setting::where('name', 'LIKE', 'Annoucement')->first()->setting_id;

        $setting = Setting::find($setting_id);
        $setting->value = $request->input('annoucement');
        $setting->save();

        $setting_id = Setting::where('name', 'LIKE', 'Degree')->first()->setting_id;

        $setting = Setting::find($setting_id);
        $setting->value = $request->input('degree');
        $setting->save();

        $setting_id = Setting::where('name', 'LIKE', 'Current Acad Term')->first()->setting_id;

        $setting = Setting::find($setting_id);
        $setting->value = $request->input('acad_term_id');
        $setting->save();

        $setting_id = Setting::where('name', 'LIKE', 'Current Curriculum')->first()->setting_id;

        $setting = Setting::find($setting_id);
        $setting->value = $request->input('curriculum_id');
        $setting->save();

        return redirect('/settings')->with('success', 'Settings Updated');
    }

    public function annoucement()
    {
        $annoucement = Setting::where('name', 'LIKE', 'Annoucement')->first()->value;

        return view('annoucement.edit')->with('annoucement', $annoucement);
    }

    public function updateAnnoucement(Request $request)
    {
        $this->validate($request, [
            'annoucement' => 'required'
        ]);

        $setting_id = Setting::where('name', 'LIKE', 'Annoucement')->first()->setting_id;

        $setting = Setting::find($setting_id);
        $setting->value = $request->input('annoucement');
        $setting->save();

        return redirect('/dashboard')->with('success', 'Annoucement Updated');
    }
}
