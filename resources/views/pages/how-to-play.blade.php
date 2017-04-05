@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-heading">
                    How to play
                </h1>
                <hr class="light full">
                <div class="page-content">
                    <ol class="how-play">
                        <li>
                            Sign up for an account & Login
                        </li>
                        <li>
                            Click on Create Team 
                        </li>
                        <li>
                            Select Game & Tournament
                        </li>
                        <li>
                            Select Players as per rules of the Gamithon Fantasy
                        </li>
                        <li>
                            Save the Team
                        </li>
                        <li>
                            You are now playing in the selected tournaments 
                        </li>
                        <li>
                            After every Live match the scores will be updated on the system and it will create your results
                        </li>
                        <li>
                            If you win you will be surprised with the Prize - <a href="{{route('TermsCon')}}">Terms &amp; Conditions</a> Apply
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
@stop