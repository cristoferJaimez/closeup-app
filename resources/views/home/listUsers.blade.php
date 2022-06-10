@extends('layout.app')
@include('home.load')

@section('contenido')
    @if (auth()->user()->fk_rol === 1)
       <div class="container-fluid">
           <div class="row">
            <h6 class="text-muted"><i class="fa-solid fa-users"></i> List Users</h6>
            <hr>
            <div class="col-md-3 col-sm-12">
                <div class="list-group list-group-flush" style="  overflow-x: hidden; overflow-y: hidden">
                    <a href="#" class="list-group-item list-group-item-action href_  " aria-current="true">
                        <i class="fa-solid fa-circle-plus"></i> Add Users csv
                    </a>
                    <a href="#" class="list-group-item list-group-item-action href_  " aria-current="true">
                        <i class="fa-regular fa-file-csv"></i><i class="fa-solid fa-arrow-down-from-line"></i> Export Users
                    </a>

                </div>
            </div>

            <div class=" col-md-9  col-sm-12">

                <table class="table table-striped ">
                    <thead class="text-center">
                        <th><i class="fa-solid fa-users"></i> Name User</th>
                        <th> <i class="fa-solid fa-user-gear"></i> Rol</th>
                    </thead>
                    <tbody >
                        <form action="{{ url('rolupdate') }}" method="POST">
                            @foreach ($user as $usu => $value)
                                <tr>

                                    <td class="fs-6 text-capitalize" style="font-size: 0.7em">{{ $value->name }}</td>
                                    <td class="" style="font-size: 0.7em">
                                        <select class="form-select form-select-sm border-0 " required
                                            aria-label="Default select example">
                                            @foreach ($rol as $item)
                                                @if ($item->id === $value->fk_rol)
                                                    <option selected>{{ $item->description }}</option>
                                                @endif
                                            @endforeach
                                            @foreach ($rol as $item)
                                                <option value="{{ $item->id }}" class="text-capitalize">
                                                    {{ $item->description }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>

            </div>


           </div>
       </div>



        </div>
    @else
        sin permiso
    @endif
@endsection
