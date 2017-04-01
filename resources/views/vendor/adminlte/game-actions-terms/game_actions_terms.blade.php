@extends('adminlte::layouts.app')

@section('htmlheader_title')
Games Actions
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Games Action Terms - <small>{{$game_terms['name']}}</small></h3>
                </div>
                <div class="box-body">
                    @include('adminlte::layouts.form_errors')
                    {!! Form::open(['url' => route('addGameTerm')]) !!}
                    <div class="form-group">
                        <label>Terms <small>(Catch, Out, Sixer etc)</small></label>
                        <input type="hidden" name="game_action_id" value="{{$game_action_id}}"/>
                        <input type="hidden" name="game_id" value="{{$game_terms['game_id']}}"/>
                        @foreach($game_terms['game_terms'] as $key => $val)
                        <div class="form-group" id="game-term-{{$val['id']}}">
                            <input disabled class="form-control" name="term_name[]" value="{{$val['name']}}" type="text" placeholder="" />
                            <a class="btn btn-danger" href="javascript:deleteTerm('{{$val['id']}}')" />Delete</a>
                        </div>
                        @endforeach
                        <input class="form-control" name="term_name[]" value="" type="text" placeholder="" />
                    </div>
                    <div class="form-group">
                        <button id="add_more_terms" name="add_more_terms" type="button" class="btn btn-success"> Add More </button>
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $("#add_more_terms").click(function (event) {
        event.preventDefault();
        $('<div class="form-group"><input class="form-control" name="term_name[]" value="" type="text" placeholder="" /></div>').insertBefore("#add_more_terms");
    });
    function deleteTerm(gameTermId) {
        var cnfrm = confirm('All scores with this term will remove!');
        if (cnfrm) {
            $.ajax({
                url: "{{route('deleteGameTerm')}}",
                type: 'DELETE',
                data: {
                    term_id: gameTermId
                },
                success: function (result) {
                    $("#game-term-" + gameTermId).fadeOut('slow', function () {
                        $(this).remove();
                    });
                }
            });
        }
    }
</script>
@stop