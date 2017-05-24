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
                    <h3 class="box-title">List of Players</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($ranking_cats as $key => $val)
                            <tr>
                                <td>
                                    {{$val['name']}}
                                </td>
                                <td>
                                    <a href="{{route('addRankingAdmin',  ['cat_id' => $val['id']])}}" class="btn btn-warning">
                                        Add player
                                    </a>
                                    <a href="{{route('playerRankingsAdmin',  ['cat_id' => $val['id']])}}" class="btn btn-warning">
                                        Players
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