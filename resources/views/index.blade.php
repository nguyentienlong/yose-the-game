@extends('layout.master')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Hello Yose
            </div>

            <div class="links">
                <a id="contact-me-link" href="{{ url('/minesweeper') }}">Minesweeper</a>
            </div>
        </div>
    </div>
@endsection
