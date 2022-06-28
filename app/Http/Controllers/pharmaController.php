<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pharmaController extends Controller
{
   public function search(Request $request){
    echo $request;
    $utc_dep = DB::select('CALL search_pharma(?)', [$request->input('buscar')]);
    return $utc_dep;
    }


}

