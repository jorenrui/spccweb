<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use App\Models\Setting;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $tot_posts = count(Post::all());

        $posts = Post::where('status', 'LIKE', 'Published')
                        ->orderBy('created_at', 'desc')
                        ->limit(3)
                        ->get();

        $events = Event::where('start_date', '>=', date('Y-m-d'))
                        ->orWhere('end_date', '<=', date('Y-m-d'))
                        ->limit(4)
                        ->orderBy('start_date')
                        ->get();

        $annoucement = Setting::where('name', 'LIKE', 'Annoucement')->get();

        if(count($annoucement) > 0)
            $annoucement = $annoucement[0]->value;
        else
            $annoucement = null;

        return view('pages.index')->with(compact('posts', 'events', 'tot_posts', 'annoucement'));
    }

    public function about()
    {
        $tot_posts = count(Post::all());

        return view('pages.about')->with('tot_posts', $tot_posts);
    }

    public function news()
    {
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

    public function articles($id)
    {
        $tot_posts = count(Post::all());

        $post = Post::find($id);

        return view('pages.article')->with(compact('post', 'tot_posts'));
    }

    public function admission()
    {
        $tot_posts = count(Post::all());

        return view('pages.admission')->with('tot_posts', $tot_posts);
    }

    public function team()
    {
        return view('pages.team');
    }

    public function forgotPassword()
    {
        return view('auth.forgot_password');
    }
}
