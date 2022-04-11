@extends('layout.app')
@section('contenido')
@include('home.navbar')
    <div class="container mt-5">
        <div class="row mt-5 m-2">
            <div class="card p-2">
                <p class="card-title">title</p>
                <div class="card-body">
                    <p class="text-muted">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium inventore facere cum aut accusantium saepe minima amet eius eveniet ex consequuntur, odio porro harum suscipit? Architecto praesentium iusto eligendi numquam.
                    </p>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <a href="#" class="btn btn-primary">view link</a>
                    </div>  
                </div>
            </div>
            <div class="card-footer text-center text-muted">
                  date :
            </div>  
        </div>
    </div>
@endsection