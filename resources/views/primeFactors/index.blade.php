
@extends('layout.master')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div id="title" class="title m-b-md">
                Prime Factors
            </div>
            <div id="invitation">
                Get the decomposed
            </div>
            <br />
            <form action="/primeFactors" method="get">
                <input type="text" name="number" id="number">
                <button id="go">GO!</button>
            </form>
        </div>
    </div>
@endsection