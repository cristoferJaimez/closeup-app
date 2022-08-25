@extends('layout.app')
@include('home.load')
@section('contenido')
    <style>
        table {
            border: none
        }

        #legend {
            font-family: Arial, sans-serif;
            background: #fff;
            padding: 10px;
            margin: 10px;
            border: 3px solid #000;
        }

        #legend h3 {
            margin-top: 0;
        }

        #legend img {
            vertical-align: middle;
        }
    </style>
    <div class="container-fluit">
        <div class="row">
            <div class=" col-md-12 col-sm-12" style="z-index: 2">
                <!-- Autocomplete location search input -->

                <div class="btn-group mt-3 position-absolute top-0 start-50 translate-middle-x col-6 " role="group"
                    aria-label="Basic checkbox toggle button group">

                    <input type="search" class="form-control form-control-md search_input col-12" id="search_input"
                        class="" autofocus />

                    <i class="fa-solid fa-map-pin  btn-warning m-2 d-none" onclick="init()"></i>
                    <i class="fa-solid fa-print btn  btn-primary m-2" onclick="print()"></i>

                    <form action="{{ url('logout') }}" style="display: inline; " method="POST">
                        @csrf
                        <button class="btn btn-danger mt-2" type="submit"> <i
                                class="fa-solid fa-arrow-right-from-bracket"></i></button>
                    </form>


                </div>


                @include('maps_google.sidebar')





                <div class="position-absolute top-0 end-0 translate-middle-y" style="margin-right: 10px;margin-top: 18%">


                        <div class="row align-items-start">
                            <div class="tbl_info  d-none">



                                <table class="table table-sm  table-bordered fs-6 bg-white" style="font-size: 0.7em;">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 1em" colspan="4"
                                                class="table-active text-center bg-info text-white">
                                                <select class="form-select form-select-sm" style="font-size: 0.7em"
                                                aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1"> <i class="fa-solid fa-flask-vial"></i> Laboratorio</option>
                                                <option value="2"> <i class="fa-solid fa-box"></i> Producto</option>
                                                <option value="3"><i class="fa-solid fa-dna"></i> Mol&eacute;cula</option>
                                            </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="font-size: 0.7em" colspan="4"
                                                class="table-active text-center bg-info text-white">TOTAL</th>
                                        </tr>
                                        <tr style="font-size: 0.7em">
                                            <th class="table-active text-center">TOP.</th>
                                            <th class="table-active text-center">PESOS.</th>
                                            <th class="table-active text-center">UND.</th>
                                            <th class="table-active text-center">VAL</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center fs-6 " style="font-size: 0.7em">
                                        <tr style="font-size: 0.7em">
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr style="font-size: 0.7em">
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr style="font-size: 0.7em">
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr style="font-size: 0.7em">
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr style="font-size: 0.7em">
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr style="font-size: 0.7em">
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr style="font-size: 0.7em">
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr style="font-size: 0.7em">
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr style="font-size: 0.7em">
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr style="font-size: 0.7em">
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>

                                    </tbody>
                                </table>
                            </div>
                        </div>




                </div>


                <div class="card m-4 spinner-border text-danger position-absolute top-50 start-50 car_api"
                    style="z-index: 99999; display: none" role="status">
                    <span class="visually-hidden">Loading map utc...</span>
                </div>



            </div>
            <div class="col-md-12" style="z-index: 1">
                <div id="map">


                </div>





            </div>
        </div>
    </div>


    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBb3IgM-eU8HwwkzPNpIcpA1BWAdWtdaoI">
    </script>
    <script src="{{ asset('js/google_maps.js') }}"></script>
@endsection
