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

    public function list_(){
            $list_pharma = DB::table('phar')->where('status', 'OK')->paginate(10);

            //return $list_pharma;
            return  view('form_geo.listar', ['lista'=> $list_pharma]);
        }


}

