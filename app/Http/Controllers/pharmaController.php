<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharma;
use Illuminate\Support\Facades\DB;


class pharmaController extends Controller
{
   public function request_(Request $request){

    $farmacia  = Pharma::findOrFail($request->input('pharma'));
    $farmacia->lat =  $request->input('lat');
    $farmacia->lng =   $request->input('lng');
    $farmacia->img =  $request->input('img');
    $farmacia->adress_real = $request->input('adress');
    $farmacia->status = 'OK';
    $farmacia->save();

    return redirect()->back()->with(["message" => "Pharma Update successfully"]);
    }

    //PAGINAR FARMACIAS
    public function list_(){
            $list_pharma = DB::table('phar')->where('status', 'OK')->simplepaginate(5);

            //return $list_pharma;
            return  view('form_geo.listar', ['lista'=> $list_pharma]);
        }



    // traer localidades de ubicacion
    public function select(Request $request ){
        $res = DB::select('select * from tst_utc_forma(?)',  [$request->google]);
        return $res;
    }

    //traer cadena

    public function search_pharma(Request $request){
        //$res = DB::select('call pharma_local_independiente(?, ?)',  [$request->local,$request->tipo]);
        $res = DB::select('select * from pharma_local_independiente(?, ?)', [$request->local,$request->tipo]);
        return $res;
    }


    //TRAER FARMACIAS
    public function search_pharma_cadena(Request $request){
        //$res = DB::select('CALL pharma_local_cadenas(?,?,?)',  [$request->local,$request->nom_cad,$request->tipo]);
        $res = DB::select('select * from pharma_local_cadenas(?,?,?)', [$request->local,$request->nom_cad,$request->tipo]);
        return $res;
    }



}

