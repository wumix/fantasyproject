@extends('layouts.app')
@section('content')
    <section>
        <style>
            footer{
                position: fixed;
                bottom: 0;
                width: 100%;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Incomplete Team
                    </h1>
                    <hr class="light full">
                    <div class="page-content">
                        <p>
                            You have not completed your team yet.
                        </p>
                        <p>
                            You will be allowed to play when you will complete 11 players in team.
                            <a href="{{route('addTeam', ['tournament_id'=>1])}}">Complete Team</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop