@extends('layout.app')
@include('home.navbar')
@include('home.load')

@section('contenido')
    <script src="{{ asset('css/camera.css') }}"></script>
    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-sm-12  mt-5 ">
                <div class="card p-4 ">

                    <form action="" method="GET">
                        @csrf

                        <div class="input-group input-group-sm mb-3 ">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-crosshairs fa-2x"
                                    class="p-2 btn btn-primary " onclick="init()"></i></span>
                            <input type="text" id="lat_lng" style="text-align: center; color: rgb(214, 60, 60)"
                                id="lat_lng" class="form-control" placeholder="Lat, Lng" size="100"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <canvas id="canvas" width="100%" ></canvas>
                        <div class="input-group input-group-sm mb-3 ">
                            <input type="text" id="buscar" name="buscar" class="form-control buscar"
                                placeholder="search pharma" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <textarea class="form-control" id="text_img" disabled rows="3"></textarea>
                        <button type="submit" class=" btn btn-sm btn-primary mt-2">update</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6 col-sm-12  mt-5 ">
                <video id="video" width="100%"></video>
                <button onclick="camera()" id="camera_open">open camera</button>
                <button id="startbutton" id="screamshot">Take photo</button>

                <!--<img src="#" id="photo" alt="photo">-->
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBb3IgM-eU8HwwkzPNpIcpA1BWAdWtdaoI">
    </script>
    <script type="text/javascript" src="{{ asset('js/js_google/locations.js') }}"></script>
    <script src="{{ asset('js/form_geo/index.js') }}"></script>
    <script src="{{ asset('js/form_geo/camera.js') }}"></script>
@endsection
