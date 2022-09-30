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

                //console.log(response);
                //acomular duplicados
                duplicado(response)

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
                duplicado(response)

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




function duplicado(data) {


    data.forEach((val, i, arr) => {
        data.forEach((val_, i_, arr_) => {

            if (arr.PROD == arr_.PROD) {
                console.log('repetido');
            } else {
                console.log('no repetidos');
            }

        })
    })



    const busquedad = data.reduce((acc, data, acu) => {
        if (data.PROD) {

            acc[data.PROD] = [++data.UND] || 0;
        } else {
            acc[data.FABRICANTE] = ++acc[Number(data.UND)] || 0;
        }
        return acc;
    }, {});

    console.log(busquedad);

    const duplicados = data.filter((data) => {
        return busquedad[data.PROD]
    });

    // console.log(duplicados);

}
