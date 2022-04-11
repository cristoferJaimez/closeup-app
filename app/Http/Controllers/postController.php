<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class postController extends Controller
{
    
    public function public(Request $request){
        $post = new Post($request->input());
        $post->save();
        return redirect()->back()->with(["message" => "Message sent"]);
    }


    public function list(){
        $posts = Post::all();
        return view('home.listPost', ['posts' => $posts]);
    }

    //listar por usuario
    public function listID(){
        $post = Post::all();
        return view('home.home', ['post' => $post]);
        }


    

}
