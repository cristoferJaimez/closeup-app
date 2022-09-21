<style>
    .scroll {
        max-height: 500px;
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
            <button type="button" class="btn btn-secondary" disabled onclick="btn_gf()"> <i
                    class="fa-solid fa-chart-simple"></i></button>

        </div>
        <div class="btn-group ml-4" role="group" aria-label="Third group">
            <button type="button" class="btn btn-secondary" onclick="home(11001011641)"><i
                    class="fa-solid fa-home"></i></button>
        </div>
    </div>
    <form action="" method="POST">
        @csrf
        <input type="text" name="arr_utc" class="d-none" id="arr_utc">



        <select style="font-size: 0.9em" class="select_1 form-select form-select-sm" name="select_1" id="select_1" required>
            <option value="">seleccionar</option>
            <option value="2">Laboratorio</option>
            <option value="1">Producto</option>
            <!--<option value="">Molecula</option>-->
        </select>

        <button onclick="clean_table()" style="font-size: 0.7em" type="button" class="btn btn-sm btn-outline-secondary">clean</button>



        <div class="card p-2 scroll table-responsive-lg" style=" overflow-x: hidden;">
            <span id="inf_db"></span>
            <table id="table" class="table align-middle" style="overflow-y: auto; font-size: 0.7em ;">

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
