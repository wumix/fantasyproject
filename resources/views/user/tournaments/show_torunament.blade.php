@php
//dd($tournament_detail);
//dd($game_roles);
@endphp
@extends('layouts.app')

@section('content')
<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-heading">
                    {{$tournament_detail['name']}}
                </h1>
                <hr class="light full">
                <div class="page-content">
                    <div class="btnbb col-md-12">
                        <a href="{{route('addTeam', ['tournament_id'=>$tournament_detail['id']])}}"
                           style="text-transform: uppercase" class="btn btn-orange">PLAY THIS TOURNAMENT
                            IN {{$tournament_detail['tournament_price']}}
                            points
                        </a>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ...............................News start......................... -->
@endsection
