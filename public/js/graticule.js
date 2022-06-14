//cargar en div
$(document).ready(function() {
    $('body').on('click', '.href_', function(e) {
        let info;
        let contenedor = document.querySelector("#default");
        let link = $(this).attr('href')
        let salto = window.Location.href = link;
        $.ajax({
            url: link,
            type: 'GET',
            dataType: 'text',
            async: true,
            success: function(e) {
                window.Location.href = link

                info = e
                let view = contenedor.innerHTML = info;

            },
            error: function(xhr, status) {
                alert('Disculpe, existe un problema', xhr, status);
                console.log(status);
            },
        });


        e.preventDefault();
    })
})