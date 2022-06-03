@extends('layout.app')
@section('contenido')
  @include('home.navbar')
  @include('home.breadcrumb')

  <!--usuario sin rol-->
  <div class="container">
      <div class="row">
        @if(auth()->user()->fk_rol == "")
        @include('layout.none-rol')
      @endif

      <!--usuario admin-->

      @if(auth()->user()->fk_rol == 1)
      @include('home.list')
      @endif

      <!--usuario cliente-->


      @if(auth()->user()->fk_rol === 2)
      @include('home.home_')
      @endif


      @if(auth()->user()->fk_rol === 3)
      @include('home.home_')
      @endif


      @if(auth()->user()->fk_rol === 4)
        @include('home.home_')
      @endif

      <!--usuario empleado-->

      @if(auth()->user()->fk_rol === 5)
        @include('home.home_')
      @endif
      </div>
  </div>



  @include('home.navbutton')


  @endsection
