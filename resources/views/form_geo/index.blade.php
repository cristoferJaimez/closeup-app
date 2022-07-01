@extends('layout.app')
@include('home.navbar')
@include('home.load')

@section('contenido')

    <style>
        body {
            overflow-y: visible;
        }
    </style>
    <script src="{{ asset('css/camera.css') }}"></script>
    <div class="container-fluid">

        <div class="row ">
            <div class="col-md-12 col-sm-12 mx-auto  mt-1 ">
                <div class="card p-4 ">

                    <form action="/" method="post">
                        @csrf
                        <div class="input-group input-group-sm mb-1 mt-3 ">
                        <select class="mi-selector  mb-4" name="pharma" id="">
                            @foreach ($pharma as $item )
                                <option value="{{$item->name_original}}">{{$item->name_original}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="input-group input-group-sm mb-1 mt-3 ">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-crosshairs fa-2x"
                                    class="p-2 btn btn-primary " onclick="init()"></i></span>
                            <input type="text" id="lat_lng" disabled
                                style="text-align: center; color: rgb(214, 60, 60)" id="lat_lng" class="form-control"
                                placeholder="Lat, Lng" size="100" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <video id="video" class=" mt-3 col-12 mb-1 d-none">
                        </video>

                        <img src="https://www.close-upinternational.com/img/logo.svg" id="photo" style="width: 100%"
                            alt="photo" class="col-12 d-none img-thumbnail rounded mx-auto d-block  shadow-sm mb-2">

                        <div class="mx-auto">
                            <button type="button" onclick="camera()" id="camera_open"
                                class="btn btn-danger  col-12 mb-1"><i class="fa-solid fa-camera"></i></button>

                                <input type="button" id="startbutton" class="d-none  col-12 btn btn-primary mt-3 mb-3"
                                value="Take photo" />
                        </div>



                        <canvas id="canvas" width="100%" class="col-12 d-none"></canvas>
                       <!--
                        <div class="input-group input-group-sm mb-3 ">
                            <input type="text" id="buscar" required name="buscar" class="form-control buscar"
                                placeholder="search pharma" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    -->


                        <textarea class="form-control" id="text_img" style="display: none" disabled rows="3"></textarea>
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
