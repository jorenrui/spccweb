<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use JD\Cloudder\Facades\Cloudder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(6);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'nullable|mimes:jpeg,bmp,jpg,png|between:1, 6000'
        ]);

        // Handle File Upload via Cloudder
        if ($request->hasFile('cover_image')) {
            $cover_image = $request->file('cover_image');

            // Get the filename with the extension
            $filename = $cover_image->getClientOriginalName();

            // Get just filename
            $filename = time() . '_' . pathinfo($filename, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Upload the Image
            $upload = Cloudder::upload($cover_image, $filename, [
                'folder' => 'cover_images'
            ]);

            $fileNameToStore = $filename . '.' . $extension;
        } else {
            $fileNameToStore = 'default-female.png';
        }

        if(auth()->user()->hasRole('moderator') || auth()->user()->hasRole('admin')) {
            $status = 'Published';
        } else {
            $status = 'Pending';
        }

        if($upload){
            // Create Post
            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->user_id;
            $post->cover_image = $fileNameToStore;
            $post->status = $status;
            $post->save();
        }

        if(auth()->user()->hasRole('moderator') || auth()->user()->hasRole('admin')) {
            return redirect('/posts')->with('success', 'Post Published');
        }

        return redirect('/posts' . '/' . $id)->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(!auth()->user()->hasPermissionTo('edit posts') &&
            auth()->user()->user_id != $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable'
        ]);

        // Handle File Upload via Cloudder
        if ($request->hasFile('cover_image')) {
            $cover_image = $request->file('cover_image');

            // Get the filename with the extension
            $filename = $cover_image->getClientOriginalName();

            // Get just filename
            $filename = time() . '_' . pathinfo($filename, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Upload the Image
            $upload = Cloudder::upload($cover_image, $filename, [
                'folder' => 'cover_images'
            ]);

            $fileNameToStore = $filename . '.' . $extension;
        }

        // Update Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->updated_at = now();

        if($request->hasFile('cover_image')) {
            if(!($post->cover_image == 'default-female.jpg' || $post->cover_image == 'default-male.jpg')) {
                // Delete Image
                $filename = pathinfo($post->cover_image, PATHINFO_FILENAME);
                Cloudder::destroy('cover_images/'. $filename);
            }

            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect('/posts' . '/' . $id)->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(!auth()->user()->hasPermissionTo('delete posts') &&
            auth()->user()->user_id != $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        $post->delete();

        if(!($post->cover_image == 'default-female.jpg' || $post->cover_image == 'default-male.jpg')) {
            $filename = pathinfo($post->cover_image, PATHINFO_FILENAME);
            Cloudder::destroy('cover_images/'. $filename);
        }

        return redirect('/posts')->with('success', 'Post Removed');
    }

    public function published() {
        $posts = Post::where('status', 'LIKE', 'Published')
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);

        return view('posts.published')->with('posts', $posts);
    }

    public function publish($id) {
        $post = Post::find($id);
        $post->status = 'Published';
        $post->save();

        return redirect('/posts/mod/approval')->with('success', 'Post Published');
    }

    public function approval() {
        $posts = Post::where('status', 'LIKE', 'Pending')
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);

        return view('posts.approval')->with('posts', $posts);
    }

}
