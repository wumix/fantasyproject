<?php
//echo '<pre>'; print_r($gameslist);
//echo '<pre>'; print_r($player);die;
//dd($user_edit);
?>
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
                    <h3 class="box-title">Uer Edit</h3>
                    <div class="pull-right">
                        @if(!empty($user_edit['profile_pic']))
                        <img class="img-md" src="{{ getUploadsPath($user_edit['profile_pic']) }}" />
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    <div class="container-fluid">
                        {!! Form::open(['url' => route('postEditUser',['user_id'=>$user_edit['id']]),'files' => true]) !!}

                        <div class="form-group">
                            <label>User Name</label>

                            <input required class="form-control" name="name" value="{{$user_edit['name']}}" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>

                            <input required class="form-control" name="email" value="{{$user_edit['email']}}" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label>Phone no</label>

                            <input  class="form-control" name="phone_number" value="{{$user_edit['phone_number']}}" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <select name="user_type">
                                <option <?php echo ($user_edit['user_type'] == '1') ? 'selected' : '' ?> value="1">USER</option>
                                <option <?php echo ($user_edit['user_type'] == '0') ? 'selected' : '' ?> value="0">ADMIN</option>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label>User Status</label>
                            <select name="is_active">
                                <option <?php echo ($user_edit['is_active'] == '1') ? 'selected' : '' ?> value="1">Active</option>
                                <option <?php echo ($user_edit['is_active'] == '0') ? 'selected' : '' ?> value="0">In Active</option>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Refearal Key Name</label>

                            <input required class="form-control" name="ref_key" value="{{$user_edit['referral_key']}}" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            
                            <label>Profile Pic</label>

                            <input class="form-control" name="profile_pic" type="file" />
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

@section('js')
<script>

</script>
<script>

</script>


@stop