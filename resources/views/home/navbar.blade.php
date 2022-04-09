<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">{{ auth()->user()->name }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('home') ? 'active' : ""}}" aria-current="page" href="{{url('home')}}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('listUsers') ? 'active' : ""}}" aria-current="page" href="{{url('listUsers')}}">List Users</a>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    <li class="nav-item ">
                        <form action="{{url('logout') }}" style="display: inline;" method="POST">
                            @csrf
                            <button class="nav-link btn btn-sm"  type="submit"  >  Sign out</button>
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
