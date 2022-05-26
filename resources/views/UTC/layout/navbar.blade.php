<!--<div class=" position-relative m-5  mt-2 float-end " id="buttons">

    <a class=" btn btn-primary btn-sm border border-2 shadow-lg " data-bs-toggle="offcanvas" href="#offcanvasExample"
        role="button" aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars"></i>
    </a>

    <button class=" btn btn-danger btn-sm border border-2 shadow-lg ">
        <i class="fa-solid fa-location-dot"></i>
    </button>

    <button class="btn btn-info btn-sm border border-2 shadow-lg" onclick="print()"><i
            class="fa-solid fa-print"></i></button>

</div>

-->
<div class=" position-relative m-5  mt-2 float-end float-xxl-end float-lg-end " id="buttons">
    <div class="container">


        <button class="btn btn-secondary btn-sm border border-2 shadow-lg" onclick="print()"><i
                class="fa-solid fa-print"></i></button>

        </p>

        <form action="{{ url('utcmaps') }}" method="POST" id="form-search" class="mb-3">
            @csrf
            <div class="input-group mb-3">
                <select type="search" class="mi-selector form-control  input-sm"  style="font-size: 0.7em" placeholder="Search" aria-label="Search"
                    aria-describedby="basic-addon1">
                </select>
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-map-location-dot"></i></span>

            </div>


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

        <form action="" id="form_utc" style="display: none">

            @csrf
            <div class="input-group mb-3">
                <select type="search" class="mi-selector form-control  input-sm"  id="my-select" style="font-size: 0.7em" placeholder="Search" aria-label="Search"
                    aria-describedby="basic-addon1">
                </select>
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-map-location-dot"></i></span>

            </div>
        </form>



    </div>

</div>



</div>
