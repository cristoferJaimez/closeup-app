
<nav class="navbar mt-5     d-md-none fixed-bottom navbar navbar-dark bg-danger">
    <div class="container-fluid">

        <ul class="nav justify-content-center mx-auto text text-white navbar-dark">
            <li class="nav-item">

                <a class="  border-1 nav-link m-2 {{ request()->routeIs('home') ? 'text-white ' : 'text-dark' }}"
                    aria-current="page" href="{{ url('home') }}"><i class="fa-solid fa-house-user"></i></a>
            </li>

            @if (auth()->user()->fk_rol === 1)
                <li class="nav-item">
                    <a class=" nav-link  border-1 m-2 {{ request()->routeIs('listUsers') ? 'text-white ' : 'text-dark' }}"
                        aria-current="page" href="{{ url('listUsers') }}"><i class="fa-solid fa-users-line"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('perfil') }}/{{ auth()->user()->id }}">
                        <img src="{{auth()->user()->avatar}}" alt="avatar"
                            class="rounded-circle navbar-brand border m-2 bg-white" width="40px" height="40px">
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  border-1 m-2 {{ request()->routeIs('listPost') ? 'text-white ' : 'text-dark' }}"
                        aria-current="page" href="{{ url('listPost') }}"><i
                            class="fa-solid fa-clipboard-list"></i></a>
                </li>
            @else
            <!--
                <li class="nav-item">
                    <a class=" nav-link  border-1 m-2 {{ request()->routeIs('postList') ? 'text-white ' : 'text-dark' }}"
                        aria-current="page" href="{{ url('postList') }}/{{ auth()->user()->id }}"><i
                            class="fa-solid fa-link"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('perfil') }}/{{ auth()->user()->id }}">
                        <img src="{{auth()->user()->avatar}}" alt="avatar"
                            class="rounded-circle navbar-brand border m-2 bg-white" width="40px" height="40px">
                    </a>
                </li>

                <li class="nav-item">
                    <a class=" nav-link  border-1 m-2 {{ request()->routeIs('oldpost') ? 'text-white ' : 'text-dark' }}"
                        aria-current="page" href="{{ url('oldpost') }}/{{ auth()->user()->id }}"><i
                            class="fa-solid fa-clipboard-list"></i></a>
                </li>
            -->
            @endif


            <li class="nav-item ">
                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="nav-link btn text-dark  m-2" type="submit"> <i
                            class="fa-solid fa-arrow-right-from-bracket"></i></button>
                </form>
            <li>

        </ul>


    </div>
</nav>
