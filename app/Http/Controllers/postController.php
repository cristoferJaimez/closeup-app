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
}
