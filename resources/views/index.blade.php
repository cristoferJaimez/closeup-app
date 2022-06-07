@extends('layout.app')
@section('contenido')
                <div class="" style="">
                    @auth
                        <div class="">
                            <div class="">
                                @include('auth.loginOK')
                            </div>
                        </div>

                    @endauth

                    @guest
                        @include('auth.login')
                    @endguest

                </div>
            @guest

            @endguest


    @endsection
