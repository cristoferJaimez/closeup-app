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
                "name": "Colombia",
                "amenity": "",
                "popupContent": "!"
            },
            "geometry": {
                "type": "Point",
                "coordinates": [4.0000000, -72.0000000]
            }
        };

        var map = L.map('map', {
            minZoom: 5,
            maxZoom: 18
        }).setView([4.60971, -74.08175], 9);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);




        function onEachFeature(feature, layer) {
            if (feature.properties) {
                var popupContent = "<p>Localidad: " + feature.properties.NAME + "<br>" +
                    "Identificación: " + feature.properties.IDENTIFICATION_LOCATION + "<br>" +
                    "Area: " + feature.properties.AREA + "</p>";
                layer.bindPopup(popupContent);
            };
        };

        function style(feature) {
            return {
                weight: 2,
                opacity: 1,
                color: 'red',
                dashArray: '3',
                fillOpacity: 0.9,
                fillColor: 'white'
            };
        };



        //control
        var info = L.control();

        info.onAdd = function(map) {
            this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
            this.update();
            return this._div;
        };

        // method that we will use to update the control based on feature properties passed
        info.update = function(props) {
            this._div.innerHTML =
                '<div class="card p-4"> <h4 ><img src="https://www.close-upinternational.com/img/logo.svg" /></h4>' + (
                    props ?
                    '<b>' + props.name + '</b><br />' + props.density + ' people / mi<sup>2</sup>' :
                    ' </div>');
        };

        info.addTo(map);
        L.Control.MousePosition = L.Control.extend({
            options: {
                position: 'bottomleft',
                separator: ' : ',
                emptyString: 'Unavailable',
                lngFirst: false,
                numDigits: 5,
                lngFormatter: undefined,
                latFormatter: undefined,
                prefix: ""
            },

            onAdd: function(map) {
                this._container = L.DomUtil.create('div', 'leaflet-control-mouseposition');
                L.DomEvent.disableClickPropagation(this._container);
                map.on('mousemove', this._onMouseMove, this);
                this._container.innerHTML = this.options.emptyString;
                return this._container;
            },

            onRemove: function(map) {
                map.off('mousemove', this._onMouseMove)
            },

            _onMouseMove: function(e) {
                var lng = this.options.lngFormatter ? this.options.lngFormatter(e.latlng.lng) : L.Util
                    .formatNum(e.latlng.lng, this.options.numDigits);
                var lat = this.options.latFormatter ? this.options.latFormatter(e.latlng.lat) : L.Util
                    .formatNum(e.latlng.lat, this.options.numDigits);
                var value = this.options.lngFirst ? lng + this.options.separator + lat : lat + this.options
                    .separator + lng;
                var prefixAndValue = this.options.prefix + ' ' + value;
                this._container.innerHTML = "<div class='card col-12 p-4'>" + prefixAndValue + "</div>";
            }

        });

        L.Map.mergeOptions({
            positionControl: false
        });

        L.Map.addInitHook(function() {
            if (this.options.positionControl) {
                this.positionControl = new L.Control.MousePosition();
                this.addControl(this.positionControl);
            }
        });

        L.control.mousePosition = function(options) {
            return new L.Control.MousePosition(options);
        };
        L.control.mousePosition().addTo(map);

        L.geoJson(utc, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);
    </script>
@endsection
