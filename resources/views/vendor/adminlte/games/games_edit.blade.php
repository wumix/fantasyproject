<?php //dd($result);                                                                    ?>
@extends('adminlte::layouts.app')

@section('htmlheader_title')

@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Game <small>({{$result['name']}})</small></h3>
                </div>
                <div class="box-body">
                    <div class="container-fluid">
                        {!! Form::open(['url' => route('postEditGame')]) !!}
                        <div class="form-group">
                            <label>Game Name</label>
                            <input type="hidden" name="id" value="{{$result['id']}}"/>
                            <input required class="form-control" name="gamename" value="{{$result['name']}}" type="text" placeholder="{{$result['name']}}" />
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select required name="is_active" class="custom-select form-control">
                                <option value="">Select status</option>
                                <option value="1" {!! ($result['is_active'] == 1) ? 'selected':'' !!}>Active</option>
                                <option value="0" {!! ($result['is_active'] == 0) ? 'selected':'' !!}>Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="container-fluid">
                        {!! Form::open(['url' => route('addGameRole')]) !!}
                        <div class="form-group">
                            <label>Player Roles <small>(Batsman, goal keeper, wicket keeper etc)</small></label>
                            <input type="hidden" name="id" value="{{$result['id']}}"/>

                            @foreach($result['game_roles'] as $key => $val)
                            <div class="form-group" id='game-role-{{$val['id']}}'>
                                <input 
                                    disabled 
                                    class="form-control" 
                                    name="role_name[]" 
                                    value="{{$val['name']}}" 
                                    type="text" placeholder="" /> 
                                <a class="btn btn-danger" href="javascript:deleteRole('{{$val['id']}}')" />Delete</a>
                            </div>
                            @endforeach
                            <input class="form-control" name="role_name[]" value="" type="text" placeholder="" />
                        </div>

                        <div class="form-group">
                            <button id="add_more_roles" name="add_more_roles" type="button" class="btn btn-success"> Add More </button>
                            <button type="submit" class="btn btn-primary">
                                Add
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="container-fluid">
                        {!! Form::open(['url' => route('addGameActions')]) !!}
                        <div class="form-group">
                            <label>Actions <small>(Balling, Batting, Fielding etc)</small></label>
                            <input type="hidden" name="game_id" value="{{$result['id']}}"/>

                            @foreach($result['game_actions'] as $key => $val)
                            <div class="form-group" id="game-action-{{$val['id']}}">
                                <input disabled class="form-control" name="action_name[]" value="{{$val['name']}}" type="text" placeholder="Action Name" />
                                <a class="btn btn-danger" href="javascript:deleteAction('{{$val['id']}}')" />Delete</a>
                                <a href="{{route('addGameTermView', ['action_id'=>$val['id']])}}" class="btn pull-right btn-warning">
                                    Add/view terms of {{$val['name']}}
                                </a>
                            </div>
                            @endforeach
                            <input class="form-control" name="action_name[]" value="" type="text" placeholder="" />
                        </div>

                        <div class="form-group">
                            <button id="add_more_actions" name="add_more_actions" type="button" class="btn btn-success"> 
                                Add More 
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Add
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
<!--Add terms model-->
<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Add terms model-->
@endsection

@section('js')
<script>
    $("#add_more_roles").click(function (event) {
        event.preventDefault();

        $('<div class="form-group"><input class="form-control" name="role_name[]" value="" type="text" placeholder="" /></div>').insertBefore("#add_more_roles");
    });

    $("#add_more_actions").click(function (event) {
        event.preventDefault();
        $('<div class="form-group"><input class="form-control" name="action_name[]" value="" type="text" placeholder="" /></div>').insertBefore("#add_more_actions");
    });

    function deleteRole(roleId) {
        var cnfrm = confirm('All players with this role also lost there roles!');
        if (cnfrm) {
            $.ajax({
                url: "{{route('deleteGameRole')}}",
                type: 'DELETE',
                data: {
                    role_id: roleId
                },
                success: function (result) {
                    $("#game-role-" + roleId).fadeOut('slow', function () {
                        $(this).remove();
                    });
                }
            });
        }
    }


    function deleteAction(gameActionId) {
        var cnfrm = confirm('All scores with this term will remove!');
        if (cnfrm) {
            $.ajax({
                url: "{{route('deleteGameTerm')}}",
                type: 'DELETE',
                data: {
                    action_id: gameActionId
                },
                success: function (result) {
                    $("#game-action-" + gameActionId).fadeOut('slow', function () {
                        $(this).remove();
                    });
                }
            });
        }
    }
</script>
@stop