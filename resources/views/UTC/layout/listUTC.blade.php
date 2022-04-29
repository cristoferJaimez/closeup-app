@extends('layout.app')
@section('contenido')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('home.navbar')
    @include('home.navbutton')
    <div class="container">
        <div class="row">

            <div class="card p-3 mt-3 m-3">

                <table class="yajra-datatable ">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>UTC</th>
                            <th>Area</th>
                            <th>Departament</th>
                            <th>Municipality</th>
                            <th>Locality</th>
                            <th>Neighborhood</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                {{ json_encode($data) }}

                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
                <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
                <script type="text/javascript">
                    $(function() {
                                var table = $('.yajra-datatable').DataTable({
                                        processing: true,
                                        serverSide: true,


                                        ajax: {
                                            "url": "{{ route('listUTC') }}",
                                            "type": "GET",
                                            dataType: "json",
                                            "contentType": "application/json",
                                        },
                                            columns: [{
                                                    data: 'id',
                                                    name: 'id'
                                                },
                                                {
                                                    data: 'co_barrio',
                                                    name: 'co_barrio'
                                                },
                                                {
                                                    data: 'region',
                                                    name: 'region'
                                                },
                                                {
                                                    data: 'departamento',
                                                    name: 'departamento',

                                                },
                                                {

                                                    data: 'municipio',
                                                    name: 'municipio',
                                                },
                                                {
                                                    data: 'localidad',
                                                    name: 'localidad',
                                                },
                                                {
                                                    data: 'desc_utc',
                                                    name: 'desc_utc',
                                                },
                                                {
                                                    data: 'action',
                                                    name: 'action',
                                                    orderable: true,
                                                    searchable: true
                                                },
                                            ]
                                        });

                                });
                </script>

            </div>
        </div>
    </div>
@endsection
