@extends('layout.app')

@section('contenido')


    @if (auth()->user()->fk_rol === 1)

        <div class="container-fluid ">
            <div class="row">
                <h6 class="text-muted"><i class="fa-solid fa-users"></i> List Users</h6>
                <hr>
                <div class="col-md-3 col-sm-12">
                    <div class="list-group list-group-flush" style="  overflow-x: hidden; overflow-y: hidden">

                        <a class=" list-group-item list-group-item-action" data-bs-toggle="modal" href="#exampleModalToggle"
                            role="button">
                            <i class="fa-solid fa-circle-plus"></i> Add Users csv
                        </a>
                        <a href="#" class="list-group-item list-group-item-action href_  " aria-current="true">
                            <i class="fa-solid fa-floppy-disk"></i> Export Users
                        </a>

                    </div>
                </div>

                <div class=" col-md-9  col-sm-12">
                    <h6 class="text-center text-muted">List System Users</h6>
                    <div class="list-group" style="overflow-x: hidden">

                        <a href="#" class="list-group-item list-group-item-action " aria-current="true"> <i
                                class="fa-solid fa-boxes-stacked ml-5"></i> | <img
                                src="https://www.close-upinternational.com/img/logo.svg" width="35px" height="35px"
                                class="img-fluid ml-2" alt="logo"> <span class="text-end m-5">The current link
                                item</span><i class="fa-solid fa-users"></i> <span class="m-1">#
                                Users|</span></a>
                        <div id="listado"></div>

                    </div>


                </div>


            </div>
        </div>



        </div>
    @else
        sin permiso
    @endif


    <!--modal-->
    @include('home.modal_new_users')
@endsection
