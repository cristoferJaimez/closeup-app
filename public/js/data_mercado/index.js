var col;
var arr_utc = [];
var arr_back_utc = [];
var map_ = false;
var click = 0;
const calculoMSH = 0;
var farmacia = 0;



function show_datos_mercado(event) {
    let tbl = document.querySelector(".tbl_info");

    $(tbl).toggle(500, function() {
        console.log($(tbl).attr("class"));
    });
}

function closeGF() {
    let gf = document.querySelector("#card_gf");
    $(gf).addClass("d-none", 1000, "easeInBack");
}

function btn_gf() {
    let gf = document.querySelector("#card_gf");
    $(gf).removeClass("d-none", 1000, "easeInBack");
}

// dibujar mapa de empresa
function drawingMap(utc, lat, lgn) {
    console.log(utc);
}

//cargar tablero csv
function load_csv() {
    csv = document.querySelector("#csv_file");
    console.log("btn_load");
    $(csv).removeClass("d-none");
}

function closeCSV() {
    let csv = document.querySelector("#csv_file");
    $(csv).addClass("d-none");
}

/*dibujr mapa colonmbia*/
function drawing_col() {
    if (map_ === false) {
        var load = document.querySelector(".card-loading");
        var list_utc = document.querySelector("#list_utc");
        // $(load).removeClass('d-none')

        col = new google.maps.Data({ map: map });

        col.loadGeoJson(
            `https://raw.githubusercontent.com/cristoferJaimez/cristoferjaimez.github.io/main/maps_ok.min.json`
        );

        col.setStyle({
            icon: "https://www.close-upinternational.com/img/logo.svg",
            fillColor: "red",
            strokeColor: "red",
            strokeWeight: 0.5,
            zIndex: 2,
        });

        // $(load).addClass('d-none')
        col.addListener("click", function(event) {
            var res = arr_back_utc.some((e) => e === event.feature.h.name);
            if (res == false) {
                arr_back_utc.push(event.feature.h.name);

                arr_utc.push(event.feature.h);
                //limpiar listado
                list_utc.innerHTML = "";
                arr_utc.forEach((e) => {
                    list_utc.innerHTML += e.description + "\n";
                });
                col.overrideStyle(event.feature, {
                    fillColor: "orange",
                    strokeColor: "white",
                    strokeWeight: 1,
                    zIndex: -1,
                });
                //map.data.overlayLayer.appendChild(this.div)
                infoWindow.setPosition(event.latLng);
                infoWindow.setContent(
                    '<div class="text-center p-2" style="z-index: 99999">' +
                    '<img src="https://www.close-upinternational.com/img/logo.svg" class="img-fluid img-thumbnail" alt="logo">' +
                    "<center>" +
                    event.feature.h.description +
                    "</div>"
                );
                infoWindow.open(map);
            } else if (res === true) {
                //cambiar de color
                col.overrideStyle(event.feature, {
                    fillColor: "red",
                    strokeColor: "red",
                    strokeWeight: 1,
                    zIndex: -1,
                });

                let index = arr_back_utc.findIndex(
                    (e) => e === event.feature.h.name
                );
                console.log("indice  " + index);
                arr_back_utc.splice(index, 1);
                //console.log(arr_utc);
                let index_ = arr_utc.findIndex(
                    (e) => e.name === event.feature.h.name
                );
                arr_utc.splice(index_, 1);

                list_utc.innerHTML = "";
                arr_utc.forEach((e) => {
                    list_utc.innerHTML += e.name + "\n";
                });
            }
        });
        map_ = true;
    } else {
        alert("capa activa");
    }
}

function home(dir, mydir) {
    farmacia = mydir;

    //cargar json para uso interno
    $.getJSON(
        "https://raw.githubusercontent.com/cristoferJaimez/cristoferjaimez.github.io/main/maps_ok.min.json",
        function(data) {
            //console.log(data.features[550].properties.name);
            for (let i = 0; i < 4747; i++) {
                if (Number(data.features[i].properties.name) === dir) {
                    //console.log( data.features[i]. geometry.coordinates[0][0][0]);
                    //dibujar mapa zoom
                    var lat = data.features[i].geometry.coordinates[0][0][1];
                    var lng = data.features[i].geometry.coordinates[0][0][0];
                    var map = new google.maps.Map(
                        document.getElementById("map"), {
                            zoom: 14,
                            center: { lat, lng },
                            mapTypeControl: false,
                        }
                    );

                    //marca
                    marker = new google.maps.Marker({
                        map: map,
                        //draggable: true,
                        animation: google.maps.Animation.DROP,
                        position: { lat, lng },
                        title: data.features[i].properties.name
                    });

                    //dibujar poligono contenedor
                    var col = new google.maps.Data({ map: map });

                    var json = {
                        type: "FeatureCollection",
                        features: [data.features[i]]
                    }


                    col.loadGeoJson('https://raw.githubusercontent.com/cristoferJaimez/cristoferjaimez.github.io/main/maps_ok.min.json');

                    col.setStyle({
                        fillColor: "green",
                        strokeColor: "green",
                        strokeWeight: 0.5,
                        zIndex: 1,
                    });

                    col.addListener("click", function(event) {
                        var res = arr_back_utc.some((e) => e === event.feature.h.name);
                        if (res == false) {
                            arr_back_utc.push(event.feature.h.name);

                            arr_utc.push(event.feature.h);
                            //limpiar listado
                            list_utc.innerHTML = "";
                            arr_utc.forEach((e) => {
                                list_utc.innerHTML += '<i class="btn btn-sm btn-outline-secondary m-1" style="font-size: 0.7em;">' + e.name + "</i>";
                            });
                            col.overrideStyle(event.feature, {
                                fillColor: "orange",
                                strokeColor: "red",
                                strokeWeight: 1,
                                zIndex: -1,
                            });
                            //map.data.overlayLayer.appendChild(this.div)
                            infoWindow.setPosition(event.latLng);
                            infoWindow.setContent(
                                '<div class="text-center p-2" style="z-index: 99999">' +
                                '<img src="https://www.close-upinternational.com/img/logo.svg" class="img-fluid img-thumbnail" alt="logo">' +
                                "<center>" +
                                event.feature.h.description +
                                "</div>"
                            );

                            document.getElementById('arr_utc').value = arr_back_utc


                            infoWindow.open(map);
                        } else if (res === true) {
                            //cambiar de color
                            col.overrideStyle(event.feature, {
                                fillColor: "green",
                                strokeColor: "green",
                                strokeWeight: 1,
                                zIndex: -1,
                            });

                            let index = arr_back_utc.findIndex(
                                (e) => e === event.feature.h.name
                            );
                            //console.log("indice  " + index);
                            arr_back_utc.splice(index, 1);

                            document.getElementById('arr_utc').value = arr_back_utc
                                //console.log(arr_utc);
                            let index_ = arr_utc.findIndex(
                                (e) => e.name === event.feature.h.name
                            );
                            arr_utc.splice(index_, 1);

                            list_utc.innerHTML = "";
                            arr_utc.forEach((e) => {
                                list_utc.innerHTML += e.name + "\n";
                            });
                        }
                    });
                    map_ = true;

                    //dibujar poligonos linderos
                }
            }
        }
    );
}

function calculo() {
    document.getElementById('total_valor').textContent = "Loading..."
        //event.defaultPrevented();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }


    });


    //mercado global
    var propio = false
    $.ajax({
        url: "info_btn",
        type: 'POST',
        data: {
            "arr_utc": document.getElementById('arr_utc').value,
            "farmacia": farmacia
        },
        success: function(response) {
            console.log(response);
            document.getElementById('total_valor').textContent = "$ " + Math.trunc(response.total_valores).toLocaleString("es");
            document.getElementById('total_unidad').textContent = response.total_unidades;

            document.getElementById('total_puntos').textContent = response.total_puntos.length;
            document.getElementById('total_promedio').textContent = "$ " + Math.trunc(response.total_valores / response.total_puntos.length).toLocaleString("es");
            $("#vt").val(response.total_valores);


            if (propio === false) {
                propio = true;
                //mercado pripio

                document.getElementById('total_propio').textContent = "$" + Math.trunc(response.farmacia[0].VAL).toLocaleString('es');
                document.getElementById('unidad_propio').textContent = response.farmacia[0].UND

            }
            //console.log(response);
        },
        error: function(err) {
            console.log(err);
        }
    });





}


//selects

const select_1 = document.querySelector('.select_1');



select_1.addEventListener('change', (e) => {
    var num = $("#vt").val();

    document.getElementById("body").innerHTML = ""
        //document.getElementById('table').innerHTML = ""
    document.getElementById('inf_db').textContent = "Loading..."
        //console.log(event.target.value);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    if (event.target.value === "1") {



        $.ajax({
            url: "char",
            type: 'POST',
            data: {
                "arr_utc": document.getElementById('arr_utc').value,
                "select": event.target.value,
            },
            success: function(response) {


                console.log(response);

                response.forEach((e, i, arr) => {
                    document.getElementById("body").innerHTML += `
                    <tr>
                          <td>${i+1}</td>
                          <td>${e.PROD}</td>
                          <td>${e.UND}</td>
                          <td> $${ Math.trunc(e.VAL).toLocaleString("es")}</td>
                          <td>${ (e.VAL / num).toFixed(4)}%</td>
                    </tr>
                    `

                });
                $('table#tbl').tableSortable();

                document.getElementById('inf_db').textContent = ""
            },
            error: function(err) {
                console.log(err);
            }
        });

    } else {
        $.ajax({
            url: "char",
            type: 'POST',
            data: {
                "arr_utc": document.getElementById('arr_utc').value,
                "select": event.target.value,
            },
            success: function(response) {

                //unificar


                response.forEach((e, i, arr) => {


                    document.getElementById("body").innerHTML += `
                    <tr>
                          <td>${i+1}</td>
                          <td>${e.FABRICANTE}</td>
                          <td>${e.UND}</td>
                          <td> $${ Math.trunc(e.VAL).toLocaleString("es")}</td>
                          <td>${ (e.VAL / num).toFixed(4)}%</td>
                    </tr>
                    `

                });

                $('table#tbl').tableSortable();


                document.getElementById('inf_db').textContent = ""
            },
            error: function(err) {
                console.log(err);
            }
        });
    }



});

function ClearTables() {
    $('#tbl').DataTable().clear().draw();
}