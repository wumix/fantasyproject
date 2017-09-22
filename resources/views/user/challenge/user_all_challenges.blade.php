
@extends('layouts.app')
@section('title')
Create Team
@stop
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-heading">
                   Challenges
                </h1>
                <hr class="light full">
                <div class="page-content" style="margin-bottom: 80px;">


                    <!-- your content -->
                    Challenges  sent
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped ">
                            <thead class="main-taible-head">
                            <tr>

                                <th class="border-r">Match</th>
                                {{--<th class="border-r">Points Required To Play</th>--}}
                                <th class="th2">Rewards</th>
                                <th class="th2">To</th>
                                <th class="th2">Status</th>
                                <th class="th2">Team Status</th>
                            </tr>
                            </thead>
                            <tbody id="selected-player" class="main-taible-body">
                            @foreach($sent_challenges as $row)

                            <tr>
                                <td class="border-r1" style="min-width: 305px;">
                                    {{--<img id="myteamtimg" class="img-circle img-thumbnail" style="width: 100px;"--}}
                                             {{--src="{{getUploadsPath($row['t_logo'])}}"/>--}}
                                    <h5></h5>
                                </td>
                                <td>
                                    {{$row['rewards']}}
                                </td>
                                <td class="border-r1">

                                    {{$row['user_by']['name']}}

                                </td>
                                {{--<td class="border-r1">--}}
                                    {{--<p class="myteamtt"--}}
                                           {{--style="padding-top:34px;">{{$row['tournament_price']}}</p></td>--}}
                                <td class="border-r1">
                                    @if($row['status']==0)
                                        Not accpeted
                                    @endif
                                    @if($row['status']==1)
                                        In Progress
                                    @endif
                                    @if($row['status']==2)
                                        Rejected
                                    @endif

                                </td>
                                <td>
                                    @if(!challengeTeamCompleteInChallenge(\Auth::id(),$row['id']))
                                        <a class="btn btn-danger" href="{{route('addChallengeTeam',[
                                                        'match_id'=>$row['match_id'],'challenge_id'=>$row['id']])}}">Complete Team</a>

                                    @else
                                        Team Complete
                                    @endif
                                </td>


                                @endforeach
                            </tbody>
                        </table>


                    </div>
                    <!-- your content -->
Challenges Revieced
                    <!-- your content -->

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped ">
                            <thead class="main-taible-head">
                            <tr>

                                <th class="border-r">Match</th>
                                {{--<th class="border-r">Points Required To Play</th>--}}
                                <th class="th2">Rewards</th>
                                <th class="th2">BY</th>
                                <th class="th2">Status</th>
                                <th class="th2">Team Status</th>
                                <th class="th2">Tour Score</th>
                                <th class="th2">Opponent Score</th>
                            </tr>
                            </thead>
                            <tbody id="selected-player" class="main-taible-body">
                            @foreach($accepted_challenges[0]['challenges'] as $row)

                                <tr>
                                    <td class="border-r1" style="min-width: 305px;">
                                        {{--<img id="myteamtimg" class="img-circle img-thumbnail" style="width: 100px;"--}}
                                        {{--src="{{getUploadsPath($row['t_logo'])}}"/>--}}
                                        <h5></h5>
                                    </td>
                                    <td>
                                        {{$row['rewards']}}
                                    </td>
                                    <td class="border-r1">

                                        {{$row['user']['name']}}

                                    </td>
                                    {{--<td class="border-r1">--}}
                                    {{--<p class="myteamtt"--}}
                                    {{--style="padding-top:34px;">{{$row['tournament_price']}}</p></td>--}}
                                    <td class="border-r1">
                                        @if($row['status']==0)
                                            Not accpeted
                                        @endif
                                        @if($row['status']==1)
                                            In Progress
                                        @endif
                                        @if($row['status']==2)
                                            Rejected
                                        @endif

                                    </td>
                                    <td>
                                        @if(!challengeTeamCompleteInChallenge(\Auth::id(),$row['id']))
                                            <a class="btn btn-danger" href="{{route('addChallengeTeam',[
                                                        'match_id'=>$row['match_id'],'challenge_id'=>$row['id']])}}">Complete Team</a>

                                        @else
                                            Team Complete
                                        @endif
                                    </td>
                                <td>
                                    {{userScoreInChallenge($row['user_1_id'],$row['id'])}}
                                </td>
                                <td>
                                    {{userScoreInChallenge($row['user_2_id'],$row['id'])}}
                                </td>



                            @endforeach
                            </tbody>
                        </table>


                    </div>
                    <!-- your content -->


                    <div class="table-responsive">

                        <table class="table table-bordered table-striped ">
                            <thead class="main-taible-head">
                            <tr>

                                <th class="border-r">Match</th>
                                {{--<th class="border-r">Points Required To Play</th>--}}
                                <th class="th2">Rewards</th>
                                <th class="th2">BY</th>
                                <th class="th2">Status</th>
                                <th class="th2">Team Status</th>
                            </tr>
                            </thead>
                            <tbody id="selected-player" class="main-taible-body">
                            @foreach($challenges[0]['challenges'] as $row)

                                <tr>
                                    <td class="border-r1" style="min-width: 305px;">
                                        {{--<img id="myteamtimg" class="img-circle img-thumbnail" style="width: 100px;"--}}
                                        {{--src="{{getUploadsPath($row['t_logo'])}}"/>--}}
                                        <h5></h5>
                                    </td>
                                    <td>
                                        {{$row['rewards']}}
                                    </td>
                                    <td class="border-r1">

                                        {{$row['user']['name']}}

                                    </td>
                                    {{--<td class="border-r1">--}}
                                    {{--<p class="myteamtt"--}}
                                    {{--style="padding-top:34px;">{{$row['tournament_price']}}</p></td>--}}
                                    <td class="border-r1">
                                        @if($row['status']==0)
                                            Not accpeted
                                        @endif
                                        @if($row['status']==1)
                                            In Progress
                                        @endif
                                        @if($row['status']==2)
                                            Rejected
                                        @endif

                                    </td>



                            @endforeach
                            </tbody>
                        </table>


                    </div>


                </div>
            </div>
        </div>
    </div>
    <br> <br> <br> <br> <br> <br> <br><br> <br> <br><br> <br><br> <br>
</section>
@endsection
