@extends('adminlte::layouts.app')

@section('htmlheader_title')
Ranking
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
                    {!! Form::open(['url'=>route('postEditMembership', ['plan_id'=>$membershipdetail['id']])]) !!}

                    <div class="form-group">
                        <label>Membership Name</label>
                        <input class="form-control" value="{{$membershipdetail['name']}}" name="name" required />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" value="{{$membershipdetail['price']}}" name="price" required />
                    </div>
                    <div class="form-group">
                        <label>select status</label>
                        <select required name="is_active" class="custom-select form-control">
                            <option>select value</option>
                            <option  <?php echo ($membershipdetail['is_active'] ==0) ? 'selected' : '' ?>   value="0">in active</option>
                            <option <?php echo ($membershipdetail['is_active'] ==1) ? 'selected' : '' ?> value="1">Active</option>
                        </select>
                    </div>
                    <?php $i=0;?>
                    @foreach($membershipdetail['membership_details'] as $detail)
                    <div class="form-group">
                        <label>{{$detail['feature']}}</label>
                        <input class="form-control" name="details[{{$i}}][value]" type="text" value="{{ucfirst(str_replace('_', ' ',$detail['value']))}}"/>

                        <input class="form-control" name="details[{{$i}}][feature]" type="hidden" value="{{ucfirst(str_replace('_', ' ',$detail['feature']))}}"/>

                    </div>
                        <?php $i++;?>
                    @endforeach

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save" />
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