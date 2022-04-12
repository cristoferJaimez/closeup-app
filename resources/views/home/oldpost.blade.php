@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    @include('home.navbutton')

    <div class="container mt-5">
        <div class="row mt-5 m-2">
            <table class="table table-sm">
                <thead>
                    <th>Title</th>
                    <th>Date</th>
                </thead>
                <tbody>
                    @foreach ($post as $item => $value)
                        @if ($value->user_id === auth()->user()->id)
                            <tr>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->created_at }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="2" class="text-center"><i class="fa-duotone fa-face-grin-stars"></i></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
