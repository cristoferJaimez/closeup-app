@extends('layout.app')

@push('head')

@endpush
@section('contenido')
    <div class="loader-page"><span class="ref"></span></div>

    <script>
    </script>
    <style>
        
    </style>

    <!--map -->
  

    <div id="map" class="map col-md-12">
    </div>

    <script>
    </script>

    
    <table id="" class="result m-3 col-md-4 col-sm-12  table table-dark table-sm position-absolute bottom-0 start-0 "
        style="width: 20%">
        <tbody>

            <tr>
                <td class="">Area: </td>
                <td class=""><b class="resultado_"></b></td>
            </tr>

            <tr>
                <td class="">Department: </td>
                <td class=""></td>
            </tr>
            <tr>
                <td class="">Municipality: </td>
                <td class=""></td>
            </tr>
            <tr>
                <td class="">Locality: </td>
                <td class=""></td>
            </tr>
            <tr>
                <td class="">Neighborhood: </td>
                <td class=""></td>
            </tr>

            <tr>
                <td class="">UTC:</td>
                <td></td>
            </tr>
        </tbody>
    </table>


    @include('UTC.layout.navbar')

    <script>
       
    </script>
@endsection
