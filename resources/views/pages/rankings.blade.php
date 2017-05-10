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
                                                        <th style="min-width: 50px;">Rank</th>
                                                        <th>Player</th>
                                                        <th>Belongs To</th>

                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td style="min-width: 50px;">
                                                            1
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Virat Kohli

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>

                                                        <td>799</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            2
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Aaron Finch

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>

                                                        <td>787</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            3
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Kane Williamson

                                                        </td>

                                                        <td>
                                                            NewZealand
                                                        </td>

                                                        <td>745</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            4
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Joe Root

                                                        </td>

                                                        <td>
                                                            England
                                                        </td>

                                                        <td>743</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            5
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Glenn Maxwell

                                                        </td>

                                                        <td>
                                                            Australia
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
                                                        <th style="min-width: 50px;">Rank</th>
                                                        <th>Player</th>
                                                        <th>Belongs To</th>

                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td style="min-width: 50px;">
                                                            1
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Imran Tahir

                                                        </td>

                                                        <td>
                                                            South Africa
                                                        </td>

                                                        <td>795</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            2
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Imad Wasim

                                                        </td>

                                                        <td>
                                                            Pakistan
                                                        </td>

                                                        <td>780</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            3
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Jasprit Bumrah

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>

                                                        <td>764</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            4
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Samuel Badree

                                                        </td>

                                                        <td>
                                                            Westindies
                                                        </td>

                                                        <td>731</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            5
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Rashid Khan

                                                        </td>

                                                        <td>
                                                            Afghanistan
                                                        </td>

                                                        <td>699</td>
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
                                                        <th style="min-width: 50px;">Rank</th>
                                                        <th>Player</th>
                                                        <th>Belongs To</th>

                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td style="min-width: 50px;">
                                                            1
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Shakib Al Hasan

                                                        </td>

                                                        <td>
                                                            Bangladesh
                                                        </td>

                                                        <td>353</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            2
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Glenn Maxwell

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>

                                                        <td>343</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            3
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Mohammad Nabi

                                                        </td>

                                                        <td>
                                                            Afghanistan
                                                        </td>

                                                        <td>286</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            4
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Marlon Samuels

                                                        </td>

                                                        <td>
                                                            Westindies
                                                        </td>

                                                        <td>266</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            5
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Dwayne Bravo

                                                        </td>

                                                        <td>
                                                            Westindies
                                                        </td>

                                                        <td>224</td>
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
                                            <a href="#action-4" data-toggle="tab">
                                                Batsman
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#action-5" data-toggle="tab">
                                                Bowler
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#action-6" data-toggle="tab">
                                                All Rounder
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="action-4">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="min-width: 50px;">Rank</th>
                                                        <th>Player</th>
                                                        <th>Belongs To</th>

                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td style="min-width: 50px;">
                                                            1
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                          AB De Villiers

                                                        </td>

                                                        <td>
                                                            Southafrica
                                                        </td>

                                                        <td>875</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            2
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            David Warner

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>

                                                        <td>871</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            3
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Virat Kohli

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>

                                                        <td>852</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            4
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Joe Root

                                                        </td>

                                                        <td>
                                                            England
                                                        </td>

                                                        <td>792</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            5
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Francois du Plessis

                                                        </td>

                                                        <td>
                                                          Southafrica
                                                        </td>

                                                        <td>781</td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="action-5">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="min-width: 50px;">Rank</th>
                                                        <th>Player</th>
                                                        <th>Belongs To</th>

                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td style="min-width: 50px;">
                                                            1
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Imran Tahir

                                                        </td>

                                                        <td>
                                                            South Africa
                                                        </td>

                                                        <td>750</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            2
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Mitchell Starc

                                                        </td>

                                                        <td>
                                                            Australia
                                                        </td>

                                                        <td>701</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            3
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Trent Boult

                                                        </td>

                                                        <td>
                                                            NewZealand
                                                        </td>

                                                        <td>697</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            4
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Sunil Narin

                                                        </td>

                                                        <td>
                                                            Westindies
                                                        </td>

                                                        <td>690</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            5
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Kagiso Rabada

                                                        </td>

                                                        <td>
                                                            Southafrica
                                                        </td>

                                                        <td>686</td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="action-6">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="min-width: 50px;">Rank</th>
                                                        <th>Player</th>
                                                        <th>Belongs To</th>

                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td style="min-width: 50px;">
                                                            1
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Shakib Al Hasan

                                                        </td>

                                                        <td>
                                                            Bangladesh
                                                        </td>

                                                        <td>376</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            2
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Mohammad Hafeez

                                                        </td>

                                                        <td>
                                                            Pakistan
                                                        </td>

                                                        <td>353</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            3
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Mohammad Nabi

                                                        </td>

                                                        <td>
                                                            Afghanistan
                                                        </td>

                                                        <td>330</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            4
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            James Faulkner

                                                        </td>

                                                        <td>
                                                            Austraila
                                                        </td>

                                                        <td>308</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            5
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Anglo Mathews

                                                        </td>

                                                        <td>
                                                            Srilanka
                                                        </td>

                                                        <td>308</td>
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
                                            <a href="#action-7" data-toggle="tab">
                                                Batsman
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#action-8" data-toggle="tab">
                                                Bowler
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#action-9" data-toggle="tab">
                                                All Rounder
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="action-7">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="min-width: 50px;">Rank</th>
                                                        <th>Player</th>
                                                        <th>Belongs To</th>

                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td style="min-width: 50px;">
                                                            1
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Steve Smith

                                                        </td>

                                                        <td>
                                                            Austrila
                                                        </td>

                                                        <td>941</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            2
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Kane Willimson

                                                        </td>

                                                        <td>
                                                            NewZealand
                                                        </td>

                                                        <td>880</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            3
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Joe Root

                                                        </td>

                                                        <td>
                                                            England
                                                        </td>

                                                        <td>848</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            4
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Cheteshwar Pujara

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>

                                                        <td>846</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            5
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Virat kohli

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>

                                                        <td>818</td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="action-8">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="min-width: 50px;">Rank</th>
                                                        <th>Player</th>
                                                        <th>Belongs To</th>

                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td style="min-width: 50px;">
                                                            1
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Ravindra Jadeja

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>

                                                        <td>898</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            2
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Ravichandran Ashwin

                                                        </td>

                                                        <td>
                                                           India
                                                        </td>

                                                        <td>865</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            3
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Rangana Herath

                                                        </td>

                                                        <td>
                                                           Srilanka
                                                        </td>

                                                        <td>854</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            4
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Josh Hazlewood

                                                        </td>

                                                        <td>
                                                           Ausralia
                                                        </td>

                                                        <td>826</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            5
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                          James Aanderson

                                                        </td>

                                                        <td>
                                                            England
                                                        </td>

                                                        <td>810</td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="action-9">
                                            <div class="table-responsive col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="min-width: 50px;">Rank</th>
                                                        <th>Player</th>
                                                        <th>Belongs To</th>

                                                        <th>Pints</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-has-player">
                                                    <tr class="cwt">
                                                        <td style="min-width: 50px;">
                                                            1
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Shakib Al Hasan

                                                        </td>

                                                        <td>
                                                            Bangladesh
                                                        </td>

                                                        <td>431</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            2
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Ravindra Jadeja

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>

                                                        <td>422</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            2
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Ravichandran Ashwin

                                                        </td>

                                                        <td>
                                                            India
                                                        </td>

                                                        <td>413</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            4
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Ben Stokes

                                                        </td>

                                                        <td>
                                                            England
                                                        </td>

                                                        <td>327</td>
                                                    </tr>
                                                    <tr class="cwt">
                                                        <td>
                                                            5
                                                        </td>
                                                        <td class="text-left" style="min-width: 250px;">

                                                            Mitchell Starc

                                                        </td>

                                                        <td>
                                                           Australia
                                                        </td>

                                                        <td>318</td>
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