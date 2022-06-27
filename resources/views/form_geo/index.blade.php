@extends('layout.app')
@include('home.navbar')
@section('contenido')
    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-sm-12 mx-auto mt-5 ">


                <div class="card p-4 ">

                    <form action="">
                        @csrf

                        <div class="input-group input-group-sm mb-3 ">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-crosshairs fa-2x"
                                    class="p-2 btn btn-primary " onclick="init()"></i></span>
                            <input type="text" id="lat_lng" style="text-align: center; color: rgb(214, 60, 60)"
                                id="lat_lng"  class="form-control" placeholder="Lat, Lng" size="100"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group input-group-sm mb-3 ">
                            <input type="search" id="buscar"
                                id="search_pharma"  class="form-control" placeholder="search pharma"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="border border-1 p-2"></div>
                        <button class="btn btn-success btn-sm mt-2 ">new</button>
                        <button type="submit" class=" btn btn-sm btn-primary mt-2">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBb3IgM-eU8HwwkzPNpIcpA1BWAdWtdaoI">
    </script>
    <script type="text/javascript" src="{{ asset('js/js_google/locations.js') }}"></script>
@endsection
