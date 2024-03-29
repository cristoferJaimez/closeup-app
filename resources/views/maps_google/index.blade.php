@extends('layout.app')
@include('home.load')
@section('contenido')
    <style>
        body {
            font-size: 0.7em;
            overflow: hidden;
            background-color: #ebebeb;
        }

        #map {
            height: 80%;
            width: 73%;
            max-width: 100%;
            max-height: 100%;
        }

        .scroll {
            height: 100px;
        }

        table{
            border: none;
            font-size: 0.7em;
        }

        table tr td{
            margin: 2px;
        }
    </style>


    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3 col-sm-12">
                @if (auth()->user()->fk_rol == 1 || auth()->user()->fk_rol == 3)
                    <!-- chart mercados mapas -->
                    @include('maps_google.folder_chart.perfil')
                    @include('maps_google.folder_chart.char')
                    @include('maps_google.folder_chart.info')
                    @include('maps_google.folder_chart.grafy')
                @endif
            </div>
            <div class="col-md-9 col-sm-12">
                <div id="map" class="mt-2 rounded col-sm-12"></div>
            </div>

            <div class="col-sm-12 col-md-12 position-absolute bottom-0 start-0  rounded ">
                @include('maps_google.folder_chart.info_btn')
            </div>


        </div>


    </div>
    @include('maps_google.folder_chart.modal')
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBb3IgM-eU8HwwkzPNpIcpA1BWAdWtdaoI">
    </script>
    <script src="{{ asset('js/google_maps.js') }}"></script>
    <script   src="{{ asset('js/data_mercado/index.js') }}"></script>

    <script  src="{{ asset('js/data_mercado/max_min.js') }}"></script>
    <script  src="{{ asset('js/data_mercado/home.js') }}"></script>
    <script  src="{{ asset('js/data_mercado/select.js') }}"></script>
    <script src="{{ asset('js/data_mercado/char.js') }}"></script>
    <script type="module" src="{{ asset('js/data_mercado/charForm.js') }}"></script>
@endsection
