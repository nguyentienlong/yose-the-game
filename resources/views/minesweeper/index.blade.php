@extends('layout.master')

@section('title', 'Minesweeper')

@section('content')
    <style>
        #minesweeper-board .col-md-1 {
            border: 1px solid #c5c5c5;
            background-color: #ffe;
            width: 50px;
            height: 50px;
        }
    </style>
    <h3 id="title">Minesweeper</h3>
    <div class="flex-center position-ref full-height">
        <div class="clearfix"></div>
        <div class="content">
            <div id="minesweeper-board" class="">
                @for ($i = 1; $i <= 8; $i++)
                <div class="container" id="row-{{$i}}">
                    @for ($j = 1; $j <= 8; $j++)
                    <div class="col-md-1" id="cell-{{$i}}x{{$j}}"></div>
                    @endfor
                </div>
                @endfor
            </div>
        </div>
    </div>

    {{-- javascript --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection
