@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    @include('home.navbutton')
    @include('home.load')
    <!--msm -->
    <style>
        .socialIcon {
            display: none;
        }

    </style>
    <div class="container" style="">
        <div class="row mt-5 ">
            <div class="col-md-1">

                <div class="position-absolute top-50 start-50   ">
                    <div class="spinner-border text-danger" id="load_" style="display: none" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">

                <div class="card  mb-3 ">
                    <div class="text-center p-2">
                        <img src="https://www.close-upinternational.com/img/logo.svg" width="100px" height="100px"
                            alt="logo" class="p-1 border   rounded-circle" />
                    </div>
                    <div class="card-body text-center">
                        {{auth()->user()->description}}
                        @foreach ($proveedor as $pro)
                            @if ($pro->id == auth()->user()->id)
                                <span class="text-muted">
                                    <h4 class="">{{ $pro->description }}</h4>
                                </span>
                                <img class="img-fluid" src="{{ $pro->url }}" width="200px" />
                            @endif
                        @endforeach
                        <p class="text-start">
                            <br>

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-12 ">


                @foreach ($posts as $post)
                    @if ($post->user_id === auth()->user()->id)
                        <div class="card p-4">
                            <div class="card-body">
                                <h3>{{$post->title}}</h3>
                                <a href=" {{$post->url}}">link</a>
                            </div>
                        </div>
                    @else

                    @endif
                @endforeach
            </div>
        </div>
    </div>

</div>

</div>



</div>
</div>

<div class="position-absolute top-50 end-0 translate-middle-y " style="margin-right: 4px;  z-index: 999999">
    <button class="btn btn-outline-primary   rounded-circle "
        style="margin: auto; text-align:center; 35px; height: 35px;" onclick="body.requestFullscreen()">
        <i class="fa-solid fa-expand"></i>
    </button>
    <br>
    <button class="btn btn-outline-danger btn_   rounded-circle "
        style="display:none; text-align:center; 35px; height: 35px;" onclick="hide_iframe()">
        <i class="fa-solid fa-circle-xmark"></i>
    </button>

</div>

<div class="position-absolute bottom-0 start-50 translate-middle-x next_prev_  d-none p-2 "
    style="display: none; z-index: 999999">
    <div class="container">
        <div class="row">

            <div class="  col-sm-12 col-md-4 ">
                <button class="btn btn-outline-primary   rounded-circle btn_prev "
                    style="margin: auto; text-align:center; 35px; height: 35px;" onclick="">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
            </div>

            <div class="  col-sm-12 col-md-4">
                @foreach ($proveedor as $pro)
                    @if ($pro->id === auth()->user()->id)
                        <img class="img-fluid " style="" src="{{ $pro->url }}" />
                    @endif
                @endforeach
            </div>

            <div class="  col-sm-12 col-md-4 text-end">
                <button class="btn btn-outline-primary   rounded-circle  btn_next"
                    style="margin: auto; text-align:center; 35px; height: 35px;" onclick="">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>


        </div>
    </div>

</div>




<iframe src="" frameborder="0" class="iframe " id="iframe" onload=""
    style="overflow: auto;position:fixed; top:60px; left:0px; bottom:0px; right:0px; width:100%; height:99%; border:none; margin:0; padding:0; overflow:hidden; z-index:999998; display: none;"
    name="iframe">

</iframe>
@endsection
