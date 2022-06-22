@extends('layout.app')
@section('contenido')
    <div class="container-fluit">
        <div class="row">
            <div class="" style="z-index: 99999">
                <!-- Autocomplete location search input -->
                <div class="col-md-4 col-sm-12 position-absolute top-0 start-50 translate-middle-x mt-3">
                    <input type="text"  class="form-control form-control-lg" id="search_input" class="" />
                    <input type="hidden" id="loc_lat" />
                    <input type="hidden" id="loc_long" />
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
