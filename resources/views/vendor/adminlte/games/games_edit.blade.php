<?php //dd($result);     ?>
@extends('adminlte::layouts.app')

@section('htmlheader_title')
Games
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Game</h3>
                </div>
                <div class="box-body">
                    <div class="container-fluid">
                        {!! Form::open(['url' => route('postEditGame')]) !!}
                        <div class="form-group">
                            <label>Game Name</label>
                            <input type="hidden" name="id" value="{{$result['id']}}"/>
                            <input required class="form-control" name="gamename" value="" type="text" placeholder="{{$result['name']}}" />
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select required name="is_active" class="custom-select form-control">
                                <option value="">Select status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
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
                            <label>Roles</label>
                            <input type="hidden" name="id" value="{{$result['id']}}"/>
                            
                            @foreach($result['game_roles'] as $key => $val)
                            <input required class="form-control" name="role_name[]" value="{{$val['name']}}" type="text" placeholder="" />
                             
                            @endforeach
                            <input required class="form-control" name="role_name[]" value="" type="text" placeholder="" />
                        </div>
                        
                        <div class="form-group">
                            <button id="add_more_roles" name="add_more_roles" type="button" class="btn btn-success"> Add More </button>
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
@endsection

@section('js')
<script>
$( "#add_more_roles" ).click(function( event ) {
  event.preventDefault();
  
 $( '<input required class="form-control" name="role_name[]" value="" type="text" placeholder="" />' ).insertBefore( "#add_more_roles" );
});
</script>
@stop