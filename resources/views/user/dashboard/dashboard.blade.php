@extends('layouts.app')

@section('content')

    <section class="loginc">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="text-center main-center">

                        <img src="psl-images\BPL_OFFICIAL_LOGO.JPG" class="img-circle profileimg "
                             alt="Responsive image">
                        <h3 class="nameu">Ahmad</h3>
                        <h5 class="nameu"><a href="">Edit Profile</a></h5>

                    </div>
                </div>

            </div>
        </div>

        <div class="text-center col-md-10 col-md-offset-1">

            <h3 class="slh">SELECT TEAM</h3>

            <select class="btn dropdown-toggle col-md-10 col-md-offset-1" data-toggle="dropdown" id="dropdownbtn1">
                @foreach($user_teams as $row)
                    <option id="dropdownbtn">{{$row['name']}}</option>
                @endforeach

            </select>
        </div>
        <div class="text-center col-md-10 col-md-offset-1">

            <h3 class="slh">SELECT GAME</h3>

            <select class="btn dropdown-toggle col-md-10 col-md-offset-1" data-toggle="dropdown" id="dropdownbtn1">
                <option id="dropdownbtn">Cricket</option>
                <option id="dropdownbtn">Islamabad</option>
                <option id="dropdownbtn">Karachi</option>
                <option id="dropdownbtn">New York</option>
                <option id="dropdownbtn">Faisalabad</option>
                <option d="dropdownbtn">Pashawar</option>
                <option d="dropdownbtn">Qoeta</option>

            </select>
        </div>
    </section>
    <!-- ............................Show Hide Table Satrt........................... -->
    <section>
        <div class="container" id="dashboardcordian">
            <h3 class="ah3">COMPLETED MATCHES</h3>
            <div class="text-center col-md-10 col-md-offset-1 mrgg">
                <div class="accordian-table-header">
                    <ul class="match-accordian-header row">
                        <li class="col-md-3">Match</li>

                        <li class="col-md-4"></li>
                        <li class="col-md-4">Total Points:10000</li>
                        <li class="col-md-1"><span class="btn-toggle">+</span></li>
                    </ul>
                </div>

                <div class="tabletydashboard">
                    <div class="container" id="tabdashboardmain">


                        <div class="panel with-nav-tabs " id="dashboardtab">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li id="tbbox" class="active"><a id="tabt" href="#tab1default" data-toggle="tab">Batsmen</a>
                                    </li>
                                    <li id="tbbox"><a id="tabt" href="#tab2default" data-toggle="tab">Bowlers</a></li>
                                    <li id="tbbox"><a id="tabt" href="#tab3default" data-toggle="tab">Allrounder </a>
                                    </li>
                                    <li id="tbbox"><a id="tabt" href="#tab4default" data-toggle="tab">Wicketkeeper</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active " id="tab1default">
                                        <div class="col-md-11 tcen ">
                                            <table class="table " id="tortable">
                                                <thead class="main-taible-head1">
                                                <tr>
                                                    <th class=" th1">PLAYERS</th>
                                                    <th class="point">RUNS</th>
                                                    <th class="point">S.R</th>
                                                    <th class="add">POINTS</th>
                                                </tr>
                                                </thead>
                                                <tbody class="main-taible-body">
                                                <tr class="cwt">
                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                           src="psl-images/aa.jpeg"> Cris Gayle
                                                    </td>

                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" add"><p class="myteamtt">40000</p></td>

                                                </tr>

                                                <tr class="cwt">
                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                           src="psl-images/aa.jpeg"> Cris Gayle
                                                    </td>

                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" add"><p class="myteamtt">40000</p></td>

                                                </tr>
                                                <tr class="cwt">
                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                           src="psl-images/aa.jpeg"> Cris Gayle
                                                    </td>

                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" add"><p class="myteamtt">40000</p></td>

                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2default">
                                        <div class="col-md-11 tcen ">
                                            <table class="table " id="tortable">
                                                <thead class="main-taible-head1">
                                                <tr>
                                                <tr>
                                                    <th class=" th1">PLAYERS</th>
                                                    <th class="point">WICKETS</th>
                                                    <th class="point">E.R</th>
                                                    <th class="add">POINTS</th>
                                                </tr>
                                                </tr>
                                                </thead>
                                                <tbody class="main-taible-body">
                                                <tr class="cwt">
                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                           src="psl-images/aa.jpeg"> Cris Gayle
                                                    </td>

                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" add"><p class="myteamtt">40000</p></td>

                                                </tr>


                                                <tr class="cwt">
                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                           src="psl-images/aa.jpeg"> Cris Gayle
                                                    </td>

                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" add"><p class="myteamtt">40000</p></td>

                                                </tr>
                                                <tr class="cwt">
                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                           src="psl-images/aa.jpeg"> Cris Gayle
                                                    </td>

                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" add"><p class="myteamtt">40000</p></td>

                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3default">
                                        <div class="col-md-11 tcen ">
                                            <table class="table " id="tortable">
                                                <thead class="main-taible-head1">
                                                <tr>
                                                    <th class=" th1">PLAYERS</th>
                                                    <th class="point">RUNS</th>
                                                    <th class="point">S.R</th>
                                                    <th class="point">WICKETS</th>
                                                    <th class="point">E.R</th>
                                                    <th class="add">POINTS</th>
                                                </tr>
                                                </thead>
                                                <tbody class="main-taible-body">
                                                <tr class="cwt">
                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                           src="psl-images/aa.jpeg"> Cris Gayle
                                                    </td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" add"><p class="myteamtt">40000</p></td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                           src="psl-images/aa.jpeg"> Cris Gayle
                                                    </td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" add"><p class="myteamtt">40000</p></td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4default">
                                        <div class="col-md-11 tcen ">
                                            <table class="table " id="tortable">
                                                <thead class="main-taible-head1">
                                                <tr>
                                                    <th class=" th1">PLAYERS</th>
                                                    <th class="point">CAUGHTS</th>
                                                    <th class="point">RUNS</th>
                                                    <th class="point">S.R</th>

                                                    <th class="add">POINTS</th>
                                                </tr>
                                                </thead>
                                                <tbody class="main-taible-body">
                                                <tr class="cwt">
                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                           src="psl-images/aa.jpeg"> Cris Gayle
                                                    </td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>

                                                    <td class=" add"><p class="myteamtt">40000</p></td>
                                                </tr>
                                                <tr class="cwt">
                                                    <td class=" th11"><img id="myteamtimg" class="img-circle"
                                                                           src="psl-images/aa.jpeg"> Cris Gayle
                                                    </td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>
                                                    <td class=" point"><p class="myteamtt">40000</p></td>

                                                    <td class=" add"><p class="myteamtt">40000</p></td>
                                                </tr>


                                                </tbody>
                                            </table>
                                            <div class="col-md-11 tcen "></div>

                                        </div>
                                    </div>
                                    <div class="col-md-11 tcen "></div>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>
                <div class="accordian-table-header">
                    <ul class="match-accordian-header row">
                        <li class="col-md-3">Match</li>

                        <li class="col-md-4"></li>
                        <li class="col-md-4">Total Points:10000</li>
                        <li class="col-md-1"><span class="btn-toggle">+</span></li>
                    </ul>

                </div>
                <div class="accordian-table-header " id="matr">
                    <ul class="match-accordian-header row">
                        <li class="col-md-3">Match</li>

                        <li class="col-md-4"></li>
                        <li class="col-md-4">Total Points:10000</li>
                        <li class="col-md-1"><span class="btn-toggle">+</span></li>
                    </ul>
                </div>
                <div class="tabletyg"></div>

    </section>
    <!-- ............................Show Hide Table End........................... -->

@endsection