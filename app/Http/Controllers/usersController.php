<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
class usersController extends Controller
{
  
    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }
    
    public function index()
    {
    $user = $this->user->index();
    return view('index', ['user' => $user]);
    }    
    

    public function userId($id)
    {
     $user = DB::table('users')
        ->select(['name', 'id'])
        ->where('id' , $id)
        ->get();   

     return view('home.post', ['user'=> $user]);
    }    
    





    public function index_home()
    {
    $user = $this->user->index();
    return view('home/home', ['user' => $user]);
    }    
    

}