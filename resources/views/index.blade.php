@extends('layout.app')
@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 col-sm-12">
            <div class="">
                @auth
                <div class="d-flex align-items-center p-5  flex-column bd-highlight">
                    <div class="mt-auto p-5  bd-highlight">
                        @include('auth.user')
                    </div>
                </div>
                    
                @endauth

                @guest
                @include('auth.login')
                @endguest

            </div>
        </div>
           
           @auth
            @include('auth.home')
           @endauth
            @guest
        <div  class="border-start text-with bg-dark  vh-100  d-flex justify-content-center align-items-center   col-md-7 col-sm-12 d-sm-none  d-none d-md-block m-0  row justify-content-center aling-item-center">
            <div class="col-auto p-5 mt-5 text-light " >
                <p class="text-left">
                    <h1>Welcome to</h1>
                    <h2>our community</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum dignissimos unde eum perspiciatis. Qui consequatur explicabo, ratione tempore illo ut eaque deleniti nobis aspernatur facilis nam tenetur inventore quis et?
                    </p>

                    <p class="text-center">
                        Our clients
                    </p>
                    <p>
                        @include('auth.user')
                    </p>
                    <p>
                        
                    </p>
                </p>
               </div>
        </div>
            @endguest
          
      
</div>
@endsection
