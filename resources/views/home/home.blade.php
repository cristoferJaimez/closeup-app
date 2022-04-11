@extends('layout.app')
@section('contenido')
  @include('home.navbar')
  
  <!--usuario sin rol-->

  @if(auth()->user()->fk_rol == "")
    @include('layout.none-rol')
  @endif

  <!--usuario admin-->

  @if(auth()->user()->fk_rol == 1)
  @include('home.list') 
  @endif

  <!--usuario cliente-->

  
  @if(auth()->user()->fk_rol == 2)
  <h1>lista de url</h1> 
  @endif

  
  @if(auth()->user()->fk_rol == 3)
  <h1>lista de url</h1>
  @endif

  <!--usuario empleado-->
  
  @if(auth()->user()->fk_rol == 4)
    @include('home.home_')
  @endif
  
  @endsection
