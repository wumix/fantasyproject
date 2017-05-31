@extends('layouts.app')
@section('content')
    <section>
        <style>

        </style>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Team completed
                    </h1>
                    <hr class="light full">
                    <div class="page-content">
                        <p>
                            Your team is complete. Your score will be calculated from upcoming tournament match.
                        </p>
                        <p>
                            You can see your team score by clicking
                            <a href="{{route('UserDashboard')}}">My Account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
    </section>
@stop