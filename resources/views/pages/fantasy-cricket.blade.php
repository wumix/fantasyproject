@extends('layouts.app')
@section('meta-keywords')
    <meta name="description" content="The Privacy Policy of Gamithon Fantasy cricket includes all the actors and characters involved in this portal as fictitious and not actual.
">
@endsection

@section('css')
    <style>

        .gamithon_page_heading {
            font-size: 24px;
            line-height: 32px;
            font-weight: 600;
        }

        .fantasy_cricket_bottom_sections {
            margin-bottom: 30px;
        }

        .fantasy_cricket_bottom_sections .fantasy_cricket_call_to_action {
            padding: 30px;
            text-align: center;
            background: #efefef;
            border: 2px solid #ccc;
            border-radius: 11px;
        }

        .fantasy_cricket_bottom_sections .fantasy_cricket_call_to_action h3 {
            margin-top: 0;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 25px;
            line-height: 24px;
            color: #f7921e;
        }

        .fantasy_cricket_bottom_sections .fantasy_cricket_call_to_action .gamithon_section_btn {
            display: inline-block;
            background: #92B713;
            padding: 8px 15px;
            border: 2px solid #92B713;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            color: #fff;
            border-radius: 5px;
        }

        .fantasy_cricket_bottom_sections .fantasy_cricket_call_to_action .gamithon_section_btn:hover {
            color: #92B713;
            background: none;
            text-decoration: none;
        }

    </style>
@endsection

@section('content')
    <section>
        @section('title')
            Fantasy Cricket
        @stop
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Fantasy Cricket
                    </h1>
                    <hr class="light full">
                    <div class="page-content">


                        <h2 class="gamithon_page_heading">What Is Fantasy Cricket?</h2>

                        <p>Do you have what it takes to put together a winning cricket team? GamithonFantasy.com gives
                            you the perfect chance to find out. Fantasy Cricket, like other fantasy games, puts you in
                            the front line as General Manager and Coach of your team. You select from a list of the best
                            players in the Series/Tournament. Their on-field performance drives your fantasy point total
                            and overall success.</p>

                        <p>Specifically, fantasy cricket works like this: You decide what type of series/tournament you
                            want to participate in, acquire a roster of players, then set your lineup before the
                            series/tournament starts and watch as sixes, fours, stumps, catches, run rates and much,
                            much more generate fantasy points for or against your team. Whether you win or lose and
                            climb or fall on the leaderboard all depends on how well you maximize the talent on your
                            roster each series/tournament. Will you make a risky move to start with the new opener or
                            will you play it safe and keep your seasoned lineup consistent?</p>

                        <p>Will your team earn the title of GamithonFantasy.com Fantasy Cricket Champion this
                            series/tournament? Find the right settings to suit your interests and start building your
                            winning team today!</p>

                        <div class="fantasy_cricket_bottom_sections row">

                            <div class="col-md-6">
                                <div class="fantasy_cricket_call_to_action">
                                    <h3>New to gamithonfantasy.com Fantasy Cricket?</h3>
                                    <a href="{{route('login')}}" class="gamithon_section_btn">Sign Up Now!</a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="fantasy_cricket_call_to_action">
                                    <h3>Back for another series/tournament?</h3>
                                    <a href="{{route('usertournamenthome')}}" class="gamithon_section_btn">Activate Your Team!</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop