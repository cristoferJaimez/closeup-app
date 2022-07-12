$("#cadena_ind").on('change', function() {
    if ($(this).val() != "") {
        var codigo = $(this).val();
        var option = $("#cadena_ind option:selected").text();
        if (codigo == '1') {
            $(".select_nom_cadena").removeClass('d-none')
            $(".select_pharma").addClass('d-none')
        } else if (codigo == '2') {
            $(".select_pharma").removeClass('d-none')
            $(".select_nom_cadena").addClass('d-none')
        } else {
            $(".select_pharma").addClass('d-none')
            $(".select_nom_cadena").addClass('d-none')
        }
    }
});