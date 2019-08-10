<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

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
        $posts = $user->posts()->paginate(6);

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
            'cover_image' => 'image|nullable'
        ]);

       // Handle File Upload
       if($request->hasFile('cover_image')) {
            // Get the filename with the extension
            $fileNameWithTheExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithTheExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload the Image
            $path = $request->file('cover_image')->storeAs('cover_images', $fileNameToStore, 'public');
        } else {
            $fileNameToStore = 'default.jpg';
        }

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->user_id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
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
        if(auth()->user()->user_id != $post->user_id) {
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

        // Handle File Upload
        if($request->hasFile('cover_image')) {
            // Get the filename with the extension
            $fileNameWithTheExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithTheExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload the Image
            $path = $request->file('cover_image')->storeAs('cover_images', $fileNameToStore, 'public');
        }

        // Update Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->updated_at = now();

        if($request->hasFile('cover_image')) {
            if($post->cover_image != 'default.jpg') {
                // Delete Image
                Storage::disk('public')->delete('cover_images/'. $post->cover_image);
            }

            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
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
        if(auth()->user()->user_id != $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        $post->delete();

        if($post->cover_image != 'default.jpg') {
            Storage::disk('public')->delete('cover_images/'. $post->cover_image);
        }

        return redirect('/posts')->with('success', 'Post Removed');
    }
}
