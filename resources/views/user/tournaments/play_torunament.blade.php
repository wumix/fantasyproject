@php
    // dd(Auth::id());
         //dd($tournament_detail);

@endphp
@extends('layouts.app')

@section('content')
    <!-- ............................Tournament  Start.................................. -->
    <div>
        <section>
            <div class="container mrg">

                <div class='row'>
                    <div class='col-md-12'>
                        <div class="carousel slide media-carousel" id="media">
                            <div class="carousel-inner">
                                <div class="item  active">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>

                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>

                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="img-rounded" href="#"><img alt=""
                                                                                 src="http://placehold.it/150x150"></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                            <a data-slide="next" href="#media" class="right carousel-control">›</a>
                        </div>
                    </div>
                </div>

                <hr class="hrt">

            </div>
        </section>

        <!-- ............................Tournament  End.................................. -->
        <!-- .........................................Google Add Start........................ -->
        <section class="tgoo">
            <div class="container-fluid" id="googlec">
                <div class="container" id="googlel">
                    <h1>GOOGLE ADD</h1>
                </div>
            </div>
        </section>
        <!-- ......................................Google Add End................................. -->
        <!-- ..............................Table Start................................... -->
        <section>
            <div class="container-fluid ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8" id="ah31">
                            <h3 class="ah3" id="ah31">{{$tournament_detail['name']}}</h3>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-8" id="ah31">
                            <form id="team_submit">
                                <div class="form-gorup">
                                    <input type="text" id="team_name"/>
                                    <button>Add</button>
                                </div>
                            </form>
                            <div class="row">
                                <div id="addstatus"></div>

                            </div>
                        </div>
                    </div>

                    <table class="table table-striped" id="tortable">
                        <thead class="main-taible-head">
                        <tr>
                            <th class="border-r th1">PLAYERS
                                ROLES
                                POINTS TO BUY
                            </th>
                            <th class="border-r">PLAYERS
                                ROLES
                                POINTS TO BUY
                            </th>

                            <th class="th2">PLAYERS
                                ROLES
                                POINTS TO BUY
                            </th>
                            <th class="th2">Action
                            </th>
                        </tr>
                        </thead>
                        <tbody class="main-taible-body">

                        @foreach($tournament_detail['tournament_players'] as $player)
                            <tr class="cwt">
                                <td class="border-r"><img id="timg" class="img-circle"
                                                          src="{{ getUploadsPath($player['profile_pic']) }}"> {{$player['name']}}
                                </td>
                                <td class="border-r">Batsman</td>
                                <td class="brr">{{$player['pivot']['player_price']}}</td>
                                <td>
                                    <a id="btn-player-{{$player['id']}}"
                                       href="javascript:addplayertoteam('{{$player['id']}}','{{$tournament_detail['id']}}')"
                                       class="btn btn-sucess">Add Player</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- ...............Table End.............................. -->
        <!-- ............................Show Hide Table Satrt........................... -->
        <section>
            <div class="container">
                <h3 class="ah3">COMPLETED MATCHES</h3>
                <div class="text-center col-md-10 col-md-offset-1 mrgg">
                    <div class="accordian-table-header">
                        <ul class="match-accordian-header row">
                            <li class="col-md-3">Match</li>
                            <li class="col-md-3">Mumbai</li>
                            <li class="col-md-3">1 april</li>
                            <li class="col-md-2">3pm</li>
                            <li class="col-md-1"><span class="btn-toggle">+</span></li>
                        </ul>
                    </div>
                    <div class=" col-md-11  mrgg">
                        <div class="col-md-3 ftp">PLAYERS</div>
                        <div class="col-md-3 ftp">ROLE</div>
                        <div class="col-md-5 ftp">TOTAL POINTS IN THIS TOURNAMENT</div>
                    </div>
                    <div class=" col-md-11  mrgg11">
                        <div class="col-md-3 ftp1"><img id="timg" class="img-circle" src="psl-images/aa.jpeg"> Cris
                            Gayle
                        </div>
                        <div class="col-md-3 ftp11">Batsman</div>
                        <div class="col-md-5 ftp11">40000</div>
                        <div class="col-md-1 ftp11"><span class="btn-toggle">+</span></div>
                    </div>
                    <div class=" col-md-11  mrgg1">
                        <div class="col-md-3 ftp1"><img id="timg" class="img-circle" src="psl-images/aa.jpeg"> Cris
                            Gayle
                        </div>
                        <div class="col-md-3 ftp11">Batsman</div>
                        <div class="col-md-5 ftp11">40000</div>
                        <div class="col-md-1 ftp11"><span class="btn-toggle">+</span></div>
                    </div>
                    <div class=" col-md-11  mrgg1">
                        <div class="col-md-3 ftp1"><img id="timg" class="img-circle" src="psl-images/aa.jpeg"> Cris
                            Gayle
                        </div>
                        <div class="col-md-3 ftp11">Batsman</div>
                        <div class="col-md-5 ftp11">40000</div>
                        <div class="col-md-1 ftp11"><span class="btn-toggle">+</span></div>
                    </div>
                    <div class=" col-md-11  mrgg1">
                        <div class="col-md-3 ftp1"><img id="timg" class="img-circle" src="psl-images/aa.jpeg"> Cris
                            Gayle
                        </div>
                        <div class="col-md-3 ftp11">Batsman</div>
                        <div class="col-md-5 ftp11">40000</div>
                        <div class="col-md-1 ftp11"><span class="btn-toggle">+</span></div>
                    </div>
                    <div class="tablety"></div>
                    <div class="accordian-table-header">
                        <ul class="match-accordian-header row">
                            <li class="col-md-3">Match</li>
                            <li class="col-md-3">Mumbai</li>
                            <li class="col-md-3">1 april</li>
                            <li class="col-md-2">3pm</li>
                            <li class="col-md-1"><span class="btn-toggle">+</span></li>
                        </ul>

                    </div>
                    <div class="accordian-table-header " id="matr">
                        <ul class="match-accordian-header row">
                            <li class="col-md-3">Match</li>
                            <li class="col-md-3">Mumbai</li>
                            <li class="col-md-3">1 april</li>
                            <li class="col-md-2">3pm</li>
                            <li class="col-md-1"><span class="btn-toggle">+</span></li>
                        </ul>
                    </div>
                    <div class="tabletyg"></div>
                </div>
            </div>
            <div class="container">
                <h3 class="ah3">UPCOMING MATCHES</h3>
                <div class="text-center col-md-10 col-md-offset-1 mrgg">
                    <div class="accordian-table-header">
                        <ul class="match-accordian-header row">
                            <li class="col-md-3">Match</li>
                            <li class="col-md-3">Mumbai</li>
                            <li class="col-md-3">1 april</li>
                            <li class="col-md-2">3pm</li>
                            <li class="col-md-1"><span class="btn-toggle">+</span></li>
                        </ul>
                    </div>

                    <div class="tablety"></div>
                    <div class="accordian-table-header">
                        <ul class="match-accordian-header row">
                            <li class="col-md-3">Match</li>
                            <li class="col-md-3">Mumbai</li>
                            <li class="col-md-3">1 april</li>
                            <li class="col-md-2">3pm</li>
                            <li class="col-md-1"><span class="btn-toggle">+</span></li>
                        </ul>

                    </div>
                    <div class="accordian-table-header " id="matr">
                        <ul class="match-accordian-header row">
                            <li class="col-md-3">Match</li>
                            <li class="col-md-3">Mumbai</li>
                            <li class="col-md-3">1 april</li>
                            <li class="col-md-2">3pm</li>
                            <li class="col-md-1"><span class="btn-toggle">+</span></li>
                        </ul>
                    </div>
                    <div class="tabletyg"></div>
                </div>
            </div>
        </section>
        <!-- ............................Show Hide Table End........................... -->
    </div>
    <!-- ...............................News start......................... -->
    <section class="container-fluid lnews">
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="gallery-title">LATEST NEWS</h3>
            </div>


            <br/>
            <div class=" col-md-10 col-md-offset-1">
                <div class=" col-md-12 ">

                    <div class="row">

                        <div class="gallery_product col-md-5 ">
                            <div class="col-md-6 ">
                                <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                            </div>
                            <div class="col-md-6 nt">
                                <span class="nt1">10 March 2017</span>
                                <br>

                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <br>
                                <p class="nt3">
                                    ishflkskfjksjkfjs;lfjs.
                                    lkfjlsjflkjsdl;fkd.4

                                    sfklsfjks
                                    sfjsj
                                </p>


                            </div>

                        </div>

                        <div class="gallery_product col-md-5 ">
                            <div class="col-md-6 ">
                                <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                            </div>
                            <div class="col-md-6 nt">
                                <span class="nt1">10 March 2017</span>
                                <br>

                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <br>
                                <p class="nt3">
                                    ishflkskfjksjkfjs;lfjs.
                                    lkfjlsjflkjsdl;fkd.4

                                    sfklsfjks
                                    sfjsj
                                </p>


                            </div>

                        </div>

                    </div>
                    <div class="row ">

                        <div class="gallery_product col-md-5 ">
                            <div class="col-md-6 ">
                                <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                            </div>
                            <div class="col-md-6 nt">
                                <span class="nt1">10 March 2017</span>

                                <br>
                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <br>
                                <p class="nt3">
                                    ishflkskfjksjkfjs;lfjs.
                                    lkfjlsjflkjsdl;fkd.4

                                    sfklsfjks
                                    sfjsj
                                </p>


                            </div>

                        </div>

                        <div class="gallery_product col-md-5 ">
                            <div class="col-md-6">
                                <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                            </div>
                            <div class="col-md-6 nt">
                                <span class="nt1">10 March 2017</span>

                                <br>
                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <br>
                                <p class="nt3">
                                    ishflkskfjksjkfjs;lfjs.
                                    lkfjlsjflkjsdl;fkd.4

                                    sfklsfjks
                                    sfjsj
                                </p>


                            </div>

                        </div>

                    </div>
                    <div class="row">

                        <div class="gallery_product col-md-5 ">
                            <div class="col-md-6">
                                <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                            </div>
                            <div class="col-md-6 nt">
                                <span class="nt1">10 March 2017</span>

                                <br>
                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <br>
                                <p class="nt3">
                                    ishflkskfjksjkfjs;lfjs.
                                    lkfjlsjflkjsdl;fkd.4

                                    sfklsfjks
                                    sfjsj
                                </p>


                            </div>
                        </div>
                        <div class="gallery_product col-md-5 ">
                            <div class="col-md-6">
                                <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                            </div>
                            <div class="col-md-6 nt">
                                <span class="nt1">10 March 2017</span>

                                <br>
                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <span class="nt2">lidihflhaijf</span>
                                <br>
                                <br>
                                <p class="nt3">
                                    ishflkskfjksjkfjs;lfjs.
                                    lkfjlsjflkjsdl;fkd.4

                                    sfklsfjks
                                    sfjsj
                                </p>


                            </div>

                        </div>

                    </div>

                </div>
                <center>
                    <button class="btn btn-md btn-default" id="nbton">VIEW MORE</button>
                </center>
            </div>
        </div>
    </section>




@endsection
@section('addteamjs')
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
                        $("#addstatus").html("team added sucessfully");
                        $('<input type="hidden" id="team_id" value="' + data.team_id + '"/>').insertBefore("#addstatus");
                    }
                    else {
                        $("#addstatus").html("team Name Already Taken")
                    }

                }
            });
        });
    </script>
    <script>
        function addplayertoteam(playerid, tournamentid) {
            var arr_player_id = [];
            arr_player_id.push(playerid);
            var teamid = $("#team_id").val();
            $.ajax({
                type: 'POST',
                url: '{{route('addUserTeamPlayerAjax')}}',
                data: {
                    tournament_id: tournamentid,
                    player_id: arr_player_id,
                    team_id: teamid, _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    console.log(data.success);
                    $('#btn-player-' + playerid).attr('disabled', true);

                }
            });
        }
    </script>

@endsection