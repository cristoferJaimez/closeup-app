@extends('layout.app')
@include('home.navbar')
@include('home.load')

@section('contenido')
    <script src="{{ asset('css/camera.css') }}"></script>
    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-sm-12  mt-5 ">
                <div class="card p-4 ">

                    <form action="">
                        @csrf

                        <div class="input-group input-group-sm mb-3 ">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-crosshairs fa-2x"
                                    class="p-2 btn btn-primary " onclick="init()"></i></span>
                            <input type="text" id="lat_lng" style="text-align: center; color: rgb(214, 60, 60)"
                                id="lat_lng" class="form-control" placeholder="Lat, Lng" size="100"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group input-group-sm mb-3 ">
                            <input type="text" id="buscar" name="buscar" class="form-control buscar"
                                placeholder="search pharma" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="border border-1 p-2"></div>
                        <button type="submit" class=" btn btn-sm btn-primary mt-2">update</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6 col-sm-12  mt-5 ">
                <div class="card p-4 ">
                    <div class="controls col-md-12 col-sm-12">
                        <button class="btn btn-danger play d-none" title="Play"><i class="fa-solid fa-backward"></i></button>
                        <button class="btn btn-warning pause d-none"   title="backward"><i class="fa-solid fa-backward"></i></button>
                        <button class="btn btn-primary screenshot d-none" title="ScreenShot"><i class="fa-solid fa-camera-retro"></i></button>
                    </div>
                    <div class="video-options" >
                        <label>Select camera</label>
                        <select name="" id="" class="custom-select mb-2 mt-2">
                            <option value="">Select camera</option>
                        </select>
                    </div>
                    <div class="display-cover">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video autoplay width="100%" class=""></video>
                        </div>
                        <canvas class="d-none"></canvas>



                        <img class="screenshot-image d-none img-fluid mt-2 img-thumbnail" alt="">


                    </div>
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
