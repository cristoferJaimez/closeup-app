function show_datos_mercado(event) {

    let tbl = document.querySelector('.tbl_info')

    $(tbl).toggle(500, function() {
        console.log($(tbl).attr('class'));
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
    csv = document.querySelector("#csv_file")
    console.log("btn_load");
    $(csv).removeClass("d-none");

}

function closeCSV() {
    let csv = document.querySelector("#csv_file");
    $(csv).addClass("d-none");
}