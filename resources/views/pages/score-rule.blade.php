@extends('layouts.app')
@section('meta-keywords')
    <meta name="description" content="The Privacy Policy of Gamithon Fantasy cricket includes all the actors and characters involved in this portal as fictitious and not actual.
">
@endsection

@section('content')
    <section>
        @section('title')
            Score Rule
        @stop
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Score Rule
                    </h1>
                    <hr class="light full">
                    <div class="scorin_bord_sec">

                        <!--start -->
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div class="panel with-nav-tabs panel score_rule_wrapper">
                                    <div class="panel-heading">
                                        <ul class="nav nav-tabs">
                                            @foreach($game_actions as $key => $val)
                                                <li class="{!! ($key == 0) ? 'active':'' !!}">
                                                    <a href="#action-{{$val['id']}}" data-toggle="tab">
                                                        {{$val['name']}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            @foreach($game_actions as $key => $val)
                                                <div class="tab-pane {!! ($key == 0) ? 'active':'' !!}" id="action-{{$val['id']}}">
                                                    <div class="table-responsive col-md-12">
                                                        <table class="table table-striped table-bordered score_rule_table_wrapper">
                                                            <thead>
                                                            <tr>
                                                                <th>Rule</th>
                                                                <th>Points</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($val['game_terms'] as $key => $val)
                                                                <?php
                                                                $termFromToPoints = tapArray($tournament['game_term_points'], ['game_term_id' => $val['id']], false);
                                                                ?>
                                                                @foreach($termFromToPoints as $termPointIndex => $termPointVal)
                                                                    <tr  class="cwt">
                                                                        <td>
                                                                            <?php
                                                                            $qtyToTxt = ($termPointVal['qty_to'] > 999) ? 'Above' : $termPointVal['qty_to'];
                                                                            ?>
                                                                            @php($fromToText = ': '.$termPointVal['qty_from'].' - '.$qtyToTxt)
                                                                            @if($termPointVal['qty_from']-$termPointVal['qty_to'] == 0)
                                                                                @php($fromToText = '')
                                                                            @endif
                                                                            {{$val['name']}} {{$fromToText}}
                                                                        </td>
                                                                        <td>
                                                                            {{$termPointVal['points']}}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                @endforeach<!--Game actions outer loop-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- tab end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop