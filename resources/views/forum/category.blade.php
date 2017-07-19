@extends('layouts.app')
@section('title')
    Challenge
@stop
@section('css')
    <style>
        .creat_topic_btn{
            width: 140px;
            display: inline-block;
            float: right;
            background: #8bc53f;
            color: #fff;
            padding: 12px 0;
            text-align: center;
            font-size: 13px;
            margin: 25px 39px 25px 0;
        }
        .area_creat_topic{
            background: #fff;
            box-shadow: 0px 0px 16px rgba(0,0,0,0.21);
        }
        .table tr th{
            color:#d3d3d3;
            font-size: 14px;
        }
        .table tr td{
            color:#000;
            font-size: 14px;
            border-bottom: 1px solid #d3d3d3;
            padding-bottom: 13px;
        }
        .table > thead > tr > th{
            border-bottom: 2px solid #f6980e;
        }
        .table > tbody > tr > td{
            padding: 28px 0px 13px 21px;
        }
        .circle_green {
            width:9px;
            height: 9px;
            border-radius:50%;
            background-color:#92b713;
            display: inline-block;
            margin-left: 25px;
            margin-right: 4px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 no-padding">
                <h1 class="page-heading">
                    Forums
                </h1>
                <hr class="light full">
            </div>

            <div class="col-md-12 no-padding area_creat_topic">
                <div class="col-md-12">
                    <a href="#" class="creat_topic_btn">Create Topic</a>
                </div>
                <!---Section-start-->
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Topics</th>
                                <th>Category</th>
                                <th>Users</th>
                                <th>Replies</th>
                                <th>Views</th>
                                <th>Activity</th>
                            </tr>
                            </thead>
                            <tbody style="padding:28px 0 13px 0;">
                            @foreach($categories as $cat)
                            <tr>
                                <td><strong>About the  category</strong></td>
                                <td><strong>Any</strong></td>
                                <td style="font-size:18px;color: #d3d3d3;"><i class="fa fa-user" aria-hidden="true"></i></td>
                                <td><strong>23</strong></td>
                                <td><strong>35</strong></td>
                                <td><strong>15m</strong></td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!---Section-End-->
            </div>
            <!--Section-new-start-->

            <!--Section-new-start-->
        </div>
    </div>

@endsection