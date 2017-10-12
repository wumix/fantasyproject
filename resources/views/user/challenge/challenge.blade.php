@extends('layouts.app')
@section('meta-keywords')
    <meta name="description" content="Gamithon fantasy where you have found the excitement of challenge other payers and compete with friends and other!...
">
@endsection
@section('title')
    Challenge
@stop
@section('content')
    @include('adminlte::layouts.form_errors')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-heading">
                    Challenge the Players
                </h1>
                <hr class="light full">
            </div>

            <!-- start popup -->
            <!-- Trigger the modal with a button -->
        {{--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>--}}

        <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        {!! Form::open(['url' => route('sendchallenge'),'method'=>'POST']) !!}

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Send Challenge</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <select class="form-control" required name="rewards">
                                    <option value="5000">5000</option>
                                    <option value="10000">10,000</option>
                                    <option value="15000">15,000</option>
                                    <option value="20000">20,000</option>
                                    <option value="25000">25,000</option>
                                </select>

                            </div>
                            <input type="hidden" id="user_2_id" name="user_2_id"/>
                            <input type="hidden" id="user_1_id" name="user_1_id" value="{{Auth::id()}}"/>
                            <div class="form-group">
                                <select class="form-control" id="tournament_id" required>
                                    <option selected value="select">Select Tournament</option>
                                    @foreach($tournament_list as $tournament)
                                        <option value="{{$tournament['id']}}">{{$tournament['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="matcheslist">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Challenge</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- end model content -->

                </div>
            </div>

            <!-- end popup -->

            <div class="col-md-12">
                <div class="challenge_section">
                    <form id="search-user-frm" method="get" action="{{route('challenges')}}"
                          class="form_area_challenge">
                        <label class="label_challnge_sec">

                            <div class="sectio_absolute">
                                <input type="text"
                                       name="searchParam"
                                       value="{{$searchParam}}"
                                       placeholder="Search player by email"
                                       class="input_challenge_field">
                                <button style="border: none; background: none" type="submit" class="serch_challenge">
                                    <img class="img-responsive "
                                         src={{URL::to('/img/search_challenge.png')}} alt=""/>
                                </button>
                            </div>
                            {{--<div class="sectio_absolute">--}}
                            {{--<input type="text" placeholder="Search player by email" class="input_challenge_field">--}}
                            {{--<a href="#" class="serch_challenge"><img class="img-responsive "--}}
                            {{--src={{URL::to('/img/search_challenge.png')}} alt=""/></a>--}}
                        </label>
                    </form>


                    <div id="user-container">
                        @if(count($users) > 0)
                            @foreach($users as $key=>$user)
                                <?php $key = $key + 1; ?>

                                <div class="col-md-4">
                                    <div class="col-md-6">
                                        <div class="cnter_liez_challenge">
                                            <img class="img-responsive "
                                                 src="{{getUploadsPath($user['profile_pic'])}}" alt=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                <span class="challnge_text">
                                   {{$user['name']}}
                                </span>
                                        <a href="javascript:openChallangeModel('{{$user['id']}}')"
                                           class="open-AddBookDialog">
                                            Challenge Me
                                        </a>
                                    </div>
                                </div>


                                @if($key%3 == 0)
                                    <div class="border_arrea"></div>
                                @endif
                            @endforeach
                            <div class="container text-center">
                                {{$users->appends(request()->input())->links()}}
                            </div>
                        @else
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                @include('layouts.invite_sec')
                            </div>
                            <div class="col-md-4">
                            </div>
                        @endif
                    </div>
                    <div class="clear clearfix"></div>
                </div>
            </div>
        </div>
    </div>


    <div id="challange-player-users-template" style="display: none;">
        <div class="col-md-4">
            <div class="col-md-6">
                <div class="cnter_liez_challenge">
                    <img class="img-responsive "
                         src="js_userProfilePic" alt=""/>
                </div>

            </div>
            <div class="col-md-6">
                <span class="challnge_text">
                   js_userName
                </span>
                <a href="javascript:openChallangeModel('js_userId')"
                   class="open-AddBookDialog">
                    Challenge Me
                </a>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#tournament_id').on('change', function () {
            $.ajax({
                type: 'GET',
                url: '{{route('tournamentmatches')}}',
                data: {
                    tournament_id: $(this).val()
                },
                success: function (data) {
                    var $el = $("#matcheslist");

                    var ddCity = '<div class="table-responsive">';
                    ddCity += '<table class="table table-responsive table-hover">';
                    $.each(data, function (k, v) {

                        ddCity += '<tr >';
                        ddCity += '<td><input required name="match_id" value="' + v.id + '" type="radio"/></td>';
                        ddCity += '<td>'
                        // ddCity += v.team_one + ' VS ' + v.team_two+v.name;
                        ddCity += v.name;
                        ddCity += '</td></tr>';

                    });
                    ddCity += '</table> </div>';
                    $el.html(ddCity);

                }
            });
        });
        function getUsers(searchParam) {
            /*
             $.ajax({
             type: 'POST',
             url: '{{route('searchUserParams')}}',
             data: {
             searchParam: searchParam
             },
             success: function (data) {
             var playerHtml = $("#challange-player-users-template").html();
             $.each(function (k, v) {
             playerHtml += playerHtml.replaceAll('js_userProfilePic', v.profile_pic);
             });

             }
             });
             */
        }

        function openChallangeModel(userId) {
            $('#myModal').modal('show');
            $(".modal-body #user_2_id").val(userId);
        }
    </script>
@stop