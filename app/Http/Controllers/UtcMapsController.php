<?php

namespace App\Http\Controllers;

use App\Models\Geo_utc;
use Illuminate\Http\Request;
use App\Models\Region;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class UtcMapsController extends Controller
{



    //ajax request
    public function ajaxReq(Request $request)
    {
       $utc = DB::select('CALL colombiadb.ubicacion_utc(?)', [$request->input('nieve')]);
       return $utc;       
    }

      //ajax request
      public function listUTC(Request $request)
      {
         $utc = DB::select('CALL colombiadb.list_utc()');
         return  view('UTC.layout.listUTC', compact('utc'));       
      }

  
    //show all
    public function show(Request $request)
    {
        $regiones = Region::all();
        $list = DB::select('CALL colombiadb.list_utc()');
        return view('UTC.index', ['regiones' => $regiones, 'list'=> $list]);
    }
}
