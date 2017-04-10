@extends('layouts.app')
{{--{{dd($user_teams)}}--}}
@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Dashboard
                    </h1>
                    <hr class="light full">
                    <div class="row page-content">

                        <div class="container-fluid">
                            <div class="container">
                                <div class="row">
                                    <div class="text-center col-md-2 col-md-offset-5">
                                        <img height="200" width="200"
                                             src="{{getUploadsPath($userprofileinfo['profile_pic'])}}"
                                             class="img-circle profileimg " alt="Responsive image">
                                        <h3 class="nameu">{{$userprofileinfo['name']}}</h3>
                                        <h5 class="nameu"><a href="{{route('userProfileEdit')}}">Edit Profile</a></h5>
                                    </div>
                                    <div class="text-center col-md-6 col-md-offset-3">

                                        <h3 class="slh">Your Teams</h3>
                                        @if(empty($user_teams))
                                            <div class="alert alert-info">
                                                You don't have any team yet.
                                                <a href="{{route('addTeam', ['tournament_id'=>1])}}">Make your team
                                                    first.</a>
                                            </div>
                                        @else
                                            {!! Form::open(['url' => route('teamdetail'),'files'=>true]) !!}
                                            <div class="form-group">
                                                <select name="team_id" class="btn dropdown-toggle col-md-10 col-md-offset-1"
                                                        data-toggle="dropdown"
                                                        style="border:1px solid #9acc59; border-radius: 6px;">
                                                    @foreach($user_teams as $row)
                                                        <option id="dropdownbtn" value="{{$row['id']}}">{{$row['name']}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input value="submit" type="submit">

                                            </div>

                                            </form>

                                        @endif
                                        <div class="col-md-12" style="margin-top: 45px;">
                                            <div class="alert alert-info">
                                                Your result will be updated after 1st match.
                                            </div>
                                        </div>

                                    </div>
                                </div>
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





@endsection