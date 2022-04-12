@extends('layout.app')
@section('contenido')
    @include('home.navbar')
        @include('home.navbutton')

    <!--msm -->
    <div class="container mt-5 mb-3">

        <div class="row mt-5  ">
            <a href="{{'postList'}}/{{auth()->user()->id}}" class="  col-md-6 col-sm-12 text-decoration-none mb-2 text-muted">
              <div class="card ">
                  <div class="card-body d-flex justify-content-between">
                      <div class="text-star ">
                        <i class="fa-solid fa-file-excel"></i>  File Flash. 
                      </div>
                      <div class="text-end">
                        <span class="badge bg-success">New Post  <i class="fa-solid fa-file-excel"></i></span>
                      </div>
                  </div>
              </div>
            </a>

      
          <a href="{{'postList'}}/{{auth()->user()->id}}" class=" col-md-6 col-sm-12 text-decoration-none mb-2 text-muted">
            <div class="card ">
                <div class="card-body d-flex justify-content-between">
                    <div class="text-star ">
                      <i class="fa-solid fa-bell"></i> New Post. 
                    </div>
                    <div class="text-end">
                      <span class="badge bg-danger">New Post <i class="fa-solid fa-face-grin-stars"></i></span>
                    </div>
                </div>
            </div>
          </a>
        
           <a href="{{'oldpost'}}/{{auth()->user()->id}}" class="col-md-6 col-sm-12 text-decoration-none text-muted">
            <div class="card   mb-3">
                <div class="card-body">
                    <i class="fa-solid fa-link-slash m-2"></i>   Old post list.
                </div>
            </div>
           </a>
        </div>
    </div>
  
@endsection
