<style>

.scroll:::-webkit-scrollbar:vertical {
    background-color: rgb(219, 107, 107);
}


</style>

<div class="mt-2">


    <div class="btn-group mb-2" role="group" aria-label="Third group">
        <button type="button" class="btn btn-secondary" onclick="home(11001011641, 63153)"><i
                class="fa-solid fa-home"></i></button>
        <button class="btn btn-sm btn-secondary" type="button" onclick="print()"><i
                class="fa-solid fa-print"></i></button>
        <button class="btn btn-sm btn-secondary" type="button" onclick="calculo()"><i
                class="fa-solid fa-calculator"></i></button>
        <button class="btn btn-sm btn-secondary" type="button" onclick="calculo()"><i
                class="fa-solid fa-calculator"></i></button>
    </div>

    <form action="" method="POST">
        @csrf
        <input type="text" name="arr_utc" class="d-none" id="arr_utc">

        <input type="number" id="vt" class="d-none">

        <select style="font-size: 0.9em" class="select_1 form-select form-select-sm" name="select_1" id="select_1"
            required>
            <option value="">seleccionar</option>
            <option value="2">Laboratorio</option>
            <option value="1">Producto</option>
            <option value="3">Mol&eacute;cula</option>
            <!--<option value="">Molecula</option>-->
        </select>


        <div class="card p-2 scroll table-responsive-lg" id="tabla" style=" overflow-x: hidden; ">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="text-muted btn btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" ><i class="fa-solid fa-chart-simple"></i></button>
                <b class="text-muted btn btn-sm " onclick="max_min('#tabla')">&plusmn;</b>
            </div>
            <span id="inf_db"></span>
            <table id="tbl" class="table scroll" style="font-size: 0.9em;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>FAB/PROD</th>
                        <th>UND</th>
                        <th>VAL</th>
                        <th>(MSH)</th>
                    </tr>
                </thead>
                <tbody id="body" style="font-size: 0.8em">
                </tbody>
            </table>
        </div>
    </form>
</div>






<!--información-->
