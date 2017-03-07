
@extends('layout.master')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    function getDecompostion(){
        $.ajax({url: "/primeFactors?number="+$('#number').val(), success: function(result){
                if( 'decomposition' in result){
                    decomposition = $('#number').val() +" = ";
                    for (var i = 0; i < result['decomposition'].length; i++) {
                        decomposition += result['decomposition'][i];
                        if (i != result['decomposition'].length-1) {
                            decomposition += ' x ';
                        }
                    }
                    $('#result').html(decomposition);
                }else if( 'error' in result){
                    $('#result').html( 'error:' + result['error'] );
                }else{
                    $('#result').html( 'unkown error' );
                }
            }
        });
    }
    </script>

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div id="title" class="title m-b-md">
                Prime Factors
            </div>
            <div id="invitation">
                Get the decompostion
            </div>
            <br />
            <form action="#" method="get">
                <input type="text" name="number" id="number">
                <button id="go" onclick="getDecompostion(); return false;">GO!</button>
            </form>
            <br />
            <br />
            <div id="result">
            </div>
        </div>
    </div>
@endsection