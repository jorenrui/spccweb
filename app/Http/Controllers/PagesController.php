<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function about() {
        return view('pages.about');
    }

    public function news() {
        return view('pages.news');
    }

    public function article() {
        return view('pages.article');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function enroll() {
        return view('pages.enroll');
    }

    public function team() {
        return view('pages.team');
    }
}
