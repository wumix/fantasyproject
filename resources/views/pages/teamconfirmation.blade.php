@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-heading">
                    Team completed
                </h1>
                <hr class="light full">
                <div class="page-content">
                    <p>
                        Your team is complete. Your score will be calculated from upcoming IPL match.
                    </p>
                    <p>
                        We will make you updated from your team performance by emails. 
                        You can also see your team score go to your 
                        <a href="{{route('UserDashboard')}}">dashboard</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@stop