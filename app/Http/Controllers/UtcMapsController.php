<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
class UtcMapsController extends Controller
{
    public function show(){
        $regiones = Region::all();
        return view('UTC.index', ['regiones' => $regiones]);
    }
}
