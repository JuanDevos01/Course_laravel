<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('curso2.posts', compact('posts'));
    }

    public function create(){
        return view('curso2.create');
    }
    public function show($post){

        $post = Post::find($post);
        return view('curso2.show',compact('post'));
        //se puede hacer de estas 2 formas
        // return view('curso2.show',[
        //  'post' => $post   
        // ]);
    
    }
}
