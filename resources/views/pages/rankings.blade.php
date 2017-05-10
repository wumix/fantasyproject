@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Players Ranking
                    </h1>
                    <hr class="light full">

                    <div class="col-md-12">
                        <h3 class="text-center">T20 Players</h3>
                        <div class="table-responsive">
                            <div class="panel with-nav-tabs panel">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#action-1" data-toggle="tab">
                                                Batsman
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#action-2" data-toggle="tab">
                                               Bowler
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#action-3" data-toggle="tab">
                                                All Rounder
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="action-1">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>

                                                        <th>Player</th>
                                                        <th>Belongs To</th>
                                                        <th>Rank</th>
                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Virat Kohli

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>799</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Aaron Finch

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>787</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Kane Williamson

                                                        </td>

                                                        <td>
                                                            NewZealand
                                                        </td>
                                                        <td>
                                                            3
                                                        </td>
                                                        <td>745</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Joe Root

                                                        </td>

                                                        <td>
                                                            England
                                                        </td>
                                                        <td>
                                                            4
                                                        </td>
                                                        <td>743</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Glenn Maxwell

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                        <td>718</td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="action-2">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>

                                                        <th>Player</th>
                                                        <th>Belongs To</th>
                                                        <th>Rank</th>
                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            aaa

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>799</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Aaron Finch

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>787</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Kane Williamson

                                                        </td>

                                                        <td>
                                                            NewZealand
                                                        </td>
                                                        <td>
                                                            3
                                                        </td>
                                                        <td>745</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Aaron Finch

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            4
                                                        </td>
                                                        <td>787</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Glenn Maxwell

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                        <td>718</td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="action-3">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>

                                                        <th>Player</th>
                                                        <th>Belongs To</th>
                                                        <th>Rank</th>
                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            aaa

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>799</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Aaron Finch

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>787</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Kane Williamson

                                                        </td>

                                                        <td>
                                                            NewZealand
                                                        </td>
                                                        <td>
                                                            3
                                                        </td>
                                                        <td>745</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Aaron Finch

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            4
                                                        </td>
                                                        <td>787</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Glenn Maxwell

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                        <td>718</td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3 class="text-center">ODI Players</h3>
                        <div class="table-responsive">
                            <div class="panel with-nav-tabs panel">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#action-1" data-toggle="tab">
                                                Batsman
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#action-2" data-toggle="tab">
                                                Bowler
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#action-3" data-toggle="tab">
                                                All Rounder
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="action-1">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>

                                                        <th>Player</th>
                                                        <th>Belongs To</th>
                                                        <th>Rank</th>
                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Virat Kohli

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>799</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Aaron Finch

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>787</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Aaron Finch

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            3
                                                        </td>
                                                        <td>787</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Aaron Finch

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            4
                                                        </td>
                                                        <td>787</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Glenn Maxwell

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                        <td>718</td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3 class="text-center">Test Players</h3>
                        <div class="table-responsive">
                            <div class="panel with-nav-tabs panel">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#action-1" data-toggle="tab">
                                                Batsman
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#action-2" data-toggle="tab">
                                                Bowler
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#action-3" data-toggle="tab">
                                                All Rounder
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="action-1">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>

                                                        <th>Player</th>
                                                        <th>Belongs To</th>
                                                        <th>Rank</th>
                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Virat Kohli

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>799</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Aaron Finch

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>787</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Kane Williamson

                                                        </td>

                                                        <td>
                                                            NewZealand
                                                        </td>
                                                        <td>
                                                            3
                                                        </td>
                                                        <td>745</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Aaron Finch

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            4
                                                        </td>
                                                        <td>787</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Glenn Maxwell

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>
                                                        <td>
                                                            5
                                                        </td>
                                                        <td>718</td>
                                                    </tr>


                                                    </tbody>
                                                </table>
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
@stop