@extends('layouts.app')

@section('title')
    Challenge
@stop
@section('css')
    <style>
        .creat_topic_btn {
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

        .area_creat_topic {
            background: #fff;
            box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.21);
        }

        .table tr th {
            color: #d3d3d3;
            font-size: 14px;
        }

        .table tr td {
            color: #000;
            font-size: 14px;
            border-bottom: 1px solid #d3d3d3;
            padding-bottom: 13px;
        }

        .table > thead > tr > th {
            border-bottom: 2px solid #f6980e;
        }

        .table > tbody > tr > td {
            padding: 28px 0px 13px 21px;
        }

        .circle_green {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background-color: #92b713;
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
                    Gamithon Forums
                </h1>
                <hr class="light full">
            </div>

            <div class="col-md-12 no-padding area_creat_topic">
                <div class="col-md-12">
                    <button href="#" data-toggle="modal"
                            data-target="#myModal" class="creat_topic_btn">Create Topic
                    </button>
                </div>
            {{--<button  type="button" id="1" data-id="{{$post['id']}}"  data-toggle="modal"--}}
            {{--data-target="#myModal" class="open-AddBookDialog">Reply</button>--}}
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
                            @foreach($categories['children'] as $cat)
                                <tr>
                                    <td><strong>
                                            <a href="{{route('categoryposts',['id'=>$cat['slug']])}}">{{$cat['name']}}</a></strong>
                                    </td>
                                    <td>{{$categories['name']}}</td>
                                    <td style="font-size:18px;color: #d3d3d3;"><i class="fa fa-user"
                                                                                  aria-hidden="true"></i></td>
                                    <td>23</td>
                                    <td>45</td>
                                    <td>5mem</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!---Section-End-->
            </div>
            <!-- Modal content-->
            <div id="myModal" class="modal fade in" role="dialog">
                <div class="modal-dialog">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-content">
                        <div style='background-color: #009900;' class="modal-header">
                            <h4 class='modal-title' style="color:#fff;">
                               Your Post
                            </h4>
                        </div>

                        <div class="modal-body">

                            {!! Form::open(['url' => route('subcat',['id'=>$categories['id']]),'method'=>'POST']) !!}
                            <div class="form-grop">
                                <label>
                                   Add post in  {{$categories['name']}}
                                </label>

                                {{--<select name="category_id">--}}
                                    {{--@foreach($categories['children'] as $cat)--}}
                                        {{--<option value="{{$cat['id']}}">{{$cat['name']}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            </div>
                            <input type="text" name="title">
                            <div class="form-group">

                                    <textarea name="post_text" id="post-data"
                                              style="height:200px;" class="form-control wysiwyg"></textarea>
                            </div>

                            <input type="hidden" id="post_id" name="post_id" value=""/>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end model content -->
    </div>
    </div>

@endsection
@section('js')
    {!! Html::script('js/tinymce/tinymce.min.js'); !!}
    {!! Html::script('js/tinymce.js');!!}
    @endsection