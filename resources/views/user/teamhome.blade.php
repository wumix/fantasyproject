@extends('layouts.app')
{{--{{dd($user_teams)}}--}}
@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Your Teams
                    </h1>

                    <div class="row page-content">

                        <div class="container-fluid">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Team Name</h4>
                                    </div>
                                    <div class="col-md-4 ">
                                        <h4>Tournament Name</h4>
                                    </div>
                                </div>
                                <hr class="light full">
                                @foreach($user_teams as $teams)
                                    <div class="row">
                                        <div class="col-md-4 offset2">
                                            <a href="{{route('teamdetail',['team_id'=>$teams['id']])}}"> {{$teams['name']}}</a>
                                        </div>
                                        <div class="col-md-6" style="height: 250px">
                                            {{$teams['teamtournament']['name']}}
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- ............................Show Hide Table Satrt........................... -->
    {{--<section class="no-padding">--}}
    {{--<div class="container">--}}
    {{--@if(!empty($user_teams))--}}
    {{--<div class="">--}}
    {{--<h3 class="ah3">COMPLETED MATCHES</h3>--}}
    {{--<div class="text-center col-md-10 col-md-offset-1">--}}
    {{--<div class="accordian-table-header">--}}
    {{--<ul class="match-accordian-header row">--}}
    {{--<li class="col-md-3">Match</li>--}}

    {{--<li class="col-md-4"></li>--}}
    {{--<li class="col-md-4">Total Points:10000</li>--}}
    {{--<li class="col-md-1"><span class="btn-toggle">+</span></li>--}}
    {{--</ul>--}}
    {{--</div>--}}

    {{--<div class="tabletydashboard table-responsive">--}}
    {{--<div class="col-md-10 col-md-offset-1">--}}


    {{--<div class="panel with-nav-tabs" style="background-color: transparent;">--}}
    {{--<div class="panel-heading">--}}
    {{--<ul class="nav nav-tabs">--}}
    {{--<li id="tbbox" class="active"><a id="tabt" href="#tab1default"--}}
    {{--data-toggle="tab">Batsmen</a></li>--}}
    {{--<li id="tbbox"><a id="tabt" href="#tab2default"--}}
    {{--data-toggle="tab">Bowlers</a></li>--}}
    {{--<li id="tbbox"><a id="tabt" href="#tab3default"--}}
    {{--data-toggle="tab">Allrounder </a></li>--}}
    {{--<li id="tbbox"><a id="tabt" href="#tab4default" data-toggle="tab">Wicketkeeper</a>--}}
    {{--</li>--}}

    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="panel-body" style="margin-top: 0px;">--}}

    {{--<div class="tab-content">--}}
    {{--<div class="tab-pane fade in active " id="tab1default">--}}
    {{--<div class="col-md-11 table-responsive">--}}
    {{--<table class="table ">--}}
    {{--<thead class="">--}}
    {{--<tr>--}}
    {{--<th class=" th1">PLAYERS</th>--}}
    {{--<th class="point">RUNS</th>--}}
    {{--<th class="point">S.R</th>--}}
    {{--<th class="add">POINTS</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody class="main-taible-body">--}}
    {{--<tr class="cwt">--}}
    {{--<td class=" th11"><img id="myteamtimg" class="img-circle"--}}
    {{--src="psl-images/aa.jpeg"> Cris Gayle--}}
    {{--</td>--}}

    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" add"><p class="myteamtt">40000</p></td>--}}

    {{--</tr>--}}

    {{--<tr class="cwt">--}}
    {{--<td class=" th11"><img id="myteamtimg" class="img-circle"--}}
    {{--src="psl-images/aa.jpeg"> Cris Gayle--}}
    {{--</td>--}}

    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" add"><p class="myteamtt">40000</p></td>--}}

    {{--</tr>--}}
    {{--<tr class="cwt">--}}
    {{--<td class=" th11"><img id="myteamtimg" class="img-circle"--}}
    {{--src="psl-images/aa.jpeg"> Cris Gayle--}}
    {{--</td>--}}

    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" add"><p class="myteamtt">40000</p></td>--}}

    {{--</tr>--}}

    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="tab-pane fade" id="tab2default">--}}
    {{--<div class="col-md-11 table-responsive">--}}
    {{--<table class="table ">--}}
    {{--<thead class="">--}}
    {{--<tr>--}}
    {{--<th class=" th1">PLAYERS</th>--}}
    {{--<th class="point">RUNS</th>--}}
    {{--<th class="point">S.R</th>--}}
    {{--<th class="add">POINTS</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody class="main-taible-body">--}}
    {{--<tr class="cwt">--}}
    {{--<td class=" th11"><img id="myteamtimg" class="img-circle"--}}
    {{--src="psl-images/aa.jpeg"> Cris Gayle--}}
    {{--</td>--}}

    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" add"><p class="myteamtt">40000</p></td>--}}

    {{--</tr>--}}

    {{--<tr class="cwt">--}}
    {{--<td class=" th11"><img id="myteamtimg" class="img-circle"--}}
    {{--src="psl-images/aa.jpeg"> Cris Gayle--}}
    {{--</td>--}}

    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" add"><p class="myteamtt">40000</p></td>--}}

    {{--</tr>--}}
    {{--<tr class="cwt">--}}
    {{--<td class=" th11"><img id="myteamtimg" class="img-circle"--}}
    {{--src="psl-images/aa.jpeg"> Cris Gayle--}}
    {{--</td>--}}

    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" point"><p class="myteamtt">40000</p></td>--}}
    {{--<td class=" add"><p class="myteamtt">40000</p></td>--}}

    {{--</tr>--}}

    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="col-md-11 tcen "></div>--}}

    {{--</div>--}}
    {{--</div>--}}


    {{--</div>--}}

    {{--</div>--}}


    {{--<div class="accordian-table-header">--}}
    {{--<ul class="match-accordian-header row">--}}
    {{--<li class="col-md-3">Match</li>--}}

    {{--<li class="col-md-4"></li>--}}
    {{--<li class="col-md-4">Total Points:10000</li>--}}
    {{--<li class="col-md-1"><span class="btn-toggle">+</span></li>--}}
    {{--</ul>--}}

    {{--</div>--}}
    {{--<div class="accordian-table-header " id="matr">--}}
    {{--<ul class="match-accordian-header row">--}}
    {{--<li class="col-md-3">Match</li>--}}

    {{--<li class="col-md-4"></li>--}}
    {{--<li class="col-md-4">Total Points:10000</li>--}}
    {{--<li class="col-md-1"><span class="btn-toggle">+</span></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="tabletyg"></div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</section>--}}

    <!-- ............................Show Hide Table End........................... -->



<br><br><br><br>

@endsection