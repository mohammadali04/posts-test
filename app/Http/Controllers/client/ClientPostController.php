<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ClientPostController extends Controller
{
    public $time;
  
    public function index(){
        $posts_share = Post::where('release_date', "<=", now())->get();

        return view('client.posts',compact('posts_share'));
    }
    public function showPost(Post $post){
        $time=time();
        $this->time=$time;
        $time_share=strtotime($post->updated_at)+($post->time*60);
        $post_share='';
        if($this->time>=$time_share){
            $post_share=$post;
            return view('client.post',compact('post_share'));
        }
        // dd(strtotime($post->updated_at)+(2*60));
    }
    public function recentlyPosts(){
        $posts=Post::latest()->get();
        return view('client.posts',compact('posts'));
    }
}
