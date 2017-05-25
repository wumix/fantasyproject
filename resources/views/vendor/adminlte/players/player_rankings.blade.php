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
                    <h3 class="box-title">Rankings for -- {!! $ranking_cat_data['name'] !!}</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Rating</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($players as $key => $val)
                            <tr>
                                <td>
                                    {{$val['player_name']}}
                                </td>
                                <td>
                                    {{$val['country']['countryName']}}
                                </td>
                                <td>
                                    {{$val['rating']}}
                                </td>
                                <td>
                                    <a href="{{route('editRankingAdmin',  ['ranking_id' => $val['id']])}}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a onclick="return confirm('You sure?')" href="{{route('deleteRanking',  ['cat_id' => $val['id']])}}" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection