@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    @include('home.navbutton')
   
    @if (auth()->user()->fk_rol === 1)
        <div class="container mt-5">
            <div class="row mt-5 ">
                <div class="table-responsive">

                    <div class="card col-md-12 mx-auto col-sm-12">
                        <div class="card-body ">
                            <table class="table table-sm ">
                                <thead class="text-center">
                                    <th> <i class="fa-solid fa-users"></i> Users</th>
                                    <th><i class="fa-solid fa-ballot-check"></i> Type report</th>
                                    <th><i class="fa-solid fa-ballot-check"></i> Category</th>
                                    <th> <i class="fa-solid fa-link"></i> Links</th>
                                    <th> <i class="fa-solid fa-database"></i> Status</th>
                                    <th> <i class="fa-solid fa-calendar"></i> Date</th>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post => $value)
                                        <tr>
                                            <td>
                                                @foreach($user as $usu)
                                                    @if ($usu->id === $value->user_id)
                                                        {{$usu->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center text-capitalize">
                                                @foreach($type as $ty)
                                                    @if ($ty->id === $value->type_report_id)
                                                        {{$ty->type}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center text-capitalize">
                                                @foreach($cate as $ca)
                                                @if ($ca->id === $value->category_id)
                                                    {{$ca->category}}
                                                @endif
                                            @endforeach
                                            </td>
                                            <td class="text-center"><a href="{{ $value->url }}"
                                                    class="d-inline-block text-truncate " style="max-width: 150px;"
                                                    target="blank_"> {{ $value->url }}</a></td>
                                            <td class="text-center text-success">
                                                <i class="fa-solid fa-link" title="ON LINE"></i>
                                            </td>
                                            <td>{{ $value->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


            </div>


        </div>
    @else
        sin permiso
    @endif
@endsection
