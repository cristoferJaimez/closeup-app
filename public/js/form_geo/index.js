var buscar = document.querySelector('.buscar')



$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(buscar).on('keyup', function(params) {
    var request = $.ajax({
        url: "get_forma",
        method: "GET",
        data: $(this).val(),

        success: function(data) {
            console.log(data);
        },
        error: function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
        complete: function(xhr, status) {
            //alert('Petición realizada');
        }
    });


})