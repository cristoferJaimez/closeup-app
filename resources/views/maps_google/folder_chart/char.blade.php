<style>
    .scroll {
        max-height: 400px;
        overflow-y: auto;
    }
</style>


<!--msm-loading-->
<div class="card-loading text-center d-none">
    Loading...
</div>


<!--tablas stadisitcas-->




<div class="card rounded">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary" disabled onclick="drawing_col()"><i
                    class="fa-solid fa-earth-americas"></i></i></button>
            <button type="button" class="btn btn-secondary" disabled> <i class="fa-solid fa-layer-group"></i></button>
            <button type="button" class="btn btn-secondary"  onclick="btn_gf()"> <i
                    class="fa-solid fa-chart-simple"></i></button>

        </div>
        <div class="btn-group ml-4" role="group" aria-label="Third group">
            <button type="button" class="btn btn-secondary" onclick="home(11001011641,63153 )"><i
                    class="fa-solid fa-home"></i></button>
        </div>
    </div>
    <form action="" method="POST">
        @csrf
        <input type="text" name="arr_utc" class="d-none" id="arr_utc">

        <input type="number" id="vt" class="d-none">

        <select style="font-size: 0.9em" class="select_1 form-select form-select-sm" name="select_1" id="select_1" required>
            <option value="">seleccionar</option>
            <option value="2">Laboratorio</option>
            <option value="1">Producto</option>
            <!--<option value="">Molecula</option>-->
        </select>


        <div class="card p-2 scroll table-responsive-lg" style=" overflow-x: hidden; font-size: 0.75em">
            <span id="inf_db"></span>
            <table id="tbl" class="table scroll">
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




<div class="">
    <span class="">
        <h2></h2>
    </span>


</div>


<!--información-->
