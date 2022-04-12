<div class="container mb-5 mt-3 ">
    <div class="row mb-4  ">
        @foreach ($user as $item => $value)
            <div class="card mx-auto col-md-4 col-sm-12 mb-2  " style="max-width: 18rem;">
                <img src="https://www.close-upinternational.com/img/logo.svg" class="card-img-top p-5" alt="{{ $value->name}}">
                <div class="card-body text-center">
                    <h5 class="card-title text-center">{{ $value->name }}</h5>
                    <h6 class="card-subtitle text-muted">{{ $value->fk_rol }}</h6>
                    <p class="card-text text-center">

                    </p>
                    <div class="d-grid gap-2">
                        <a href="{{ 'post' }}/{{ $value->id }}" class="btn  btn-primary btn-sm">new post</a>
                    </div>
                </div>

            </div>
        @endforeach
    </div>


</div>
