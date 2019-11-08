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
            'cover_image' => 'required|mimes:jpeg,bmp,jpg,png|between:1, 6000'
        ]);

        $cover_image = $request->file('cover_image');

        // Get the filename with the extension
        $filename = $cover_image->getClientOriginalName();

        // Get just filename
        $filename = time() . '_' . pathinfo($filename, PATHINFO_FILENAME);

        // Get just ext
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        $fileNameToStore = $filename . '.' . $extension;

        // Upload the Image
        $request->file('cover_image')->storeAs('cover_images', $fileNameToStore, 'public');


        if(auth()->user()->hasRole('moderator') || auth()->user()->hasRole('admin')) {
            $status = 'Published';
        } else {
            $status = 'Pending';
        }

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->status = $status;
        $post->save();

        if(auth()->user()->hasRole('moderator') || auth()->user()->hasRole('admin')) {
            return redirect('/posts')->with('success', 'Post Published');
        }

        return redirect('/posts/' . $post->post_id)->with('success', 'Post Created');
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

        // Check for correct user
        if($post->status == 'Pending') {

            $hasPermission = auth()->user()->id == $post->user_id;
            $isModerator = auth()->user()->hasRole('moderator') || auth()->user()->hasRole('admin');

            if(!($hasPermission || $isModerator)) {
                return redirect('/dashboard')->with('error', 'Unauthorized Page');
            }
        }

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
            auth()->user()->id != $post->user_id) {
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
            'cover_image' => 'nullable|mimes:jpeg,bmp,jpg,png|between:1, 6000'
        ]);

        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            $cover_image = $request->file('cover_image');

            // Get the filename with the extension
            $filename = $cover_image->getClientOriginalName();

            // Get just filename
            $filename = time() . '_' . pathinfo($filename, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $filename . '.' . $extension;

            // Upload the Image
            $request->file('cover_image')->storeAs('cover_images', $fileNameToStore, 'public');
        }

        // Update Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->updated_at = now();

        if($request->hasFile('cover_image')) {
            Storage::disk('public')->delete('cover_images/'. $post->cover_image);
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect('/posts/' . $post->post_id)->with('success', 'Post Updated');
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
            auth()->user()->id != $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        $post->delete();

        Storage::disk('public')->delete('cover_images/'. $post->cover_image);

        if(auth()->user()->hasRole('moderator') || auth()->user()->hasRole('admin')) {
            return redirect('/posts/mod/published')->with('success', 'Post Removed');
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
