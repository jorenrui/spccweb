<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $posts = Post::where('status', 'LIKE', 'Published')
                        ->orderBy('created_at', 'desc')
                        ->limit(3)
                        ->get();

        return view('pages.index')->with('posts', $posts);
    }

    public function about() {
        return view('pages.about');
    }

    public function news() {
        $latest_post = Post::where('status', 'LIKE', 'Published')
                            ->orderBy('created_at', 'desc')
                            ->limit(1)
                            ->get();

        $posts = Post::where('status', 'LIKE', 'Published')
                        ->orderBy('created_at', 'desc')
                        ->paginate(15);

        return view('pages.news')->with(compact('latest_post', 'posts'));;
    }

    public function articles($id) {
        $post = Post::find($id);

        return view('pages.article')->with('post', $post);
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
