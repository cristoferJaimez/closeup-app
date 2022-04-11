@extends('layout.app')
@section('contenido')
    @include('home.navbar')
        @include('home.navbutton')


    <!--msm -->
    @if (Session::has('post'))
        @foreach ($post as $item)
            @if(auth()->user()->id === $item->user_id)
                {{$item}}
            @endif
        @endforeach
    @else
        <div class="container mt-5">
            <div class="row mt-5 m-2  ">
                <p></p><p></p>
                <i class="border  text-center mt-5 text-muted fa-solid fa-link-slash fa-10x"></i>
                <p class="text-center">
                    No post...
                </p>
            </div>
        </div>
    @endif
@endsection
