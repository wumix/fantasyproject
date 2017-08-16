@extends('layouts.app')
@section('title')
   LeaderBoards
    @stop
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Tournament and Series
                    </h1>
                    <hr class="light full">
                    <div class="page-content" style="margin-bottom: 80px;">


                        <!-- your content -->

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped ">
                                <thead class="main-taible-head">
                                <tr>

                                    <th class="border-r">Tournament and Series</th>
                                    {{--<th class="border-r">Points Required To Play</th>--}}
                                    <th class="th2"></th>
                                </tr>
                                </thead>
                                <tbody id="selected-player" class="main-taible-body">
                                @foreach($tournaments_list as $row)
                                    <tr>
                                        <td class="border-r1" style="min-width: 305px;">
                                            {{--<img id="myteamtimg" class="img-circle img-thumbnail" style="width: 100px;"--}}
                                                 {{--src="{{getUploadsPath($row['t_logo'])}}"/>--}}
                                            <h5>{{$row['name']}}</h5>
                                        </td>

                                        {{--<td class="border-r1">--}}
                                            {{--<p class="myteamtt"--}}
                                               {{--style="padding-top:34px;">{{$row['tournament_price']}}</p></td>--}}
                                        <td class="border-r1">
                                            <a href="{{route('addTeam', ['tournament_id'=>$row['id']])}}"
                                               class="btn btn-green">
                                                Create Team
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                        <!-- your content -->


                    </div>
                </div>
            </div>
        </div>
        <br> <br> <br> <br> <br> <br> <br><br> <br> <br><br> <br><br> <br>
    </section>
@endsection
