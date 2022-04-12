<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function listID($id){
        $post = Post::orderBy('created_at', 'desc')
                        ->where('user_id', $id)
                        ->limit(1)
                        ->get();
        return view('home.postList', ['post' => $post]);
        }


        public function oldList($id){
            $post = Post::orderBy('created_at', 'desc')
                            ->where('user_id', $id)
                            ->get();
            return view('home.oldpost', ['post' => $post]);
            }
    
    

}