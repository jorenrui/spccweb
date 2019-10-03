<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $tot_posts = count(Post::all());

        $posts = Post::where('status', 'LIKE', 'Published')
                        ->orderBy('created_at', 'desc')
                        ->limit(3)
                        ->get();

        $events = Event::limit(4)->get();

        return view('pages.index')->with(compact('posts', 'events', 'tot_posts'));
    }

    public function about() {
        $tot_posts = count(Post::all());

        return view('pages.about')->with('tot_posts', $tot_posts);
    }

    public function news() {
        $tot_posts = count(Post::all());

        $latest_post = Post::where('status', 'LIKE', 'Published')
                            ->orderBy('created_at', 'desc')
                            ->limit(1)
                            ->get();

        $posts = Post::where('status', 'LIKE', 'Published')
                        ->orderBy('created_at', 'desc')
                        ->paginate(15);

        return view('pages.news')->with(compact('latest_post', 'posts', 'tot_posts'));
    }

    public function articles($id) {
        $tot_posts = count(Post::all());

        $post = Post::find($id);

        return view('pages.article')->with(compact('post', 'tot_posts'));
    }

    public function contact() {
        $tot_posts = count(Post::all());

        return view('pages.contact')->with('tot_posts', $tot_posts);
    }

    public function admission() {
        $tot_posts = count(Post::all());

        return view('pages.admission')->with('tot_posts', $tot_posts);
    }

    public function team() {
        return view('pages.team');
    }
}
