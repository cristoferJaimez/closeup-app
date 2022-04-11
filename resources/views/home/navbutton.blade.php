<nav class="navbar mt-5 d-md-none fixed-bottom navbar navbar-dark bg-danger">
    <div class="container-fluid">
        <ul class="nav justify-content-center mx-auto text text-white navbar-dark">
            <li class="nav-item">

                <a class="text-white  border-1 nav-link m-2 {{ request()->routeIs('home') ? 'active' : 'text-muted' }}" aria-current="page"
                    href="{{ url('home') }}"><i class="fa-solid fa-house-user"></i></a>
            </li>

            @if (auth()->user()->fk_rol === 1)
                <li class="nav-item">
                 <a class="text-white nav-link  border-1 m-2 {{ request()->routeIs('listUsers') ? 'active' : 'text-muted' }}" aria-current="page"
                        href="{{ url('listUsers') }}"><i class="fa-solid fa-users-line"></i></a>
                </li>

                <li class="nav-item">
                    <a class="text-white nav-link  border-1 m-2 {{ request()->routeIs('listPost') ? 'active' : 'text-muted' }}" aria-current="page"
                        href="{{ url('listPost') }}"><i class="fa-solid fa-clipboard-list"></i></a>
                </li>
            @else
            @endif

            
            <li class="nav-item ">
                <form action="{{url('logout') }}"  method="POST">
                    @csrf
                    <button class="nav-link btn text-muted m-2"  type="submit"  >  <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                </form>
            <li>

        </ul>

     
    </div>
</nav>