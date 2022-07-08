@extends('layout.app')
@section('contenido')
    <div class="container p-3">
        <div class="row">
            <table class="table table-strip " style="font-size: 0.7em;">
                <header>
                    <tr>
                        <td>Cod</td>
                        <td>Name</td>
                        <td>Adress</td>
                        <td>Lat</td>
                        <td>Lng</td>
                        <td>Google Adress</td>
                        <td>img</td>
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
                            <td>{{ $item->img }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mx-auto mt-3" style="font-size: 0.7em;">
            {{ $lista->links() }}
        </div>

    </div>
@endsection
