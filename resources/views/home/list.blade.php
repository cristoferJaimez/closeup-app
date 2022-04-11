<div class="container mt-5  ">
    <div class="row  ">
        <div class="card-group ">
        @foreach ($user as $item => $value)
            <div class="card mx-auto col-md-3 col-sm-12  " style="max-width: 18rem;">
                <img src="https://www.close-upinternational.com/img/logo.svg" class="card-img-top p-5"  alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title text-center">{{$value->name}}</h5>
                    <p class="card-text text-center">
                       <h1>Post <b class="text-muted">|</b>  0 </h1>
                    </p>
                    <a href="{{'post'}}/{{$value->id}}" class="btn  btn-primary btn-sm">new post</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </div>
            </div>

            
        @endforeach
        </div>
    </div>


</div>
