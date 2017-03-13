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
                    <h3 class="box-title">Add Game Roles</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        {!! Form::open(['url' => route('addGameRolePost')]) !!}
                        <div class="form-group">
                            <label>Game Name</label>
                            <input type="hidden" name="id" value=""/>
                            <input required class="form-control" name="gamename" value="" type="text" placeholder="" />
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
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection