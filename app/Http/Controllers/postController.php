<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\typeReport;
 
class postController extends Controller
{
    
    public function public(Request $request){
        $post = new Post($request->input());
        $post->save();
        return redirect()->back()->with(["message" => "Message sent"]);
    }


    public function list(){
        $posts = Post::all(); 
        $type = typeReport::all();  
        $cate = Category::all();
        $user = User::all();
        return view('home.listPost', ['posts' => $posts, 'type' => $type, 'cate'=> $cate, 'user' => $user]);
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