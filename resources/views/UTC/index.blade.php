@extends('layout.app')

@push('head')

@endpush
@section('contenido')
    <div class="loader-page"><span class="ref"></span></div>


    <!--map -->


    <div id="map" class="map col-md-12">
    </div>


    @include('UTC.layout.navbar')

    <script>

    </script>
@endsection
