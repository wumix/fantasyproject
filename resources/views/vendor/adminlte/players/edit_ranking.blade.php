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
                    <h3 class="box-title">Ranking for -- {!! $ranking_cat_data['name'] !!}</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url'=>route('editPostRankingAdmin', ['ranking_id'=>$ranking['id']])]) !!}
                    <input type="hidden" name="ranking_category_id" value="{{$ranking_cat_data['id']}}" />
                    <div class="form-group">
                        <label>Player naem</label>
                        <input class="form-control" value="{{$ranking['player_name']}}" name="player_name" required />
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <select name="country_id" class="form-control" required>
                            <option value="">Select</option>
                            @foreach($countries as $key => $val)
                            <option value="{{$val['id']}}" {!! ($val['id'] == $ranking['country_id']) ? 'selected' : '' !!}>
                                {{$val['countryName']}} 
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="text" value="{{$ranking['rating']}}" name="rating" class="form-control" />
                    </div>
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