<nav class="navbar d-none d-sm-block  d-sm-none d-md-block navbar-expand-lg navbar-light bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ route('home') }}">
            <img src="https://www.close-upinternational.com/img/logo.svg" alt="avatar"
                class="rounded-circle navbar-brand border m-2 bg-white" width="30px" height="30px">
            {{ auth()->user()->name }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto  mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active text-white' : 'text-dark' }}"
                        aria-current="page" href="{{ url('home') }}"> <i class="fa-solid fa-house-user"></i> Home </a>
                </li>

                @if (auth()->user()->fk_rol === 1)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listUsers') ? 'active text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ url('listUsers') }}"><i class="fa-solid fa-users-line"></i>
                            List Users</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listPost') ? 'active text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ url('listPost') }}"> <i class="fa-solid fa-clipboard-list"></i>
                            List Post</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('loadListPost') ? 'active text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ url('loadListPost') }}"><i class="fa-solid fa-file-csv"></i>
                            Load list post</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class=" nav-link  border-1  {{ request()->routeIs('category') ? 'text-white' : 'text-dark' }}"
                            aria-current="page" href="{{url('category_type')}}"><i
                                class="fa-solid fa-clipboard-list"></i> Add</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class=" nav-link  border-1 {{ request()->routeIs('postList') ? 'text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ url('postList') }}/{{ auth()->user()->id }}"><i
                                class="fa-solid fa-link"></i> Links post</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  border-1  {{ request()->routeIs('oldpost') ? 'text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ url('oldpost') }}/{{ auth()->user()->id }}"><i
                                class="fa-solid fa-clipboard-list"></i> List old post</a>
                    </li>

                @endif
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    <li class="nav-item ">
                        <form action="{{ url('logout') }}" style="display: inline;" method="POST">
                            @csrf
                            <button class="nav-link btn btn-sm text-white" type="submit"> <i
                                    class="fa-solid fa-arrow-right-from-bracket"></i> Sign out</button>
                        </form>
                    <li>

                   
                </ul>
            </div>
        </div>
    </div>
</nav>
