<div class="text-center position-absolute top-50 start-50 buttons cargando" style="display: none" id="cargando">
    <div class="card">
        <div class="card-body">
            loading
        </div>
    </div>
</div>

<div class="position-absolute top-50 end-0 translate-middle-y  buttons " id="">
    <div class="btn-group-vertical me-2" role="group" aria-label="Second group">
        <button type="button" class="btn btn-secondary" onclick="body.webkitRequestFullscreen()">
            <i class="fa-solid fa-expand"></i></button>
        </button>
        <button type="button" class="btn btn-secondary" onclick="print()">
            <i class="fa-solid fa-print"></i>
        </button>
    </div>
</div>




<div class="position-absolute top-0 start-50 translate-middle-x card p-2 text-center    buttons " id=""
    style="font-size: 0.7em">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="form-check form-switch" style="">
                    <input class="form-check-input fv" title="Fuerza de Venta" type="checkbox" id="fv" name="fv">
                    <label class="form-check-label text-muted" for="fv">Fuerza de venta</label>
                </div>
            </div>

        </div>
    </div>

</div>



<div class="position-absolute bottom-0 start-50 translate-middle-x card p-3 historial   buttons  " id="historial" 
style="display: none; width: 50em; z-index:3; "
    style="font-size: 0.7em">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('UTC.layout.line_tiempo') 
            </div>

        </div>
    </div>

</div>




<div class="  float-end float-xxl-end float-lg-end  card p-3 buttons " id="" style="width: 15rem">

    <div class="container">
        <div class="row">
            <div class="col-11">

                <form action="{{ url('utcmaps') }}" method="POST" id="form-search" class="mb-3">
                    @csrf

                    <label class="text-mute form-label" style="border: none; height: 20px; font-size: 0.5em">
                        <i class="fa-solid fa-magnifying-glass"></i> Buscar Persona.</label>
                    <select type="search" class="mi-selector form-select form-select-sm" style="font-size: 0.7em"
                        placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                    </select>



                    <label class="text-mute form-label" style="font-size: 0.7em">
                        <i class="fa-solid fa-location-pin"></i> Region.</label>
                    <select class="nieve form-select form-select-sm  " multiple style="border: none; font-size: 0.5em"
                        id="nieve" name="nieve">

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




                <form action="" id="form-search-utc">
                    @csrf
                    <div class="">
                        <label class="text-mute form-label" style="font-size: 0.7em">
                            <i class="fa-solid fa-location-pin"></i> Departamento.</label>
                        <select class="my-select-dep form-select form-select-sm " id="my-select-dep"
                            name="my-select-dep[]" multiple style="border: none; font-size: 0.5em">


                        </select>
                    </div>



                    <div class="">
                        <label class="text-mute form-label" style="font-size: 0.7em">
                            <i class="fa-solid fa-location-pin"></i> Municipio.</label>
                        <select class="form-select form-select-sm my_select-mun" style="font-size: 0.5em;" multiple
                            id="my_select-mun" name="my_select-mun[]">

                        </select>

                    </div>

                    <div class="">
                        <label class="text-mute form-label" style="font-size: 0.7em">
                            <i class="fa-solid fa-location-pin"></i> Localidad.</label>
                        <select class="form-select form-select-sm my_select-loc " style="font-size: 0.5em;" multiple
                            id="my_select-loc" name="my_select-loc[]">

                        </select>
                    </div>

                    <div class="">
                        <label class="text-mute form-label" style="font-size: 0.7em">
                            <i class="fa-solid fa-location-pin"></i> Barrio.</label>
                        <select class="form-select form-select-sm my_select-bar " style="font-size: 0.5em;" multiple
                            id="my_select-bar" name="my_select-bar[]">

                        </select>
                    </div>

                    <div class="">
                        <label class="text-mute form-label" style="font-size: 0.7em">
                            <i class="fa-solid fa-location-pin"></i> UTC.</label>
                        <select class="form-select form-select-sm my-select-utc" multiple="multiple"
                            name="my-select-utc[]" id="my-select-utc" style="font-size: 0.5em">
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
