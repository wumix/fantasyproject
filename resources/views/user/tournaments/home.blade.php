@php


//dd($tournaments_list);

        @endphp
@extends('layouts.app')

@section('content')




    <section>
        <div class="container-fluid" id="tblmarconten">
            <div class="container">
                <div class="row">
                    <div>
                        <center>
                            <h3 class="ah311">TOURNAMENTS</h3>
                        </center>
                    </div>


                </div>
                <br>
                <br>
                <br>
                <br>
                <table class="table table-striped" id="tortable">
                    <thead class="main-taible-head">
                    <tr>

                        <th class="border-r" colspan="2">Name</th>
                        <th class="border-r">Points Required To Play</th>
                        <th class="th2">Action</th>
                    </tr>
                    </thead>
                    <tbody id="selected-player" class="main-taible-body">
                    @foreach($tournaments_list as $row)
                        <tr>
                            <td class="border-r1"><img id="myteamtimg" class="img-circle"
                                                       src="{{getUploadsPath($row['t_logo'])}}">

                            </td>

                                <td class="border-r1"><p class="myteamtt">{{$row['name']}}</p></td>
                            <td class="border-r1"><p class="myteamtt">{{$row['tournament_price']}}</p></td>

                            <td class="border-r1">
                                <a href="{{route('showTournament', ['tournament_id'=>$row['id']])}}"
                                   style="text-transform: uppercase" class="btn btn-md bttor">PLAY</a>


                            </td>

                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
