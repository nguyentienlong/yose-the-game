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
    <h3 id="title" style="text-align:center;">Minesweeper</h3>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div id="minesweeper-board" class="">
                @for ($row = 0; $row < count($mineMatrix); $row++)
               <div class="container" id="row-{{ $row+1 }}">
                   @for ($col = 0; $col < count($mineMatrix[$row]); $col++)
                   <div class="col-md-1 mine" id="cell-{{ $row + 1 }}x{{ $col + 1 }}"
                       data-id = "[{{ $row }}][{{ $col }}]"
                       data-value="{{ $mineMatrix[$row][$col] }}"></div>
                   @endfor
               </div>
               @endfor
            </div>

            <div><a href="https://github.com/nguyentienlong/yose-the-game">github code</a></div>
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

    <script>
        var mineMatrix = [];

        $(document).on('click', '.mine' , function () {
            var item = $(this).attr('data-value');

            if (item == '1') {
                $(this).addClass('lost');
                $(this).css('background-color', 'red');
            } else {
                $(this).addClass('safe');

                count = checkBombAround(this);

                $(this).text(count);
            }
        })

        function load() {
            $.ajax({
                method: 'GET',
                url: "{{ url('/minesweeper/load') }}"
            }).done(function(response) {
                fillMineMatrix(response);
            })
        }

        function checkBombAround (cell) {
            var id = $(cell).attr('id').replace('cell-','');
            var row = parseInt(id.substr(0,1)) - 1;
            var col = parseInt(id.substr(2,1)) - 1;

            var count = 0;

            console.log(col);

            for (i=-1; i <= 1; i++) {
                for (j=-1; j <= 1; j++) {
                    if ( row+i >= 0 && row+i < 8 && col+j >=0 && col+j < 8 && this.mineMatrix[row+i][col+j] == 1) {
                        count++;
                    }
                }
            }

            return count;
        }

        function fillMineMatrix (response) {
            this.mineMatrix = response;

            var html = '';

            for (var row = 0; row < response.length; row++) {
                html += '<div id="row-'+ (row+1)  +'">';
                for (var col = 0; col < response[row].length; col++) {
                    html += '<div class="col-md-1 mine" id="cell-'+ (row + 1) + 'x' + (col + 1) + '"' +
                        'data-value="' + response[row][col] +'"></div>';
                }
                html += '</div>';
            }

            $('#minesweeper-board').html(html);
        }

        $(document).ready(function() {
            load();
        });


    </script>
@endsection
