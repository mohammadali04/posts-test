<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ClientPostController extends Controller
{
    public $time;
  
    public function index(){
        $time=time();
        $this->time=$time;
        $posts=Post::all();
        $posts_share=[];
        foreach($posts as $post){
            $time_share=strtotime($post->updated_at)+($post->time*60);
            if($this->time>=$time_share){
                array_push($posts_share,$post);
            }
        }
        if(count($posts_share)!=0){
        return view('client.posts',compact('posts_share'));
        }else{
            $msg='فعلا پستی وجود ندارد';
            return view('client.message',compact('msg'));
        }        
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
