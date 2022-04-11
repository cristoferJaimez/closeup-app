@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    <div class="container mt-5 ">
        <div class="row mt-2 mb-5 ">
                        
            <!--msm -->
            @if(Session::has('message'))    
            <script>
                 Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            )
            </script>
            @endif
         
            <div class="card-group ">

            <div class="card col-md-4 col-sm-12 ">
                    <div class="card-body mt-3 ">
                        <p class="mt-3  d-flex justify-content-center align-items-center">
                            <img src="https://www.close-upinternational.com/img/logo.svg" class="border border-3 rounded-circle navbar-brand border m-2 bg-Light" alt="avatar"  width="200px" height="200px">
                        </p>
                        <p class="text-muted  mt-3">
                         @foreach ($user as $item)
                            <h2 class="text-center"> {{$item->name}}</h2>
                         @endforeach
                        </p>
                    </div>
            </div>
            
            <div class="card mx-auto col-md-8 col-sm-12 ">
                
                <div class="card-body">
                        <form action="{{'public'}}" method="POST">
                        @csrf
                     
                            @foreach ($user as $item)
                            <input type="text" name="user_id" id="user_id" value=" {{$item->id}}" hidden>   
                            @endforeach
                       
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" name="title" autofocus placeholder="title..." required class="form-control">
                        </div>
        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" required cols="30" placeholder="post description..."
                                rows="5"></textarea>
                        </div>
        
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="category_id" id="category_id" required aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Power BI</option>
                                <option value="2">Other</option>
                                
                              </select>
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">Url</label>
                            <input type="url" id="url" name="url" autofocus placeholder="https://yourlink.com.co" required class="form-control">
                        </div>
                        <div class="d-grid gap-2 ">
                            <button class="btn btn-secondary" type="submit">send post</button>
                        </div>
                    </form>
                </div>
            </div>

           
            
            
        </div>
    </div>
        
    </div>
@endsection
