<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtcMapsController extends Controller
{
    public function show(){
        return view('UTC.index');
    }
}
