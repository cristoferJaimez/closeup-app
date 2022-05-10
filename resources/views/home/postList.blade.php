@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    @include('home.navbutton')

    <div class="container mt-5">
        <div class="row mt5 m-2">
            @foreach ($post as $item => $value)
            <div class="card col-md-4 col-sm-12 m-2 mb-3 shadow-sm">
                <div class="card-body ">
                        @if ($value->user_id === auth()->user()->id)
                            <h5 class="card-title text-capitalize">{{ $value->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted border"><i class="fa-duotone fa-calendar-check"></i>
                                {{ $value->created_at }}</h6>
                            <p class="card-text border border-1 p-1">
                                {{ $value->description }}
                            </p>

                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="text-capitalize nav-item text-center btn-secondary  disabled "> Type :
                                    @foreach ($type as $ty)
                                        @if ($ty->id === $value->type_report_id)
                                            {{ $ty->type }}
                                        @endif
                                    @endforeach
                                </li>
                                <li class="text-capitalize nav-item text-center btn-secondary mt-2 mb-2 disabled "> Category :
                                    @foreach ($cate as $ca)
                                        @if ($ca->id === $value->category_id)
                                            {{ $ca->category }}
                                        @endif
                                    @endforeach
                                </li>
                                <li class="text-capitalize text-end"> <i class="fa-solid fa-link"></i> <a href="!#" onclick="openMyWindow('{{url($value->url)}}')"
                                        class="card-link badge bg-danger text-decoration-none text-wrap "> <i
                                            class="fa-solid fa-chart-simple"></i> view my report </a>

                                </li>

                            </ul>
                        @else
                        @endif

                </div>
            </div>
        @endforeach
    </div>

    </div>
@endsection
