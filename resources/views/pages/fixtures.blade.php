@extends('layouts.app')

@section('content')
@section('title')

    {{$fixture_details['name']}}
@endsection
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center" style="color: #F9960E;">
                    {{$fixture_details['name']}}
                    {{--<img src="{{getUploadsPath($fixture_details['t_logo'])}}">--}}
                </h1>
                <hr class="light full">

            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <?php $i = 1;?>
            @foreach($fixture_details['tournament_matches'] as $fixture)
                <div class="col-md-6 venuefont fixtures_scorecard_wrapper">

                    <div class="mywebinar clearfix">
                        <h5 class="text-capitalize">
                            {{$fixture['team_one']}} Vs {{$fixture['team_two']}}
                        </h5>
                        <a href="{{route('scorecard',['slug'=>$fixture['id'],'tournament_id'=>$fixture['tournament_id']])}}"
                           class="view_scorecard_btn">Score card</a>
                    </div>
                    <div class="col-md-12 fixtures-content-padding">

                        <div class="col-md-4">
                            <div class="fixtures_wrapper">
                                <span><i class="fa fa-map-marker"></i>Venue</span>
                                <p>{{$fixture['venue']}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fixtures_wrapper">
                                <span><i class="fa fa-calendar"></i>Date</span>
                                <p>{{formatDate($fixture['start_date'])}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fixtures_wrapper">
                                <span><i class="fa fa-clock-o"></i> Time</span>
                                <p>{{formatTime($fixture['start_date'])}} GMT</p>
                            </div>
                        </div>
                    </div>
                </div>
                @if($i%2==0)
                    <div class="clearfix"></div>
                @endif
                <?php $i++; ?>
            @endforeach
        </div>
    </div>
</section>
@endsection
@section('js')
    <script>
        $(function () {
            $('.fixtures_wrapper, .leadersName').matchHeight('col-md-4');
        });
    </script>
@stop