@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    @include('home.navbutton')

    <div class="container mt-5">
        <div class="row mt5 m-2">
            <div class="card">
                <div class="card-body">
                    @foreach ($post as $item => $value)
                        @if ($value->user_id === auth()->user()->id)
                            <h5 class="card-title text-capitalize">{{ $value->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted"><i class="fa-duotone fa-calendar-check"></i>
                                {{ $value->created_at }}</h6>
                            <p class="card-text">
                                {{ $value->description }}
                            </p>

                            <ul>
                                <li>{{ $value->type_report_id }}</li>
                                <li>{{ $value->category_id }}</li>
                                <li> <i class="fa-solid fa-link"></i> <a href="{{ url($value->url) }}" target="blank_"
                                        class="card-link badge bg-danger text-decoration-none text-wrap "> <i
                                            class="fa-solid fa-chart-simple"></i>  view my report </a>
                                  
                                </li>
                            </ul>
                        @else
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
