

 <div class=" position-relative m-5  mt-2 " id="buttons">

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




<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"> <i class="fa-solid fa-map-location-dot"></i> UTC MAPS
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>




    <div class="offcanvas-body">
        <div class="container">
            <form action="" class="mb-3">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i
                            class="fa-solid fa-map-location-dot"></i></span>
                    <input type="search" class="form-control" placeholder="Search for user" aria-label="Search"
                        aria-describedby="basic-addon1">
                </div>


                    <select class="nieve form-select form-select-sm " name="nieve">
                        <option value="">Please select one Area …</option>
                        @foreach ($regiones as $item)
                        <option value="{{ $item->co_region }}">{{ $item->region }} </option>
                    @endforeach
                    </select>




            </form>

            <!-- result -->
            <div class="resultado">
                   vacio
            </div>

        </div>

    </div>
</div>



