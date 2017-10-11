@extends('layouts.app')

@section('content')
@section('title')

    {{$fixture_details['name']}}
@endsection
@section('css')
    <style>
        .fixtures_wrapper {
            box-shadow: 0 0 20px -3px #ccc;
            text-align: center;
            padding: 20px 20px 10px;
        }

        .fixtures_scorecard_wrapper {
            margin-bottom: 30px;
        }

        .fixtures-content-padding {
            border: 2px solid #92b713;
            padding: 30px 15px;
        }

        .mywebinar {
            line-height: 34px;

        }

        .mywebinar h5 {
            float: left;
            width: 70%;
        }

        .fixtures_wrapper > span {
            text-align: center;
            display: inline-block;
            color: #92b713;
            font-weight: 600;
        }

        .fixtures_wrapper > span i {
            display: block;
            font-size: 30px;
            margin-bottom: 10px;
        }

        .view_scorecard_btn {
            background: #fff;
            display: inline-block;
            padding: 10px 20px;
            float: right;
            line-height: 15px;
            border-radius: 4px;
            margin-left: 10px;
            border: 2px solid #fff;
        }

        .view_scorecard_btn:hover {
            background: transparent;
            color: #fff;
            text-decoration: none;
        }
    </style>
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