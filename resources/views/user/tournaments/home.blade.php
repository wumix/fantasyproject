@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-heading">
                    Tournaments
                </h1>
                <hr class="light full">
                <div class="page-content" style="margin-bottom: 80px;">


                        <!-- your content -->

                    <div class="table-responsive" >

                        <table class="table table-bordered table-striped ">
                            <thead class="main-taible-head">
                                <tr>

                                    <th class="border-r"></th>
                                    <th class="border-r">Points Required To Play</th>
                                    <th class="th2"></th>
                                </tr>
                            </thead>
                            <tbody id="selected-player" class="main-taible-body">
                                @foreach($tournaments_list as $row)
                                <tr>
                                    <td class="border-r1" style="min-width: 305px;">
                                        <img id="myteamtimg" class="img-circle img-thumbnail" style="width: 100px;" src="{{getUploadsPath($row['t_logo'])}}" />
                                        {{$row['name']}}
                                    </td>

                                    <td class="border-r1">
                                        <p class="myteamtt" style="padding-top:34px;">{{$row['tournament_price']}}</p></td>
                                    <td class="border-r1" style="padding-top:38px">
                                        {{--<a  href="{{route('showTournament', ['tournament_id'=>$row['id']])}}" class="btn btn-green">--}}
                                            {{--Play this tournament--}}
                                        {{--</a>--}}
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
    <br> <br> <br> <br> <br> <br> <br>
</section>
@endsection
