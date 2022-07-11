@extends('layout.app')
@section('contenido')
@include('home.navbar')
    <div class="container p-3">
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
                            <td><img src="{{$item->img}}" alt="{{$item->cod}}" width="100px" height="100px"></td>
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
