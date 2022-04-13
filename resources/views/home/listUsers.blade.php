@extends('layout.app')
@include('home.navbar')
@include('home.navbutton')

@section('contenido')
    @if (auth()->user()->fk_rol === 1)
        <div class="container mt-5">
            <div class="row mt-5 m-2">
                <div class="table-responsive-sm">

                    <div class="card col-md-10 mx-auto col-sm-12 mb-5">
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead class="text-center">
                                    <th><i class="fa-solid fa-users"></i> Name User</th>
                                    <th> <i class="fa-solid fa-user-gear"></i> Rol</th>
                                </thead>
                                <tbody>
                                    <form action="{{ url('rolupdate')  }}" method="POST">
                                        @foreach ($user as $usu => $value)
                                            <tr>

                                                <td class="fs-6 text-capitalize">{{ $value->name }}</td>
                                                <td class="col-4">
                                                    <select class="form-select form-select-sm border-0 " required
                                                        aria-label="Default select example">
                                                        @foreach ($rol as $item)
                                                            @if ($item->id === $value->fk_rol)
                                                                <option selected>{{$item->description}}</option>
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
        </div>
        </div>
    @else
        sin permiso
    @endif
@endsection
