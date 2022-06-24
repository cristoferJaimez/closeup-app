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
                            <input type="text" id="lat_lng"  style="text-align: center; color: rgb(214, 60, 60)" id="lat_lng" disabled class="form-control" placeholder="Lat, Lng"
                                size="100" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/js_google/locations.js') }}"></script>
@endsection
