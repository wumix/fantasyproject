@extends('layouts.app')
{{--{{dd($user_teams)}}--}}
@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Welcome {{$userprofileinfo['name']}}
                    </h1>
                    <hr class="light full">
                    <div class="row page-content">

                        <div class="container-fluid">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-4" style="padding-top: 5%">
                                        <div class="text-center">
                                            <img height="200" width="200"
                                                 src="{{getUploadsPath($userprofileinfo['profile_pic'])}}"
                                                 class="img-circle profileimg " alt="Responsive image">
                                            <h3 class="nameu"></h3>
                                            <h5 class="nameu"><a href="{{route('userProfileEdit')}}">Edit Profile</a>
                                            </h5>
                                        </div>

                                    </div>

                                    <div class="col-md-5 pull-left"> <!--- new div -->

                                        <h3 class="slh text-center">Your Teams</h3>
                                        @if(empty($user_teams))
                                            <div class="alert alert-info">
                                                You don't have any team yet.
                                                <a href="{{route('addTeam', ['tournament_id'=>2])}}">Make your team
                                                    first.</a>
                                            </div>
                                        @else
                                            {!! Form::open(['url' => route('teamdetail'),'method'=>'get']) !!}
                                            <div class="form-group">
                                                <select id="team_id" style="width:100%;" name="team_id"
                                                        class="form-control dropdown-toggle col-md-12"
                                                        data-toggle="dropdown"
                                                        style="border:1px solid #9acc59; border-radius: 6px;">
                                                    @foreach($user_teams as $row)
                                                        <option id="dropdownbtn"
                                                                value="{{$row['id']}}">{{$row['name']}}</option>

                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group text-center">
                                                <button style="margin-top:10px;  " class="btn btn-success"
                                                        type="submit">
                                                    Go
                                                </button>
                                            </div>

                                            </form>

                                        @endif
                                        <div class="col-md-12" style="margin-top: 45px;">
                                            <div class="alert alert-info">
                                                Your result will be updated the date after you complete your team.
                                            </div>
                                        </div>


                                    </div> <!--new div-->
                                    <div class="col-md-3"  style="margin-top: 45px;">
                                        <h5 style="font-weight:600; padding: 10px;background: #449d44; color: #ffffff;">  Your IPL score : <span id="game_lame">Calculating Score</span></h5>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br><br><br>



@endsection
@section('js')
    <script>

        $(document).ready(function () {
            $("#team_id").each(function () {


                $("#game_lame").load("{{URL::to('/')}}" + "/user/team-detail?team_id=" + $(this).val() + " #total_team_score");
            });


        });

    </script>
@endsection