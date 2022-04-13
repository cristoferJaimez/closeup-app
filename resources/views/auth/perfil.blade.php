@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    @include('home.navbutton')

    @foreach ($user as $usu)
        @if ($usu->id === auth()->user()->id)
            <div class="container">
                <div class="row mt-4 m-2">
                    <div class="card">
                        <div class="card-body">
                            <ul>
                                <li>
                                    <img src="{{auth()->user()->avatar}}" alt="" class="img-fluid rounded mx-auto d-block mt-4 mb-3 img-thumbnail">
                                </li>
                                <li>
                                    User: {{ auth()->user()->name }}
                                    <ol>Email: {{ auth()->user()->email }}</ol>
                                    <ol>Document:</ol>
                                    <ol>Addres:</ol>
                                    <ol>Phone: </ol>
                                    <ol></ol>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
    @endforeach
@endsection
