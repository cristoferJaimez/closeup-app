<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'title',
        'url',
        'description',
        'user_id',
        'catory_id',
    ];

    protected $hidden = [
        'id',
        'url',
        'user_id',
        'catory_id',
    ];

    
    public function getAll(){
      return Post::all();   
    }

    public function create(Request $request ){
        return Post::created($request);
    }


    //Relation one to more (invertida)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Relation one to more (invertida)
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }


    
}

