
@extends('layouts.app')

@section('content')

    <section class="loginc">
        <div class="text-center col-md-10 col-md-offset-1">
            <h3 class="slh">CRAZY11</h3>
            <hr class="signupline">
            <img src="psl-images\BPL_OFFICIAL_LOGO.JPG" class="img-fluid" alt="Responsive image" id="mytimg">
            <h3 class="tnt">Bangladesh Premier league</h3>
        </div>
    </section>
    <!-- .....................TeamStart............................... -->
    <section class="myteam">
        <div class="countaner">
            <div class="col-md-3"></div>
            <section>
                <div id="mytl" class="text-center col-md-3" >
                    <h3 class="tnt">PLAYER ROLE LIMIT</h3>
                    <h5 class="myt">You can select players within this limit</h5>
                    <br>
                    <h4 class="myt1">Batsmen: 4</h4>
                    <h4 class="myt1">Bowler: 4</h4>
                    <h4 class="myt1">Allrounders: 2</h4>
                    <h4 class="myt1">Wicketkeeper: 1</h4>

                </div>
            </section>

            <section>
                <div id="myt2" class="text-center col-md-3" >
                    <h3 class="tnt1">PLAYER ROLE LIMIT</h3>
                    <h5 class="myt">Selected team players</h5>
                    <br>
                    <h4 class="myt2">Batsmen: <span>4</span></h4>
                    <h4 class="myt2">Bowler: <span>4</span></h4>
                    <h4 class="myt2">Allrounders: <span>2</span></h4>
                    <h4 class="myt2">Wicketkeeper: <span>1</span></h4>

                </div>

            </section>
        </div>
    </section>
    <!-- .....................Team End............................... -->
    <!-- ..............................Table Start................................... -->
    <section>
        <div class="container-fluid" id="tblmarconten">
            <div class="container">
                <div class="row">
                    <div  >
                        <center>
                            <h3 class="ah311">SELECTED PLAYERS</h3>
                        </center>
                    </div>


                </div>
                <br>
                <br>
                <br>
                <br>
                <table class="table table-striped" id="tortable">
                    <thead class="main-taible-head" >
                    <tr>
                        <th class="border-r th1">PLAYERS</th>
                        <th class="border-r">ROLES</th>
                        <th class="border-r">POINTS</th>
                        <th class="th2">CHANGE PLAYER</th>
                    </tr>
                    </thead>
                    <tbody class="main-taible-body">
                    <tr>
                        <td class="border-r1" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>
                        <td class="border-r1"><p class="myteamtt">Batsman</p></td>
                        <td class="border-r1"><p class="myteamtt">40000</p></td>
                        <td><button class="btn btn-md bttor1">TRANSFER</button></td>

                    </tr>
                    <tr class="cwt">
                        <td class="border-r1" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>
                        <td class="border-r1"><p class="myteamtt">Batsman</p></td>
                        <td class="border-r1"><p class="myteamtt">40000</p></td>
                        <td><button class="btn btn-md bttor1">TRANSFER</button></td>


                    </tr>
                    <tr>
                        <td class="border-r1" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>
                        <td class="border-r1"><p class="myteamtt">Batsman</p></td>
                        <td class="border-r1"><p class="myteamtt">40000</p></td>
                        <td><button class="btn btn-md bttor1">TRANSFER</button></td>

                    </tr>
                    <tr class="cwt">
                        <td class="border-r1" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>
                        <td class="border-r1"><p class="myteamtt">Batsman</p></td>
                        <td class="border-r1"><p class="myteamtt">40000</p></td>
                        <td><button class="btn btn-md bttor1">TRANSFER</button></td>

                    </tr>
                    <tr>
                        <td class="border-r1" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>
                        <td class="border-r1"><p class="myteamtt">Batsman</p></td>
                        <td class="border-r1"><p class="myteamtt">40000</p></td>
                        <td><button class="btn btn-md bttor1">TRANSFER</button></td>

                    </tr>
                    <tr class="cwt">
                        <td class="border-r1" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>
                        <td class="border-r1"><p class="myteamtt">Batsman</p></td>
                        <td class="border-r1"><p class="myteamtt">40000</p></td>
                        <td class="brr"><button class="btn btn-md bttor1">TRANSFER</button></td>


                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- ...............Table End.............................. -->
    <div class="text-center" >
        <h3 class="ah3" >SELECT PLAYERS</h3>
    </div>
    <br>
    <br>
    <br>
    <br>
    <section>

        <div class="container" >


            <div class="panel with-nav-tabs panel">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li id="tbbox" class="active"><a id="tabt" href="#tab1default" data-toggle="tab">Batsmen</a></li>
                        <li id="tbbox"><a id="tabt" href="#tab2default" data-toggle="tab">Bowlers</a></li>
                        <li id="tbbox"><a id="tabt" href="#tab3default" data-toggle="tab">Allrounder </a></li>
                        <li id="tbbox"><a id="tabt" href="#tab3default" data-toggle="tab">Wicketkeeper</a></li>

                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active " id="tab1default">
                            <div class="col-md-11 tcen ">
                                <table class="table " id="tortable">
                                    <thead class="main-taible-head1" >
                                    <tr>
                                        <th class=" th1">PLAYERS</th>

                                        <th class="point">POINTS</th>
                                        <th class="add">ADD</th>
                                    </tr>
                                    </thead>
                                    <tbody class="main-taible-body">
                                    <tr class="cwt">
                                        <td  class=" th11"><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>

                                        <td class=" point"><p class="myteamtt">40000</p></td>
                                        <td class=" add"><button class="btn btn-md bttor1">SELECT</button></td>

                                    </tr>
                                    <tr class="cwt">
                                        <td class=" th11" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>

                                        <td class=" point"><p class="myteamtt">40000</p></td>
                                        <td class=" add"><button class="btn btn-md bttor1">SELECT</button></td>

                                    </tr>

                                    <tr class="cwt">
                                        <td class=" th11" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>

                                        <td class=" point"><p class="myteamtt">40000</p></td>
                                        <td class="add"><button class="btn btn-md bttor1">SELECT</button></td>


                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                            <div class="col-md-11 tcen ">
                                <table class="table " id="tortable">
                                    <thead class="main-taible-head1" >
                                    <tr>
                                        <th class=" th1">PLAYERS</th>

                                        <th class="point">POINTS</th>
                                        <th class="add">ADD</th>
                                    </tr>
                                    </thead>
                                    <tbody class="main-taible-body">
                                    <tr class="cwt">
                                        <td  class=" th11"><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>

                                        <td class=" point"><p class="myteamtt">40000</p></td>
                                        <td class=" add"><button class="btn btn-md bttor1">SELECT</button></td>

                                    </tr>
                                    <tr class="cwt">
                                        <td class=" th11" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>

                                        <td class=" point"><p class="myteamtt">40000</p></td>
                                        <td class=" add"><button class="btn btn-md bttor1">SELECT</button></td>

                                    </tr>

                                    <tr class="cwt">
                                        <td class=" th11" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>

                                        <td class=" point"><p class="myteamtt">40000</p></td>
                                        <td class="add"><button class="btn btn-md bttor1">SELECT</button></td>


                                    </tr>

                                    </tbody>
                                </table>
                            </div></div>
                        <div class="tab-pane fade" id="tab3default">
                            <div class="col-md-11 tcen ">
                                <table class="table " id="tortable">
                                    <thead class="main-taible-head1" >
                                    <tr>
                                        <th class=" th1">PLAYERS</th>

                                        <th class="point">POINTS</th>
                                        <th class="add">ADD</th>
                                    </tr>
                                    </thead>
                                    <tbody class="main-taible-body">
                                    <tr class="cwt">
                                        <td  class=" th11"><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>

                                        <td class=" point"><p class="myteamtt">40000</p></td>
                                        <td class=" add"><button class="btn btn-md bttor1">SELECT</button></td>

                                    </tr>
                                    <tr class="cwt">
                                        <td class=" th11" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>

                                        <td class=" point"><p class="myteamtt">40000</p></td>
                                        <td class=" add"><button class="btn btn-md bttor1">SELECT</button></td>

                                    </tr>

                                    <tr class="cwt">
                                        <td class=" th11" ><img id="myteamtimg" class="img-circle" src="psl-images/aa.jpeg"> Cris Gayle</td>

                                        <td class=" point"><p class="myteamtt">40000</p></td>
                                        <td class="add"><button class="btn btn-md bttor1">SELECT</button></td>


                                    </tr>

                                    </tbody>
                                </table>
                                <div class="col-md-11 tcen "></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>


@endsection
