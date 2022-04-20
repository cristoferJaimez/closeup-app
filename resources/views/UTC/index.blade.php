@extends('layout.app')
@push('head')
@endpush
@section('contenido')
   <!-- <div class="loader-page"><span class="ref"></span></div>
   -->

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


    <div id="map" class="map col-md-12" style="z-index:2;"></div>

    <div class="position-relative  " style=" z-index:3; ">
        <div class="">
        <div class="px-5 ms-1 mt-2">
            <form action="" class="row g-2" method="POST">
                @csrf
                <div class="col-md-4 col-sm-12 ">
                <select class=" form-select form-select-sm  col-12 border border-sencondary border-2 shadow-lg  bg-body rounded" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                  <div class="col-md-8 col-sm-12 ">
                    <input type="text" class="form-control form-control-sm border border-sencondary border-2 shadow-lg  bg-body rounded" placeholder="Search for name" aria-label="Recipient's username" aria-describedby="button-addon2">
                  </div>

            </form>
    </div>
</div>
</div>


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

        //end view maps

        // Load kml file
        fetch('assets/kml/maps.kml')
            .then(res => res.text())
            .then(kmltext => {
                // Create new kml overlay
                const parser = new DOMParser();
                const kml = parser.parseFromString(kmltext, 'text/xml');
                const track = new L.KML(kml);
                map.addLayer(track);

                // Adjust map to show the kml
                const bounds = track.getBounds();
                map.fitBounds(bounds);
            }).catch(function(e) {
                console.log('Error: ' + e);
            });
        //end kml
        //full screen


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
        var filter = L.control({
            position: 'buttonleft'
        });
        filter.onAdd = function(map) {

            var div = L.DomUtil.create('div', 'card p-2');
            labels = ['<strong></strong>'],
                categories = [];

            for (var i = 0; i < categories.length; i++) {

                div.innerHTML +=
                    labels.push(
                        '<i class="circle" style="background:' + "" + '"></i> ' +
                        (categories[i] ? categories[i] : '+'));

            }
            div.innerHTML = labels.join('<br>');
            return div;
        };

        // Insertando una leyenda en el mapa
        var legend = L.control({
            position: 'bottomright'
        });


        legend.onAdd = function(map) {

            var div = L.DomUtil.create('div', 'card p-2');
            labels = ['<strong>Categories</strong>'],
                categories = ['Road Surface', 'Signage', 'Line Markings', 'Roadside Hazards', 'Other',
                'Road Surface', 'Signage', 'Line Markings', 'Roadside Hazards', 'Other'];

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
        filter.addTo(map);
    </script>
@endsection
