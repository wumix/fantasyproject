@extends('adminlte::layouts.app')

@section('htmlheader_title')
Term points
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Games Action Terms Points - <small>{{$tournament['name']}}</small>
                    </h3>
                </div>
                <div class="box-body">
                    @include('adminlte::layouts.form_errors')
                    <div id="exTab3" class="container">	
                        <ul  class="nav nav-pills">
                            @foreach($game_actions as $key => $val)
                            <li class="{!! ($key == 0) ? 'active':'' !!}">
                                <a  href="#action-{{$val['id']}}" data-toggle="tab">
                                    {{$val['name']}}
                                </a>
                            </li>
                            @endforeach
                        </ul>

                        <div class="tab-content clearfix">
                            @foreach($game_actions as $key => $val)
                            <div class="tab-pane {!! ($key == 0) ? 'active':'' !!}" id="action-{{$val['id']}}">
                                <h4>{{$val['name']}}</h4>
                                {!! Form::open(['url' => route('updateTermPoints'),'class'=>'form-inline','id'=>'term-'.$val['id'].'-form']) !!}
                                <input type="hidden" name="game_id" value="{{$tournament['game_id']}}" />
                                <input type="hidden" name="tournament_id" value="{{$tournament['id']}}" />
                                @foreach($val['game_terms'] as $key => $val)
                                <?php
                                $termFromToPoints = tapArray($tournament['game_term_points'], ['game_term_id' => $val['id']], false);
                                //debugArr($termFromToPoints);
                                ?>
                                @php($fromToCounter = 0)
                                <h4>{{$val['name']}}</h4>
                                <div id="term-{{$val['id']}}-container">
                                    @foreach($termFromToPoints as $termPointIndex => $termPointVal)
                                    <div id="from-to-row-{{$termPointVal['id']}}">
                                        <div class="form-group">
                                            <label>From: </label>
                                            <input value="{{$termPointVal['qty_from']}}" name="term_score_range[{{$val['id']}}][{{$fromToCounter}}][qty_from]" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>To: </label>
                                            <input value="{{$termPointVal['qty_to']}}" name="term_score_range[{{$val['id']}}][{{$fromToCounter}}][qty_to]" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Score: </label>
                                            <input value="{{$termPointVal['points']}}" name="term_score_range[{{$val['id']}}][{{$fromToCounter}}][points]" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <a href="javascript:deleteScore('{{$termPointVal['id']}}');" class="btn btn-danger">
                                                Delete score
                                            </a>
                                        </div>
                                        <div class="clear clearfix separator" style="margin: 10px 0;"></div>
                                    </div>
                                    @php($fromToCounter++)
                                    @endforeach
                                    <!--Input already field-->
                                    <div class="form-group">
                                        <label>From: </label>
                                        <input value="" name="term_score_range[{{$val['id']}}][{{count($termFromToPoints)+1}}][qty_from]" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>To: </label>
                                        <input value="" name="term_score_range[{{$val['id']}}][{{count($termFromToPoints)+1}}][qty_to]" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Score: </label>
                                        <input value="" name="term_score_range[{{$val['id']}}][{{count($termFromToPoints)+1}}][points]" class="form-control" />
                                    </div>
                                    <div class="clear clearfix separator" style="margin: 10px 0;"></div>
                                    <!--End Input already field-->
                                </div>
                                <div class="form-group">
                                    <a href="javascript:addMoreFromTo('{{$val['id']}}');" class="btn btn-success">
                                        Add more
                                    </a>
                                </div>
                                <div class="clear clearfix separator"></div>
                                @endforeach  
                                <div class="form-group">
                                    <input type="submit" class="btn btn-default" value="Save terms for {{$val['name']}}" />
                                </div>
                                {!! Form::close() !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
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
    var fieldsCounter = parseInt('{{count($termFromToPoints)+1}}');
    function addMoreFromTo(termId) {
        fieldsCounter++;
        var fromToContainer = $('#term-' + termId + '-container');
        var fromFieldName = 'term_score_range[' + termId + '][' + fieldsCounter + '][qty_from]';
        var toFieldName = 'term_score_range[' + termId + '][' + fieldsCounter + '][qty_to]';
        var scoreFieldName = 'term_score_range[' + termId + '][' + fieldsCounter + '][points]';
        var fromToHtml = '<div class="clear clearfix separator" style="margin: 10px 0;"></div><div class="form-group">';
        fromToHtml += '<label>From: </label>';
        fromToHtml += '<input name="' + fromFieldName + '" class="form-control" value="" />';
        fromToHtml += '</div>';
        //To
        fromToHtml += '<div class="form-group">';
        fromToHtml += '<label>To: </label>';
        fromToHtml += '<input name="' + toFieldName + '" class="form-control" value="" />';
        fromToHtml += '</div>';
        //score
        fromToHtml += '<div class="form-group">';
        fromToHtml += '<label>score: </label>';
        fromToHtml += '<input name="' + scoreFieldName + '" class="form-control" value="" />';
        fromToHtml += '</div>';
        fromToContainer.append(fromToHtml);
    }

    function deleteScore(termPointId) {
        var cnfrm = confirm('Sure you want to delete this point?');
        if (cnfrm) {
            $.ajax({
                url: "{{route('deleteGameTermPoint')}}",
                type: 'DELETE',
                data: {
                    termPointId: termPointId,
                    tournament_id: '{{$tournament['id']}}'
                },
                success: function (result) {
                    $("#from-to-row-" + termPointId).fadeOut('slow', function () {
                        $(this).remove();
                    });
                }
            });
        }
    }
</script>
@stop