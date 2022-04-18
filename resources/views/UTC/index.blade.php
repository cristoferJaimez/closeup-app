@extends('layout.app')
@push('head')
@endpush
@section('contenido')

    <head>
        <title>UTC Maps</title>
    <script></script>

    </head>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

    </style>



    <div id="map" class="map col-md-12"></div>

    <script>
        var geojsonFeature = {
            "type": "Feature",
            "properties": {
                "name": "Coors Field",
                "amenity": "Baseball Stadium",
                "popupContent": "This is where the Rockies play!"
            },
            "geometry": {
                "type": "Point",
                "coordinates": [4.0000000, -72.0000000]
            }
        };

        var map = L.map('map', {
            minZoom: 5,
            maxZoom: 18
        }).setView([4.0000000, -72.0000000], 4);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.geoJson(geojsonFeature).addTo(map);
    </script>
@endsection
