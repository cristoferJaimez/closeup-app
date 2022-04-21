@extends('layout.app')
@push('head')
@endpush
@section('contenido')
   <div class="loader-page"><span class="ref"></span></div>

    <script>
    </script>
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
            z-index: 1;
            background-color: white;
        }

        #buttons {
            position: absolute;
            z-index: 1;
        }

        .result {
            position: absolute;
            z-index: 1;
            font-size: 0.7em;
        }

        .modal-backdrop.show {
            z-index: 1;
            opacity: 0;
            filter: alpha(opacity=0);
            /* Para versiones anteriores de IE */
        }

    </style>

    <!--map -->
    <div id="map" class="map col-md-12">
    </div>



    <table id="" class="result m-3 col-md-4 col-sm-12  table table-dark table-sm position-absolute bottom-0 start-0 "
        style="width: 20%">
        <tbody>

            <tr>
                <td class="">Area: </td>
                <td class=""><b class="resultado_"></b></td>
            </tr>

            <tr>
                <td class="">Department: </td>
                <td class=""></td>
            </tr>
            <tr>
                <td class="">Municipality: </td>
                <td class=""></td>
            </tr>
            <tr>
                <td class="">Locality: </td>
                <td class=""></td>
            </tr>
            <tr>
                <td class="">Neighborhood: </td>
                <td class=""></td>
            </tr>

            <tr>
                <td class="">UTC:</td>
                <td></td>
            </tr>
        </tbody>
    </table>


    @include('UTC.layout.navbar')

    <script>
        // Make basemap
        const map = new L.Map('map', {
            center: new L.LatLng(4.570868, -74.297333),
            zoom: 7,
            fullscreenControl: {
                pseudoFullscreen: false
            }
        });
        const osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

        map.addLayer(osm);
        // add maps geojson
        L.geoJson(maps).addTo(map);
        //console.log(maps);
        //end view maps

        /*
        // Load kml file
        fetch('assets/kml/maps.kml')
            .then(res => res.text())
            .then(kmltext => {
                // Create new kml overlay
                const parser = new DOMParser();
                const kml = parser.parseFromString(kmltext, 'text/xml');
                const track = new L.KML(kml);
                map.addLayer(track);
                console.log(kml.all.length);
                var cont = 0;
                for (let i = 0; i < kml.all.length ; i++) {
                    console.log(kml.all[cont + 99]);
                }

                // Adjust map to show the kml
                const bounds = track.getBounds();
                map.fitBounds(bounds);
            }).catch(function(e) {
                console.log('Error: ' + e);
            });

        //end kml
        //full screen

*/
        //print map
        var printer = L.easyPrint({
            tileLayer: osm,
            sizeModes: ['Current', 'A4Landscape', 'A4Portrait'],
            filename: 'myUTC',
            exportOnly: true,
            hideControlContainer: false
        }).addTo(map);

        function manualPrint() {
            printer.printMap('CurrentSize', 'MyManualPrint')
        }

        //leyend



        // Insertando una leyenda en el mapa
        var legend = L.control({
            position: 'bottomright'
        });


        legend.onAdd = function(map) {

            var div = L.DomUtil.create('div', 'card p-2');
            labels = ['<strong>Categories</strong>'],
                categories = ['Road Surface', 'Signage', 'Line Markings', 'Roadside Hazards', 'Other',
                    'Road Surface', 'Signage', 'Line Markings', 'Roadside Hazards', 'Other'
                ];

            for (var i = 0; i < categories.length; i++) {

                div.innerHTML +=
                    labels.push(
                        '<i class="circle" style="background:' + "" + '"></i> ' +
                        (categories[i] ? categories[i] : '+'));

            }
            div.innerHTML = labels.join('<br>');
            return div;
        };
        legend.addTo(map);
    </script>
@endsection
