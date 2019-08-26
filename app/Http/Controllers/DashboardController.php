<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
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

        return view('dashboard')
                    ->with('posts', $posts)
                    ->with('events', $events)
                    ->with('curAcadTerm', $curAcadTerm);
    }
}
