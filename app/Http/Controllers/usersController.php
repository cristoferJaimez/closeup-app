<?php

namespace App\Http\Controllers;

use App\Models\User;

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
    
}