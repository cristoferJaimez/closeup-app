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
        /*join consultamanual
        $res = Pharma::select('phar.id',
                              'phar.utc',
                              'phar.name_original',
                              'phar.cadena',
                              'neighborhoods.desc_utc',
                              //' municipalities.municipio',
                              'departments.departamento',
                              'phar.nom_cadena')
       ->join('neighborhoods', 'neighborhoods.co_barrio', '=', 'phar.utc')
       ->join('geo_utc', 'geo_utc.barrio_id' ,'=' ,	'neighborhoods.id'	)
       ->join( 'municipalities', 'municipalities.id', '=' ,'geo_utc.municipio_id')
       ->join('departments', 'departments.id', '=', 'geo_utc.departamento_id' )
       ->where( 'departments.departamento' ,'LIKE' , $request->google.'%')
       ->get();

        return $res;
*/
        //$res = DB::select('select * from tst_utc_forma(?)',  [$request->google]);
        //$res = DB::select('CALL utc_geo_forma(?)',  [$request->google]);
        //
        $res = DB::select('select * from phar LEFT JOIN neighborhoods on neighborhoods.co_barrio=phar.utc LEFT JOIN geo_utc on geo_utc.barrio_id = 	neighborhoods.id LEFT JOIN municipalities on municipalities.id = geo_utc.municipio_id LEFT JOIN departments on departments.id = geo_utc.departamento_id  WHERE municipalities.municipio LIKE CONCAT("%" , ? , "%")', [$request->google],);
        return $res;


    }

    //traer cadena

    public function search_pharma(Request $request){
        $res = DB::select('call pharma_local_independiente(?, ?)',  [$request->local,$request->tipo]);
        return $res;
    }


    //TRAER FARMACIAS
    public function search_pharma_cadena(Request $request){

        $res = DB::select('CALL pharma_local_cadenas(?,?,?)',  [$request->local,$request->nom_cad,$request->tipo]);
        return $res;
    }



}

