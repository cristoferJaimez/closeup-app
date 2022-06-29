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
            <div class="col-md-12 col-sm-12" style="z-index: 2">
                <!-- Autocomplete location search input -->
                <div class="col-md-4 col-sm-12 position-absolute top-0 start-50 translate-middle-x mt-3 m-2">
                    <input type="search" class="form-control form-control-md search_input" id="search_input" class=""
                        autofocus />
                   <!-- <i class="fa-solid fa-map btn btn-secondary mt-2" onclick="draw()"></i>
                    <i class="fa-solid fa-bars btn btn-outline-primary mt-2" onclick="clear_maps()"></i>
                   -->
                    <i class="fa-solid fa-print btn  btn-outline-primary mt-2" onclick="print()"></i>
                    <form action="{{ url('logout') }}" style="display: inline; " method="POST">
                        @csrf
                        <button class="btn btn-outline-danger mt-2" type="submit"> <i
                                class="fa-solid fa-arrow-right-from-bracket"></i></button>
                    </form>
                </div>




                <!-- Display latitude and longitude
                    <div class="latlong-view">
                        <p><b>Latitude:</b> <span id="latitude_view"></span></p>
                        <p><b>Longitude:</b> <span id="longitude_view"></span></p>
                    </div>
                    -->
            </div>
            <div class="col-md-12">
                <div id="map"></div>

            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBb3IgM-eU8HwwkzPNpIcpA1BWAdWtdaoI">
    </script>
    <script src="{{ asset('js/google_maps.js') }}"></script>
@endsection
