var buscar = document.querySelector('.buscar')



$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(buscar).on('keyup', function(params) {
    var palabra = $(this).val();

    $.ajax({
        type: 'get',
        url: "form_geo",

        success: function(data) {
            console.log(data);
        },
        error: function(xhr, status) {
            console.log(xhr);
            alert('Disculpe, existió un problema');
        },
        complete: function(xhr, status) {
            //alert('Petición realizada');
        }
    });


})