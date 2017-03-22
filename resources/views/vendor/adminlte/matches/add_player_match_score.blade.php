@extends('adminlte::layouts.app')
<?php //debugArr($players);
?>
<?php // debugArr($game_terms); die;
?>
@section('htmlheader_title')
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div>
                <div class="box-body">

                    {!! Form::open(['url' => route('postAddMatchScore',['match_id'=>$match_id]),'files'=>true]) !!}

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">

                            @foreach($players as $row)
                            <tr>
                                <input type="text" name="player_game_term_counter[{{$row['id']}}][]" value="{{$row['id']}}" />
                                <div class="form-group">
                                    <label><strong>{{$row['name']}} has: </strong></label>
                                    <div class="pull-right">
                                        @if(!empty($row['profile_pic']))
                                        <img class="img-md" src="{{ getUploadsPath($row['profile_pic']) }}" />
                                        @endif
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                            <tr>
                                <div class="form-group">

                                    @foreach($game_terms['game_terms'] as $row)
                            <tr>
                                <div class="form-group">
                                    <label>{{$row['name']}}</label>
                                    <input type="text" name="player_game_term_counter[{{$row[id][]}}[]" value="" class="form-control"/>

                                </div>
                            </tr>

                            @endforeach
                    </div>
                    </tr>


                    </table>
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Add</button>
                </div>
                {!! Form::close() !!}

            </div>
            <!--/.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
</div>
@endsection
