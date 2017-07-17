@extends('layouts.app')
@section('title')

@stop
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Categories
                    </h1>
                    <hr class="light full">
                    <div class="page-content" style="margin-bottom: 80px;">


                        <!-- your content -->

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped ">
                                <thead class="main-taible-head">
                                <tr>

                                    <th class="border-r">Categories</th>
                                    {{--<th class="border-r">Points Required To Play</th>--}}

                                </tr>
                                </thead>
                                <tbody id="selected-player" class="main-taible-body">
                                @foreach($categories as $cat)
                                    @if($cat['parent_id']==NULL)
                                    <tr>
                                        <td class="border-r1" style="min-width: 305px;">
                                            {{--<img id="myteamtimg" class="img-circle img-thumbnail" style="width: 100px;"--}}
                                            {{--src="{{getUploadsPath($row['t_logo'])}}"/>--}}

                                            <h5><a href="{{route('forumCategory',['id'=>$cat['id']])}}"> {{$cat['name']}}</a></h5>

                                        </td>

                                        {{--<td class="border-r1">--}}
                                        {{--<p class="myteamtt"--}}
                                        {{--style="padding-top:34px;">{{$row['tournament_price']}}</p></td>--}}

                                    </tr>
                                    @endif
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
