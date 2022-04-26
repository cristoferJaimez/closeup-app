//maps
// Make basemap
const map = new L.Map("map", {
    center: new L.LatLng(4.570868, -74.297333),
    zoom: 5,
    ext: "png",

    fullscreenControl: {
        pseudoFullscreen: false,
    },
});
const osm = new L.TileLayer(
    // "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
    //"https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}"
    //"https://stamen-tiles.a.ssl.fastly.net/carto/{z}/{x}/{y}.png"
    //"https://stamen-tiles.a.ssl.fastly.net/toner/{z}/{x}/{y}.png"
    "https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png"
    //"https://stamen-tiles.a.ssl.fastly.net/terrain/{z}/{x}/{y}.jpg"
    //"https://stamen-tiles.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.jpg"
);

//style
function style(feature) {
    return {
        fillColor: "red",
        weight: 2,
        opacity: 1,
        color: "red",
        dashArray: "3",
        fillOpacity: 0,
    };
}

map.addLayer(osm);

var CustomIcon = L.Icon.extend({
    options: {
        iconSize: [120, 90],
        iconAnchor: [22, 94],
        popupAnchor: [-3, -76],
    },
});

var svgrect = "https://www.close-upinternational.com/img/logo.svg";

//Para Firefox y IE hay que rremplazar '#' por '%23'.
var url = encodeURI("data:image/svg+xml," + svgrect).replace("#", "%23");
console.log(url);

var rectIcon = new CustomIcon({ iconUrl: url });

/*
var marker = L.marker([4.570868, -74.297333], { icon: rectIcon })
    .bindPopup("Colombia")
    .addTo(map);
*/

// add maps geojson
L.geoJson(null, {
    style: style,
    onEachFeature: function(feature, layer) {
        if (feature.geometry.type) {
            layer.bindPopup(
                JSON.stringify(
                    "<img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                    feature.properties.description
                )
            );
        }
    },
}).addTo(map);

//end view maps

//print map
var printer = L.easyPrint({
    tileLayer: osm,
    sizeModes: ["Current", "A4Landscape", "A4Portrait"],
    filename: "myUTC",
    exportOnly: true,
    hideControlContainer: false,
}).addTo(map);

//end

//button print
function manualPrint() {
    printer.printMap("CurrentSize", "MyManualPrint");
}
//end


// Insertando una leyenda en el mapa
var legend = L.control({
    position: "bottomright",
});

legend.onAdd = function(map) {
    var div = L.DomUtil.create("div", "card p-2");
    (labels = ["<strong>Categories</strong>"]),
    (categories = [
        "Road Surface",
        "Signage",
        "Line Markings",
        "Roadside Hazards",
        "Other",
        "Road Surface",
        "Signage",
        "Line Markings",
        "Roadside Hazards",
        "Other",
    ]);

    for (var i = 0; i < categories.length; i++) {
        div.innerHTML += labels.push(
            '<i class="circle" style="background:' +
            "" +
            '"></i> ' +
            (categories[i] ? categories[i] : "+")
        );
    }
    div.innerHTML = labels.join("<br>");
    return div;
};
legend.addTo(map);

//en maps

//pain areas
function getColor(d) {
    return d > 6000 ?
        "#800026" :
        d > 5000 ?
        "#BD0026" :
        d > 2000 ?
        "#E31A1C" :
        d > 1000 ?
        "#FC4E2A" :
        d > 500 ?
        "#FD8D3C" :
        d > 200 ?
        "#FEB24C" :
        d > 100 ?
        "#FED976" :
        "#FFEDA0";
}
//end pain

//selector

const selectElement = document.querySelector(".nieve");
const resultado = document.querySelector(".resultado");
const resultado_ = document.querySelector(".resultado_");
const num_utc = document.querySelector(".num_utc");

selectElement.addEventListener("change", (event) => {});

//consultar area utc
$(selectElement).click(function() {
    $.ajax({
        url: "utcmaps",
        data: $("#form-search").serialize(),
        type: "post",
        success: function(response) {
            console.log(response);
            resultado.textContent = `  `;
            resultado_.textContent = ``;
            //console.log(maps);
            //L.geoJson(maps).addTo(map);
            var num = 0;
            response.forEach((element) => {
                num++;
                console.log(element);
            });
            num_utc.textContent = ` ` + num;
        },
        statusCode: {
            404: function() {
                alert("web not found");
            },
        },
        error: function(x, xs, xt) {
            //nos dara el error si es que hay alguno
            //window.open(JSON.stringify(x));
            alert(
                "error: " +
                JSON.stringify(x) +
                "\n error string: " +
                xs +
                "\n error throwed: " +
                xt
            );
        },
    });
});

//end