@extends('layout.app')
@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <div class="">
                    @auth
                        <div class="d-flex align-items-center p-5  flex-column bd-highlight">
                            <div class="mt-auto p-5  bd-highlight">
                                @include('auth.loginOK')
                            </div>
                        </div>

                    @endauth

                    @guest
                        @include('auth.login')
                    @endguest

                </div>
            </div>
            @guest
                <div style="  background-image: url('C:\Users\cjaimez\Downloads\Sin título_auto_x2.jpg')"
                    class="border-start text-with bg-dark  vh-100  d-flex justify-content-center align-items-center   col-md-7 col-sm-12 d-sm-none  d-none d-md-block m-0  row justify-content-center aling-item-center">
                    <div class="col-auto p-5 mt-5 text-light ">
                        <p class="text-left">
                        <h1>Welcome to</h1>
                        <h2>our community</h2>
                        <p>
                            Information Channels
                        </p>

                        <p class="text-center">

                        </p>
                        <p>

                        </p>
                        <p>

                        </p>
                        </p>
                    </div>
                </div>
            @endguest

        </div>

    @endsection
