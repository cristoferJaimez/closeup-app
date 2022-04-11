<nav class="navbar d-none d-sm-block  d-sm-none d-md-block navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}"> <i class="fa-solid fa-user"></i>  {{ auth()->user()->name }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('home') ? 'active' : ""}}" aria-current="page" href="{{url('home')}}"> <i class="fa-solid fa-house-user"></i> Home </a>
                </li>

                @if(auth()->user()->fk_rol === 1)
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('listUsers') ? 'active' : ""}}" aria-current="page" href="{{url('listUsers')}}"><i class="fa-solid fa-users-line"></i> List Users</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('listPost') ? 'active' : ""}}" aria-current="page" href="{{url('listPost')}}">  <i class="fa-solid fa-clipboard-list"></i> List Post</a>
                </li>
                    
                @else
                    
                @endif
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    <li class="nav-item ">
                        <form action="{{url('logout') }}" style="display: inline;" method="POST">
                            @csrf
                            <button class="nav-link btn btn-sm"  type="submit"  >  <i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out</button>
                        </form>
                    <li>

                    <li class="nav-item">
                        <img src="https://www.close-upinternational.com/img/logo.svg" alt="avatar"
                            class="rounded-circle navbar-brand border m-2 bg-Light" width="20px" height="20px">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
