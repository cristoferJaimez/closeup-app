@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    @include('home.navbutton')

    <!--msm -->
    <div class="container mt-5 mb-3">

        <div class="row mt-5  ">


            <div class="col-sm-12 col-md-4">

                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                        Post
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"><span
                                class="visually-hidden"> <i class="fa-solid fa-bullhorn"></i></span></span>
                    </button>
                </div>
            </div>

            <div class="col-sm-12 col-md-8 card p-2">
                <div class="card-group p-2">


                    <div class="col-md-6">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h5 class="card-title">Flash</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper">
                                        <div class="widget-49-date-danger">
                                            <span class="widget-49-date-day"><i class="fa-solid fa-bullhorn"></i></span>
                                            <span class="widget-49-date-month"></span>
                                        </div>
                                        <div class="widget-49-meeting-info">
                                            <span class="widget-49-pro-title">Document</span>
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



                    <div class="col-md-6">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h5 class="card-title">Post</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper">
                                        <div class="widget-49-date-success">
                                            <span class="widget-49-date-day"><i class="fa-solid fa-bullhorn"></i></span>
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
    @endsection
