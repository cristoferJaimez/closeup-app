<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeReport extends Model
{
    use HasFactory;

     // Relation one to more
     public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
