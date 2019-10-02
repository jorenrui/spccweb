<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use App\Models\User;
use App\Models\Student;
use App\Models\SClass;
use App\Models\AcadTerm;
use App\Models\Setting;

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

        $cur_acad_term_id = Setting::where('name', 'LIKE', 'Current Acad Term')->get()[0]->value;
        $curAcadTerm = AcadTerm::find($cur_acad_term_id);

        // For Statistics
        $tot_students = count(Student::where('acad_term_admitted_id', 'LIKE', $cur_acad_term_id)->get());
        $tot_classes = count(SClass::where('acad_term_id', 'LIKE', $cur_acad_term_id)->get());
        $tot_instructors = count(User::whereHas("roles",
                            function($q){ $q->where('name', 'faculty'); })->get());
        $tot_users = count(User::all());

        return view('dashboard')
                    ->with('posts', $posts)
                    ->with('events', $events)
                    ->with('curAcadTerm', $curAcadTerm)
                    ->with('tot_students', $tot_students)
                    ->with('tot_classes', $tot_classes)
                    ->with('tot_instructors', $tot_instructors)
                    ->with('tot_users', $tot_users);
    }
}
