<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\typeReport;



class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'title',
        'url',
        'description',
        'user_id',
        'category_id',
    ];

    protected $hidden = [
    ];

    
    public function getAll(){
      return Post::all();   
    }

    public function create(Request $request ){
        return Post::created($request);
    }


    //Relation one to more (invertida)
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relation one to more (invertida)
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Relation one to more (invertida)
    public function type(){
        return $this->belongsTo(typeReport::class);
    }


    
}
    
