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


function dataURLtoFile(dataurl, filename) {

    var arr = dataurl.split(','),
        mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]),
        n = bstr.length,
        u8arr = new Uint8Array(n);

    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }

    return new File([u8arr], filename, { type: mime });
}