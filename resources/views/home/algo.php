<div class="container ">
    <div class="text-end  mt-5 col-12">
        <a href="" class="text-decoration-none ">Add posts <i
                class="fa-solid text-primary fa-circle-plus fa-2x mb-3"></i></a>
    </div>

    <div class="row p-2" style="">
        <div class="col-md-4 col-sm-12">
            <div class="card p-3">
                <ul class="list-group list-group-flus">
                    @foreach ($user as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <img src="{{ auth()->user()->avatar }}" alt="" class="img-fluid col-1">
                            <span class="  p-2 rounded-pill">

                                <i class="text-muted text-uppercase ">
                                    @foreach ($rols as $rol)
                                        @if ($rol->id === $item->fk_rol)
                                            {{ $rol->description }}
                                        @endif
                                    @endforeach
                                </i> :
                                <b class="text-capitalize " aria-current="page"> {{ $item->name }} </b>
                                </i>
                            </span>
                            <span class="rounded-pill">
                                <a href=""><i class="fa-solid fa-user-gear m-2"></i></a>
                                <a href="{{ url('post') }}\{{ $item->id }}"><i
                                        class="fa-solid fa-link m-2"></i></a>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="col-md-7 col-sm-12">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>




    </div>


</div>
