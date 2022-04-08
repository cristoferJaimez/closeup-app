@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    <div class="container mt-5 ">
        <div class="row mt-5 ">
            <div class="card mx-auto col-md-4 ">
                <div class="card-body">
                    <table class="text-center">
                        <thead>
                            <th colspan="2" class="text-capitalize">
                                @foreach ($user as $item)
                                     {{$item->name}}
                                @endforeach
                            </th>
                        </thead>
                    </table>
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" autofocus placeholder="title..." required class="form-control">
                        </div>
        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" required cols="30" placeholder="post description..."
                                rows="5"></textarea>
                        </div>
        
                        <div class="mb-3">
                            <label for="url" class="form-label">Url</label>
                            <input type="url" id="url" autofocus placeholder="https://yourlink.com.co" required class="form-control">
                        </div>
                        <div class="d-grid gap-2 ">
                            <button class="btn btn-secondary" type="submit">send post</button>
                        </div>
                    </form>
                </div>
            </div>

            
            
        </div>
        
    </div>
@endsection
