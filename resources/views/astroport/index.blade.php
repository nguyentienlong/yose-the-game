@extends('layout.master')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                <div id="astroport-name" class="">
                    Theme Team
                </div>
            </div>

            <form action="/astroport" method="POST">
                {{ csrf_field() }}

                <label for="ship">Enter shipname:</label>
                <input type="text" name="shipName" class="form-control" id="ship"/>

                <button type="submit" id="dock">Dock</button>
            </form>

            <script>
                $('document').ready(function () {
                    $('body').on('keyup', '#ship', function() {
                        $('#info').addClass('hidden');
                    })
                });
            </script>

            <div class="links">
                <div id="gate-1" class="free {{ $data['occupied'] ? '' : 'occupied' }}">
                    <div id="ship-1">{{ isset($data['shipName']) ? $data['shipName'] : 'Ship 1' }}</div>
                </div>
                <div id="gate-2">
                    <div id="ship-2">Ship 2</div>
                </div>
                <div id="gate-3">
                    <div id="ship-3">Ship 3</div>
                </div>
            </div>

            <hr/>
            <h3>Info</h3>
            <div id="info" class="{{ $data['occupied'] ? '' : 'hidden' }} this-is-info">
                First ship is docked
            </div>
        </div>
    </div>
@endsection