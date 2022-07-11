@extends('layout.app')
@section('contenido')
@include('home.navbar')
    <div class="container p-3">
        <div class="container-fluid mb-3 col-md-12 col-sm-12">
            <form action="">
                @csrf
                <label for="search-pharma" class="control-label">Search</label>
                <input type="search" name="search-pharma"  class="form-control ">
            </form>
        </div>
        <div class="row">
            <table class="table table-striped " style="font-size: 0.7em;">
                <header>
                    <tr  class="text-center">
                        <th>Cod</th>
                        <th>Name</th>
                        <th>Adress</th>
                        <th>Lat</th>
                        <th>Lng</th>
                        <th>Google Adress</th>
                        <th>img</th>
                    </tr>
                </header>
                <tbody>
                    @foreach ($lista as $item)
                        <tr>
                            <td>{{ $item->cod }}</td>
                            <td>{{ $item->name_original }}
                            <td>{{ $item->adress }}</td>
                            <td>{{ $item->lat }}</td>
                            <td>{{ $item->lng }}</td>
                            <td>{{ $item->adress_real }}</td>
                            <td class="text-center"><img src="{{$item->img}}" alt="{{$item->cod}}" class="" title="img : {{$item->cod}}" style="cursor: pointer" width="20px" height="20px"></td>
                        </tr>
                        <input type="text" id="img_base_64" value="{{ $item->img }}" class=" d-none">

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mx-auto mt-3" style="font-size: 0.7em;">
            {{ $lista->links() }}
        </div>

    </div>
@endsection
