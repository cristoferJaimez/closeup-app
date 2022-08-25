function show_datos_mercado(event) {

    let tbl = document.querySelector('.tbl_info')

    $(tbl).toggle(500, function() {
        console.log($(tbl).attr('class'));
    });

}