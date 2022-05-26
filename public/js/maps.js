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
var cartodbAttribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="#"><img src="https://www.close-upinternational.com/img/logo.svg" width="50px" /> | <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Colombia.svg" width="12px" /></a>';

const osm = new L.TileLayer(
    // "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
    //"https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}"
    //"https://stamen-tiles.a.ssl.fastly.net/carto/{z}/{x}/{y}.png"
    //"https://stamen-tiles.a.ssl.fastly.net/toner/{z}/{x}/{y}.png"
    "https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png",
    //"https://stamen-tiles.a.ssl.fastly.net/terrain/{z}/{x}/{y}.jpg"
    //"https://stamen-tiles.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.jpg"
    { attribution: cartodbAttribution }

);
//pain areas
function getColor(d) {
    //console.log(d);
    return d > 10000000000 ?
        "#800026" :
        d > 20000000000 ?
        "#BD0026" :
        d > 30000000000 ?
        "#E31A1C" :
        d > 40000000000 ?
        "#FC4E2A" :
        d > 5000000000 ?
        "#FD8D3C" :
        d > 60000000000 ?
        "#FEB24C" :
        d > 70000000000 ?
        "#FED976" :
        "#FEB24C";
}
//style
function style(feature) {
    //console.log(feature.properties.name);
    return {
        fillColor: getColor(feature.properties.name),
        weight: 2,
        opacity: 1,
        color: 'red',
        dashArray: '3',
        fillOpacity: 0.7
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

var rectIcon = new CustomIcon({ iconUrl: url });

/*
var marker = L.marker([4.570868, -74.297333], { icon: rectIcon })
    .bindPopup("Colombia")
    .addTo(map);
*/



// add maps geojson
L.geoJson(null, {
    filter: function(feature) {
        // console.log(feature.properties.name);
    },
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

//escala
L.control.scale().addTo(map)
    //end view maps
    //https://vivaelsoftwarelibre.com/anadir-y-modificar-los-controles-en-leaflet/
    //caps
var capas_base = { "capa base OSM": osm };
L.control.layers(capas_base).addTo(map);

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



//en maps
// Add a basic graticule with divisions every 20 degrees
// as a layer on a map


//end pain

//selector

const selectElement = document.querySelector(".nieve");
const resultado = document.querySelector(".resultado");
const resultado_ = document.querySelector(".resultado_");
const num_utc = document.querySelector(".num_utc");

selectElement.addEventListener("change", (event) => {});

//removercapas

function removeMarkers() {
    map.eachLayer(function(layer) {
        if (layer.myTag === "mapa") {
            map.removeLayer(layer)
        }
    })
}

function clearSelect() {
    const $select = document.querySelector("#my-select");
    for (let i = $select.options.length; i >= 0; i--) {
        $select.remove(i);
    }
}

function onLoad_() {
    let i = document.getElementById('cargando').textContent = "Loading...";
}

function offLoad_(txt) {
    document.getElementById('cargando').textContent = txt;
}


function view_form_dep() {
    document.getElementById('form_utc').style.display = 'inline-block';
}

function not_view_form_dep() {
    document.getElementById('form_utc').style.display = 'none';
}

//valores unicos
const unique = (value, index, self) => {
    return self.indexOf(value) === index
}

//consultar area utc
$(selectElement).click(function() {

    $.ajax({
        url: "utcmaps",
        data: $("#form-search").serialize(),
        type: "post",
        success: function(response) {
            removeMarkers();
            clearSelect();

            console.log(response);
            try {
                switch (response[0].region) {

                    case "CENTRO":
                        onLoad_("CENTRO");
                        //L.marker([4.60971, -74.08175]).addTo(layerGroup);
                        map.flyTo([4.60971, -74.08175], 8);
                        for (const it of response) {

                            L.geoJson(maps, {
                                filter: function(feature, layer) {
                                    return feature.properties.name === it.co_barrio;
                                },
                                style: style,
                                onEachFeature: function(feature, layer) {
                                    layer.myTag = "mapa"
                                    if (feature.geometry.type) {
                                        layer.bindPopup(
                                            JSON.stringify(
                                                "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                feature.properties.description
                                            )
                                        );
                                    }
                                },
                            }).addTo(map)


                            //select de utc
                            var x = document.getElementById("my-select");
                            var option = new Option(`${it.departamento}`, `${it.departamento} `);
                            x.appendChild(option);
                        }


                        view_form_dep()
                        offLoad_();
                        break;
                    case "COSTA ATLANTICA":
                        onLoad_("COSTA ATLANTICA");
                        //L.marker([10.96854, -74.78132]).addTo(layerGroup);
                        map.flyTo([10.96854, -74.78132], 8);
                        for (const it of response) {
                            //console.log("UTC: " + it.co_barrio);
                            L.geoJson(maps, {
                                    filter: function(feature, layer) {
                                        return feature.properties.name === it.co_barrio;
                                    },

                                    style: style,
                                    onEachFeature: function(feature, layer) {
                                        layer.myTag = "mapa"
                                        if (feature.geometry.type) {
                                            layer.bindPopup(
                                                JSON.stringify(
                                                    "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                    feature.properties.description
                                                )
                                            );
                                        }
                                    },
                                }).addTo(map)
                                //select de utc
                            var x = document.getElementById("my-select");
                            var option = new Option(`${it.departamento}`, `${it.departamento} `);
                            x.appendChild(option);
                        }
                        view_form_dep()
                        offLoad_();
                        break
                    case "COSTA PACIFICA":
                        onLoad_("COSTA PACIFICA");
                        ///L.marker([3.43722, -76.5225]).addTo(layerGroup);
                        map.flyTo([3.43722, -76.5225], 8);
                        for (const it of response) {
                            //console.log("UTC: " + it.co_barrio);
                            L.geoJson(maps, {
                                    filter: function(feature, layer) {
                                        return feature.properties.name === it.co_barrio;
                                    },

                                    style: style,
                                    onEachFeature: function(feature, layer) {
                                        layer.myTag = "mapa"
                                        if (feature.geometry.type) {
                                            layer.bindPopup(
                                                JSON.stringify(
                                                    "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                    feature.properties.description
                                                )
                                            );
                                        }
                                    },
                                }).addTo(map)
                                //select de utc
                            var x = document.getElementById("my-select");
                            var option = new Option(`${it.departamento}`, `${it.departamento} `);
                            x.appendChild(option);
                        }
                        view_form_dep()
                        offLoad_();
                        break
                    case "ANTIOQUIA":
                        onLoad_("ANTIOQUIA");
                        ///L.marker([6.25184, -75.56359]).addTo(layerGroup);
                        map.flyTo([6.25184, -75.56359], 8);
                        for (const it of response) {
                            //console.log("UTC: " + it.co_barrio);
                            L.geoJson(maps, {
                                    filter: function(feature, layer) {
                                        return feature.properties.name === it.co_barrio;
                                    },

                                    style: style,
                                    onEachFeature: function(feature, layer) {
                                        layer.myTag = "mapa"
                                        if (feature.geometry.type) {
                                            layer.bindPopup(
                                                JSON.stringify(
                                                    "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                    feature.properties.description
                                                )
                                            );
                                        }
                                    },
                                }).addTo(map)
                                //select de utc
                            var x = document.getElementById("my-select");
                            var option = new Option(`${it.departamento}`, `${it.departamento} `);
                            x.appendChild(option);
                        }
                        view_form_dep()
                        offLoad_();
                        break
                    case "EJE CAFETERO":
                        onLoad_("EJE CAFETERO");
                        //L.marker([4.81333, -75.69611]).addTo(layerGroup);
                        map.flyTo([4.81333, -75.69611], 8);
                        for (const it of response) {
                            //console.log("UTC: " + it.co_barrio);
                            L.geoJson(maps, {
                                    filter: function(feature, layer) {
                                        return feature.properties.name === it.co_barrio;
                                    },

                                    style: style,
                                    onEachFeature: function(feature, layer) {
                                        layer.myTag = "mapa"
                                        if (feature.geometry.type) {
                                            layer.bindPopup(
                                                JSON.stringify(
                                                    "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                    feature.properties.description
                                                )
                                            );
                                        }
                                    },
                                }).addTo(map)
                                //select de utc
                            var x = document.getElementById("my-select");
                            var option = new Option(`${it.departamento}`, `${it.departamento} `);
                            x.appendChild(option);
                        }
                        view_form_dep()
                        offLoad_();
                        break
                    case "SANTANDERES":
                        onLoad_("SANTANDERES");
                        //L.marker([7.12539, -73.1198]).addTo(layerGroup);
                        map.flyTo([7.12539, -73.1198], 8);
                        for (const it of response) {
                            //console.log("UTC: " + it.co_barrio);
                            L.geoJson(maps, {
                                    filter: function(feature, layer) {
                                        return feature.properties.name === it.co_barrio;
                                    },

                                    style: style,
                                    onEachFeature: function(feature, layer) {
                                        layer.myTag = "mapa"
                                        if (feature.geometry.type) {
                                            layer.bindPopup(
                                                JSON.stringify(
                                                    "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                    feature.properties.description
                                                )
                                            );
                                        }
                                    },
                                }).addTo(map)
                                //select de utc
                            var x = document.getElementById("my-select");
                            var option = new Option(`${it.departamento}`, `${it.departamento} `);
                            x.appendChild(option);
                        }
                        view_form_dep()
                        offLoad_();
                        break
                    case "ORIENTAL":
                        onLoad_("ORIENTAL");
                        //L.marker([3.38463, -74.04424]).addTo(layerGroup);
                        map.flyTo([3.38463, -74.04424], 8);
                        for (const it of response) {
                            //console.log("UTC: " + it.co_barrio);
                            L.geoJson(maps, {
                                    filter: function(feature, layer) {
                                        return feature.properties.name === it.co_barrio;
                                    },

                                    style: style,
                                    onEachFeature: function(feature, layer) {
                                        layer.myTag = "mapa"
                                        if (feature.geometry.type) {
                                            layer.bindPopup(
                                                JSON.stringify(
                                                    "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                    feature.properties.description
                                                )
                                            );
                                        }
                                    },
                                }).addTo(map)
                                //select de utc
                            var x = document.getElementById("my-select");
                            var option = new Option(`${it.departamento}`, `${it.departamento} `);
                            x.appendChild(option);;
                        }
                        view_form_dep()
                        offLoad_();
                        break


                }
            } catch (error) {
                console.log("cath de regiones");
                not_view_form_dep()
                map.flyTo([4.60971, -74.08175], 5);
            }
            //end mark

            //console.log(maps);
            //L.geoJson(maps).addTo(map);
            var num = 0;
            response.forEach((element) => {
                num++;
            });
            num_utc.textContent = ` ` + num;
            //add layer

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