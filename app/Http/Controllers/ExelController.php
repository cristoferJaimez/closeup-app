<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Pharma;
class ExelController extends Controller
{

    /**
    * @return \Illuminate\Support\Collection
    */

    public function export()
    {
        return Excel::download(new UsersExport, 'pharma.xlsx');
    }


}
