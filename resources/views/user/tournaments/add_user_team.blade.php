
@extends('layouts.app')
@section('title')
    Make team
    @stop
@section('meta-keywords')
    <meta name="description" content="Create an amazing fantasy cricket team with one of the 11 player configurations at Gamithon Fantasy and enjoy playing…">
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Make your team
                    </h1>
                    <hr class="light full">
                    <div class="page-content">
                        <div class=" col-md-6">
                            <img style="width: 200px;" src="{{getUploadsPath($tournament_detail['t_logo'])}}"
                                 class="img-thumbnail" alt="Responsive image"/>
                        </div>
                        <div class="col-md-6">
                            <h3>{{$tournament_detail['name']}}</h3>
                            <br>
                            <h4 class="tnt1">Tournament Cost:<span
                                        class="tnt2">{{$tournament_detail['tournament_price']}}</span></h4>
                            <br>
                            <h4 class="tnt1">Current Points:<span class="tnt2">{{getUserTotalScore(Auth::id(),$tournament_detail['id'])}}</span>
                            </h4>
                            <div class="col-md-5">
                                <form id="team_submit">
                                    <input type="text" id="team_name" class="fw form-control"
                                           placeholder="Enter Your Team Name">
                                    <button id="save_button" type="submit" class="btn btn-green btn-lg btn-block mt26">
                                        SAVE
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
    </section>


    <!------------>

    <!-- .....................TeamStart............................... -->
    <section class="team">
        <div class="countaner">
            <section>

            </section>
            <section>

            </section>
        </div>
        <!-- .....................Team End............................... -->
        <div class='error' style='display:none'></div>

    </section>



@endsection
@section('js')
    <script>
        $("#team_submit").submit(function (event) {

            event.preventDefault();

            var teamName = $("#team_name").val()
            var tournamentId = '{{$tournament_detail['id']}}';
            $.ajax({
                type: 'GET',
                url: '{{route('teamNamePostAjax')}}',
                data: {tournament_id: tournamentId, name: teamName},
                success: function (data) {
                    if (data.status == "ok") {
                        $("#team_name").attr('disabled', true);
                        $("#save_button").remove();
                        //$('.error').html('team added sucessfully');
                        //$('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                        $.toast({
                            heading: '&nbsp;',
                            text: 'Team added sucessfully!',
                            icon: 'success',
                            loader: true, // Change it to false to disable loader
                            position: 'top-right',
                            showHideTransition: 'slide',
                            hideAfter: 10000,
                            allowToastClose: true,
                            loaderBg: '#92B713'  // To change the background
                        });
                        window.location.reload();
                        $('<input type="hidden" id="team_id" value="' + data.team_id + '"/>').insertBefore("#addstatus");

                    }
                    else {
                        //$('.error').html(data.message);
                        //$('.error').fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
                        $.toast({
                            heading: 'Error',
                            text: data.message,
                            icon: 'error',
                            loader: true, // Change it to false to disable loader
                            position: 'top-right',
                            showHideTransition: 'slide',
                            hideAfter: 10000,
                            allowToastClose: true,
                            loaderBg: '#92B713'  // To change the background
                        });
                    }
                }
            });
        });
    </script>
@endsection