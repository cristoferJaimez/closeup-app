<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\Category;
use App\Models\typeReport;

class usersController extends Controller
{
  
    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }
    

    //listar usuarios
    public function index()
    {
    $user = $this->user->index();
    return view('index', ['user' => $user]);
    }    
    

    //save users new
    public function saveUser(Request $request){
        $user = new User($request->input());
        $user['password'] = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with(["message" => "user saved successfully"]);
    }


    // obtenr user por id
    public function userId($id)
    {
     $user = DB::table('users')
        ->select(['name', 'id'])
        ->where('id' , $id)
        ->get();   

     return view('home.post', ['user'=> $user]);
    }    
    





    //listar usuarios en home
    public function index_home()
    {
    $user = $this->user->index();
    return view('home/home', ['user' => $user]);
    }  
    
    
     //listar usuarios en home
     public function index_listUsers()
     {
     $user = $this->user->index();
     $rol = Rol::all();
     return view('home/listUsers', ['user' => $user]);
     }  


     //view category and type an rol
     
     public function category(){
        $category = Category::all();
        $type = typeReport::all();
        $rol = Rol::all();

        return view('home.category_type', ['category'=> $category, 'type' => $type, 'rol' => $rol]);
     }

}