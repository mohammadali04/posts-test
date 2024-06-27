<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.manage-posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'title' => 'required',
            'img' => 'required',
            'body' => 'required',
        ]);
        $time_request = $request->time;
            try {
                Post::create(['body' => $request->body, 'img' => $request->img, 'title' => $request->title, 'user_id' => auth()->user()->id,'time'=>$request->time]);
            } catch (Exception $exception) {
                return redirect()->back();
            }
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.update-post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validationData = $request->validate([
            'title' => 'required',
            'img' => 'required',
            'body' => 'required',
            'time' => 'required',
        ]);
        
        try {
                $post->title = $request->title;
                $post->time = $request->time;
                $post->img = $request->img;
                $post->body = $request->body;
                $post->user_id = auth()->user()->id;
                $post->time=$request->time;
                $post->save();
            } catch (Exception $exception) {
                return redirect()->back();
            }
            return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Post::destroy($request->ids);
    }
}