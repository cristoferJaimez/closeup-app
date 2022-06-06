@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    @include('home.navbutton')

    <!--msm -->
    <div class="container">
        <div class="row mt-5">

            <div class="col-md-3 col-sm-12">
                <div class="card m-1">
                    <span class="text-muted p-1">
                        labs
                    </span>
                    <div class="card-body text-center">
                        @foreach ($proveedor as $pro)

                            @if ($pro->id === auth()->user()->id)

                            <img class="img-fluid" src="{{$pro->url}}"  width="150px"/>
                            @endif
                        @endforeach
                        <p>

                        </p>
                    </div>
                </div>



            </div>
            <div class="col-md-9 col-sm-12">

                <div class="card  col-12 m-1">
                    <div class="card-body text-center">


                        <div class="card-group">
                            <div class="card m-1">
                                <div class="card-header no-border">
                                 <!--   <h5 class="card-title">Flash</h5> -->
                                </div>
                                <div class="card-body pt-0">
                                    <div class="widget-49">
                                        <div class="widget-49-title-wrapper">
                                            <div class="widget-49-date-danger">
                                                <span class="widget-49-date-day">
                                                    <i class="fa-solid fa-bolt-lightning"></i>
                                                </span>
                                                <span class="widget-49-date-month"></span>
                                            </div>
                                            <div class="widget-49-meeting-info">
                                                <span class="widget-49-pro-title">Pharmacist</span>
                                                <span class="widget-49-meeting-time">time</span>
                                            </div>
                                        </div>
                                        <ol class="widget-49-meeting-points">
                                            <!--<li class="widget-49-meeting-item"><span>descripcion</span></li>-->
                                        </ol>
                                        <div class="widget-49-meeting-action">
                                            <a href="{{ 'postList' }}/{{ auth()->user()->id }}"
                                                class="btn btn-sm btn-flash-border-success">View All</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card  m-1">
                                <div class="card-header no-border">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="widget-49">
                                        <div class="widget-49-title-wrapper">
                                            <div class="widget-49-date-success">
                                                <span class="widget-49-date-day">
                                                    <i class="fa-solid fa-prescription"></i>
                                                </span>
                                                <span class="widget-49-date-month"></span>
                                            </div>
                                            <div class="widget-49-meeting-info">
                                                <span class="widget-49-pro-title">Document.</span>
                                                <span class="widget-49-meeting-time"></span>
                                            </div>
                                        </div>
                                        <ol class="widget-49-meeting-points">
                                            <!--<li class="widget-49-meeting-item"><span>descripcion</span></li>-->
                                        </ol>
                                        <div class="widget-49-meeting-action">
                                            <a href="{{ 'postList' }}/{{ auth()->user()->id }}"
                                                class="btn btn-sm btn-flash-border-success">View All</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="position-absolute bottom-0 end-0">
    @foreach ($proveedor as $pro)
                            @if ($pro->id === auth()->user()->id)
                            <img class="img-fluid" src="{{$pro->url}}" width="200px" />
                            @endif
                        @endforeach
    </div>










@endsection
