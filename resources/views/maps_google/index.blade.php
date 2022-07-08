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

                    <div class="btn-group mt-3 position-absolute top-0 start-50 translate-middle-x col-6 " role="group" aria-label="Basic checkbox toggle button group">

                        <input type="search" class="form-control form-control-md search_input col-12" id="search_input" class=""
                            autofocus />

                        <i class="fa-solid fa-map-pin  btn-warning m-2 d-none" onclick="init()"></i>
                        <i class="fa-solid fa-print btn  btn-primary m-2" onclick="print()"></i>

                        <form action="{{ url('logout') }}" style="display: inline; " method="POST">
                            @csrf
                            <button class="btn btn-danger mt-2" type="submit"> <i
                                    class="fa-solid fa-arrow-right-from-bracket"></i></button>
                        </form>


                  </div>


                  <div class="card m-4 spinner-border text-danger position-absolute top-50 start-50 car_api" style="z-index: 99999; display: none" role="status">
                    <span class="visually-hidden">Loading map utc...</span>
                  </div>



            </div>
            <div class="col-md-12" style="z-index: 1">
                <div id="map"></div>





            </div>
        </div>
    </div>


    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBb3IgM-eU8HwwkzPNpIcpA1BWAdWtdaoI">
    </script>
    <script src="{{ asset('js/google_maps.js') }}"></script>
@endsection
