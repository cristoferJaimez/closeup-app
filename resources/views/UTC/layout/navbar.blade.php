<div class="  m-5  mt-2 float-end float-xxl-end float-lg-end  card p-3 " id="buttons"
    style="width: 15rem">
   


        <button class="btn btn-secondary btn-sm border border-2 shadow-lg " style="width: 25%" onclick="print()"><i
                class="fa-solid fa-print"></i></button>

        </p>

        <form action="{{ url('utcmaps') }}" method="POST" id="form-search" class="mb-3">
            @csrf
            
                <label class="text-mute form-label" style="font-size: 0.7em">Buscar Persona.</label>
                <select type="search" class="mi-selector form-select form-select-sm" style="font-size: 0.7em"
                    placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                </select>

            

            <label class="text-mute form-label" style="font-size: 0.7em">Region.</label>
            <select class="nieve form-select form-select-sm " style="font-size: 0.7em" id="nieve" name="nieve">
                <option value="0">Please select one Area …</option>
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
        <table class=" table table-sm table-striped">
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



        <form action="">
            @csrf
            <div class="mb-1">
                <label class="text-mute form-label" style="font-size: 0.7em">Departamento.</label>
                <select class="form-select form-select-sm mi-selector   " id="my-select"
                    aria-label="Default select example">
                    <option selected>Seleccione Departamento</option>

                </select>
            </div>

            <div class="mb-1">
                <label class="text-mute form-label" style="font-size: 0.7em">Ciudad.</label>
                <select class="form-select form-select-sm mi-selector   
                    aria-label="Default select example">
                    <option selected>Seleccione Ciudad.</option>

                </select>
            </div>

            <div class="mb-1">
                <label class="text-mute form-label" style="font-size: 0.7em">Municipio.</label>
                <select class="form-select form-select-sm mi-selector   
                    aria-label="Default select example">
                    <option selected>Seleccione Municipio.</option>

                </select>
            </div>

            <div class="mb-1">
                <label class="text-mute form-label" style="font-size: 0.7em">Localidad.</label>
                <select class="form-select form-select-sm mi-selector   
                    aria-label="Default select example">
                    <option selected>Seleccione localidad.</option>

                </select>
            </div>
        </form>



    </div>

</div>


