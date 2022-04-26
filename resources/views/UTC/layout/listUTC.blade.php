@extends('layout.app')
@section('contenido')

@include('home.navbar')
@include('home.navbutton')
    <div class="container">
        <div class="row">

            <div class="card p-3 mt-3 m-3">

                <form action="" class="mb-3">
                    <input type="search" placeholder="Search UTC" class="form-control">
                </form>

               

                <table class="table table-sm table-striped table-hover">
                    <thead class="text-center">
                        <th>UTC</th>
                        <th style="width: 250px">Area</th>
                        <th>Departament</th>
                        <th>Municipality</th>
                        <th>Locality</th>
                        <th style="width: 250px">Neighborhood</th>
                    </thead>
                    <tbody class="text-center">
                        
                        @foreach ($utc as $item => $val)
                        <tr class=""  style="font-size: 0.7em">
                            <td>{{ json_encode($val->co_barrio)}}</td>
                            <td>{{ json_encode($val->region)}}</td>
                            <td>{{ json_encode($val->departamento)}}</td>
                            <td>{{ json_encode($val->municipio)}}</td>
                            <td>{{ json_encode($val->localidad)}}</td>
                            <td>{{ json_encode($val->desc_utc)}}</td>
                        </tr>
                    @endforeach 
                    </tbody>
                </table>  
                                
            </div>
        </div>
    </div>

@endsection