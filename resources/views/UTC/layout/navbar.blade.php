
<div class="  float-end float-xxl-end float-lg-end  card p-3 buttons " id="" style="width: 15rem">

    <div class="container">
        <div class="row">


            <button class=" btn btn-light  btn-sm border border-2 shadow-lg " style="width: 15%" onclick="body.webkitRequestFullscreen()">
                <i class="fa-solid fa-expand"></i></button>

            <button class="btn btn-light btn-sm border border-2 shadow-lg " style="width: 15%" onclick="print()"><i
                class="fa-solid fa-print"></i></button>

        </div>
    </div>
    <hr>
    </p>

    <form action="{{ url('utcmaps') }}" method="POST" id="form-search" class="mb-3">
        @csrf

        <label class="text-mute form-label" style="border: none; height: 20px; font-size: 0.7em">Buscar Persona.</label>
        <select type="search" class="mi-selector form-select form-select-sm" style="font-size: 0.7em"
            placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
        </select>



        <label class="text-mute form-label" style="font-size: 0.7em">Region.</label>
        <select class="nieve form-select form-select-sm  " style="border: none; height: 20px; font-size: 0.7em" id="nieve" name="nieve">
            <option value="0">Seleccione Region.</option>
            @if (Session::has('regiones'))
            @else
                @foreach ($regiones as $item)
                    <option value="{{ $item->co_region }}">{{ $item->region }} </option>
                @endforeach
            @endif

        </select>


        <!--msm -->
        @if (Session::has('utc'))
        @endif


    </form>

    <!-- result -->
    <table class=" table table-sm table-striped" style="display: none">
        <tbody class="fs-6 text">
            <tr class="" style="font-size: 0.7em">
                <td># UTC</td>
                <td>
                    <div class="num_utc"></div>
                </td>
            </tr>


        </tbody>
    </table>

    <div class="text-center" id="cargando">
    </div>



    <form action="" id="form-search-utc" >
        @csrf
        <div class="mb-1">
            <label class="text-mute form-label" style="font-size: 0.7em">Departamento.</label>
            <select class="my-select-dep form-select form-select-sm mi-selector"    id="my-select-dep" name="my-select-dep"
                style="font-size: 0.7em" >


            </select>
        </div>

        <div class="mb-1">
            <label class="text-mute form-label" style="font-size: 0.7em">Ciudad.</label>
            <select class="form-select form-select-sm mi-selector">

            </select>
        </div>

        <div class="mb-1">
            <label class="text-mute form-label" style="font-size: 0.7em">Municipio.</label>
            <select class="form-select form-select-sm mi-selector">

            </select>
        </div>

        <div class="mb-1">
            <label class="text-mute form-label"  style="font-size: 0.7em">Localidad.</label>
            <select class="form-select form-select-sm " multiple= "multiple" name="my-select-utc"  id="my-select-utc">

            </select>
        </div>
    </form>



</div>

</div>


