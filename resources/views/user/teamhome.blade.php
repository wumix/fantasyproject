@extends('layouts.app')
{{--{{dd($rankings)}}--}}
@section('title')
    ICC Player Rankings
@stop
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        ICC Player Rankings
                    </h1>
                    <hr class="light full">

                    <div class="col-md-12">


                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-stripedhome-1 gen-table">
                                    <thead class="main-taible-head">

                                    <tr>

                                        <th class="border-r th11">Team Name</th>
                                        <th class="border-r th11">Tournament Name</th>

                                    </tr>
                                    </thead>
                                    <tbody class="main-taible-body">
                                    @foreach($user_teams as $team)

                                        <tr class="trr">

                                            <td class="border-r">
                                                <a href="{{route('teamdetail',['team_id'=>$team['id']])}}">

                                                {{$team['name']}}
                                                </a>

                                            </td>

                                            <td class="border-r">{{$team['teamtournament']['name']}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>


                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>



    </section>

@stop