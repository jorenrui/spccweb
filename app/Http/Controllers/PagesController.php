<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Home';

        return view('pages.index')->with('title', $title);
    }

    public function about() {
        $title = 'About';

        return view('pages.about')->with('title', $title);
    }

    public function contact() {
        $title = 'Contact';

        return view('pages.contact')->with('title', $title);
    }

    public function enroll() {
        $title = 'Enroll';

        return view('pages.enroll')->with('title', $title);
    }

    public function team() {
        $title = 'Team';

        return view('pages.team')->with('title', $title);
    }
}
