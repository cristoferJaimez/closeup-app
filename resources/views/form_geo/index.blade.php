@extends('layout.app')
@include('home.navbar')
@include('home.load')

@section('contenido')
    <style>
        body {
            overflow-y: visible;
        }

        video {
            /* override other styles to make responsive */
            width: 100% !important;
            height: auto !important;
        }
    </style>
    <script src="{{ asset('css/camera.css') }}"></script>
    <div class="container-fluid" style="overflow-y: scroll;">

        <div class="row ">


            @if (Session::has('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Nice job!</strong> {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @else
            @endif
            <div class="col-md-12 col-sm-12 mx-auto  mt-1 ">
                <div class="card p-4 ">

                    <form action="{{ route('form_geo') }}" method="post">
                        @csrf

                        <div class="input-group input-group-sm mb-1 mt-3 ">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fa-solid fa-location-crosshairs fa-2x" class="p-2 btn btn-primary "
                                    onclick="init()"></i></span>
                            <input type="text" id="lat_lng" disabled required
                                style="text-align: center; color: rgb(214, 60, 60)" id="lat_lng" class="form-control"
                                placeholder="Lat, Lng" size="100" aria-label="Username" name="lat_lng"
                                aria-describedby="basic-addon1">

                            <input type="text" name="lat" id="lat" class="d-none">
                            <input type="text" name="lng" id="lng" class="d-none">
                            <input type="text" name="adress" id="adress" class="d-none">
                        </div>
                        <span id="dir_google" class="text-center text-muted text-primary"></span>

                        <!--cadena o independiente-->
                        <select class="form-select mb-3 mt-3" aria-label="Default select example" required>
                            <option selected>Open this select menu</option>
                            <option value="1">Cadena</option>
                            <option value="2">Independiente</option>
                        </select>

                        <!--cadenas-->
                        <select class="form-select mb-3" aria-label="Default select example" required>
                            <option selected>Open this select menu</option>
                            <option value="1">Cadena</option>
                            <option value="2">Independiente</option>
                        </select>



                        <div class="input-group input-group-sm mb-1 mt-3 ">
                            <select class="form-select mi-selector  mb-4" name="pharma" id="" required>
                                <option selected>Open this select menu</option>

                                @foreach ($pharma as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_original }} -
                                        {{ $item->adress }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mx-auto">
                            <button type="button" onclick="camera()" id="camera_open"
                                class="btn btn-danger  col-12 mb-1"><i class="fa-solid fa-camera "></i></button>

                            <input type="button" id="startbutton" class="d-none  col-12 btn btn-primary"
                                value="Take photo" />
                        </div>
                        <video id="video" onclick="takepicture()" class=" mt-1 col-12 mb-1 d-none res" width="100%">
                        </video>

                        <img src="https://www.close-upinternational.com/img/logo.svg" id="photo" style=""
                            onclick="" alt="photo"
                            class="col-12 d-none img-thumbnail rounded mx-auto    shadow-sm mb-2" width="200px"
                            height="200px">


                        <canvas id="canvas" width="100%" class="col-12 d-none"></canvas>
                        <!--
                                    <div class="input-group input-group-sm mb-3 ">
                                        <input type="text" id="buscar" required name="buscar" class="form-control buscar"
                                            placeholder="search pharma" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                -->


                        <textarea class="form-control" id="text_img" name="img" style="display: none" rows="3"></textarea>
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
    <script src="{{ asset('js/form_geo/index.js') }}"></script>
    <script src="{{ asset('js/form_geo/camera.js') }}"></script>
@endsection
