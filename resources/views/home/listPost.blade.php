@extends('layout.app')
@section('contenido')
@include('home.navbar')
@include('home.navbutton')

   @if(auth()->user()->fk_rol === 1)
   <div class="container mt-5">
    <div class="row mt-5 mx-auto">
        <div class="card col-md-6 mx-auto col-sm-12">
            <div class="card-body ">
             <table class="table table-sm ">
                 <thead class="text-center">
                     <th>User</th>
                     <th>Link</th>
                     <th>Stated</th>
                     <th>Date</th>
                 </thead>
                 <tbody>
                     @foreach($posts as $post => $value)
                         <tr>
                             <td>{{$value->user_id}}</td>
                             <td><a href="{{$value->url}}" target="blank_">Link</a></td>
                             <td></td>
                             <td>{{ $value->created_at }}</td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
            </div>
        </div>
    </div>
</div>
   @else
    sin permiso
   @endif
@endsection