@extends('layout.app')
@section('contenido')
  @include('home.navbar')
  @if(auth()->user()->fk_rol == 1)
  @include('home.list') 
  @endif
  @if(auth()->user()->fk_rol == "")
    @include('layout.none-rol')
  @endif
@endsection
