@extends('layouts.app')

@section('title')
    Leaderboard
@stop
@section('css')
    <style>
        .leader_bord_section {
            width: 100%;
            box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.21);
            display: inline-block;
            padding: 20px 20px;
            margin-bottom: 22px;
        }

        .leder_cirlcle_img {
            width: 150px;
            height: 150px;
            line-height: 150px;
            border-radius: 50%;
            box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.35);
        }

        .leder_cirlcle_img img {
            width: 150px;
            height: 150px;
            line-height: 150px;
            border-radius: 50%;
            border: 9px solid #fff;
            box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.35);
            margin-top: 16px;
            display: inline-block;
        }

        .leder_cirlcle_jhon_text {
            font-size: 20px;
            color: #92b713;
        }

        .leder_cirlcle_jhon_text_num {
            font-family:"Open Sans";
            font-style: normal;
            font-variant: normal;
            font-size: 28px;
            color: #f6980e;
        }

        .leder_smaal_text {
            font-size: 12px;
            color: #a8a8a8;
            width: 100%;
            display: inline-block;
        }

        .leder_cirlcle_rank_text {
            font-family: "Open Sans";
            font-size: 120px;
            color: #a8a8a8;
            position: relative;
        }

        .leder_cirlcle_rank_text span {
            font-size: 12px;
            position: absolute;
            bottom: -6px;
            right: 17px;
        }

        .leader_curnt_text {
            font-size: 28px;
            color: #f6980e;
            line-height: 200px;
        }

        .area_leader {
            margin-top: 58px;
        }

        .section_leader_secnd {
            width: 100%;
            display: inline-block;
        }

        .back_white_leader {
            box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.35);
            width: 48%;
            padding: 25px 0;
            margin-bottom: 20px;
        }

        .back_white_leader_sec {
            box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.35);
            width: 48%;
            padding: 25px 0;
        }

        .section_smal {
            box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.35);
        }

        .leder_cirlcle_img_smaal {
            width: 100px;
            height: 100px;
            line-height: 100px;
            border-radius: 50%;
            box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.35);
        }

        .leder_cirlcle_img_smaal img {
            width: 100px;
            height: 100px;
            line-height: 100px;
            border-radius: 50%;
            border: 9px solid #fff;
            box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.35);
            margin-top: 28px;
            display: inline-block;
        }

        .leder_cirlcle_jhon_text_second {
            font-size: 17px;
            color: #92b713;
        }
        .leder_cirlcle_jhon_text_num_second {
            font-family:"Open Sans";
            font-size: 24px;
            color: #f6980e;
            width: 100%;
            display: inline-block;
        }
        .leder_smaal_text_second {
            font-size: 12px;
            color: #a8a8a8;
            width: 100%;
            display: inline-block;
        }

        .leder_cirlcle_rank_text_second {
            font-family:"Open Sans";
            font-size: 69px;
            color: #a8a8a8;
            position: relative;
        }

        .leder_cirlcle_rank_text_second span {
            font-size: 12px;
            position: absolute;
            bottom: -6px;
            right: 17px;
        }

        .leader_small_sec {
            box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.35);
            padding: 22px 0;
            width: 32%;
            margin-right: 2%;
            margin-bottom: 20px;
            background: #fff;
        }

        .area_leader_second {
            margin-top: 30px;
        }

        .cnter_liez {
            width: 100%;
            display: inline-block;
            width: 150px;
            height: 150px;
            line-height: 150px;
            border-radius: 50%;
        }

        .cnter_liez img {
            width: 100%;
            display: inline-block;
            width: 150px;
            height: 150px;
            line-height: 150px;
            border-radius: 50%;
            border: 9px solid #fff;
            box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.35);
        }

        .cnter_liez1 img {
            display: inline-block;
            width: 65px;
            height: 65px;
            line-height: 65px;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.35);
            margin-top: 28px;
        }
        .leader_small_sec:nth-child(3n) {
            margin-right: 0;
        }

        @media all and (min-width: 961px) and (max-width: 1200px) {
            .col-md-4 {
                width: 100%;
                text-align: center;
            }

            .col-md-6 {
                text-align: center;
                width: 100%;
            }

            .col-md-12 {
                text-align: center;
                width: 100%;
            }
        }

        @media all and (min-width: 768px) and (max-width: 960px) {
            .col-md-4 {
                width: 100%;
                text-align: center;
            }

            .col-md-6 {
                text-align: center;
                width: 100%;
            }

            .col-md-12 {
                text-align: center;
                width: 100%;
            }

            .area_heandel {
                display: none;
            }
        }

        @media all and (min-width: 100px) and (max-width: 768px) {
            .col-md-4 {
                width: 100%;
                text-align: center;
            }

            .col-md-6 {
                text-align: center;
                width: 100%;
            }

            .col-md-12 {
                text-align: center;
                width: 100%;
            }

            .area_heandel {
                display: none;
            }

            .cnter_liez {
                width: auto !important;
                text-align: center;
            }
        }

        @media all and (min-width: 100px) and (max-width: 600px) {
            .col-md-4 {
                width: 100%;
                text-align: center;
            }

            .col-md-6 {
                text-align: center;
                width: 100%;
            }

            .col-md-12 {
                text-align: center;
                width: 100%;
            }

            .area_heandel {
                display: none;
            }

            .area_leader {
                width: 100%;
            }

            .cnter_liez {
                width: auto !important;
                text-align: center;
            }
        }

        @media all and (min-width: 100px) and (max-width: 480px) {
            .col-md-4 {
                width: 100%;
                text-align: center;
            }

            .col-md-6 {
                text-align: center;
                width: 100%;
            }

            .col-md-12 {
                text-align: center;
                width: 100%;
            }

            .area_heandel {
                display: none;
            }

            .area_leader {
                width: 100%;
                display: block;
            }

            .cnter_liez {
                width: auto !important;
                text-align: center;
            }

        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-heading">
                    @if(count($leaders)>3)
                    Top 20 on Leader Board
                        @else
                        Nothing to show
                    @endif
                </h1>
                <hr class="light full">
            </div>

            @if(count($leaders)>3)
            <div class="col-md-12">
                <div class="leader_bord_section">

                    <div class="col-md-6">
                        <div class="col-md-4 col-sm-12">
                            <div class="cnter_liez">
                                <img class="img-responsive "
                                     src="{{Croppa::url(getUploadsPath($leaders[0]['user']['profile_pic']))}}" alt=""/>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="col-md-4 text-center area_leader col-sm-12">
                            <span class="leder_cirlcle_jhon_text">{{$leaders[0]['user']['name']}}</span>
                            <span class="leder_cirlcle_jhon_text_num">{{$leaders[0]['score']}}</span>
                            <span class="leder_smaal_text">Current Points</span>
                        </div>
                        <div class="col-md-4">
                            <span class="leder_cirlcle_rank_text">01<span>Rank</span></span>
                        </div>

                    </div>
                    <div class="col-md-6 no-padding  area_heandel">
                        <div class="pull-left">
                            <span class="leader_curnt_text vcenter">CURRENT LEADER</span>
                        </div>
                        <div class="pull-right">
                            <span class=""><img src={{URL::to('/img/leader_bord_cup.png')}} alt=""/></span>
                        </div>
                        <div class="clear clearfix"></div>
                    </div>
                </div>
            </div>


            <div class="section_leader_secnd col-md-12">
                <div class="col-md-6 col-sm-12 back_white_leader  pull-left">
                    <div class="col-md-12 pull-left">
                        <div class="col-md-4">
                            <div class="cnter_liez">
                                <img class="img-responsive " src="{{Croppa::url(getUploadsPath($leaders[1]['user']['profile_pic'],156,134))}}" alt=""/>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="col-md-4 text-center  area_leader">
                            <span class="leder_cirlcle_jhon_text">{{$leaders[1]['user']['name']}}</span>
                            <span class="leder_cirlcle_jhon_text_num">{{$leaders[1]['score']}}</span>
                            <span class="leder_smaal_text">Current Points</span>
                        </div>
                        <div class="col-md-4">
                            <span class="leder_cirlcle_rank_text">02<span>Rank</span></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 back_white_leader  pull-right">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="cnter_liez">
                                <img class="img-responsive " src={{Croppa::url(getUploadsPath($leaders[2]['user']['profile_pic'],156,134))}} alt=""/>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="col-md-4 text-center  area_leader">
                            <span class="leder_cirlcle_jhon_text">{{$leaders[2]['user']['name']}}</span>
                            <span class="leder_cirlcle_jhon_text_num">{{$leaders[2]['score']}}</span>
                            <span class="leder_smaal_text">Current Points</span>
                        </div>

                        <div class="col-md-4">
                            <span class="leder_cirlcle_rank_text">03<span>Rank</span></span>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <?php $i=0?>
                @foreach($leaders as $key=>$row)

                    <?php if($i>3){?>
                    <div class="col-md-4 itemsz col-sm-12 leader_small_sec no-padding">
                        <div class="col-md-3 ">
                            <div class="cnter_liez1">
                                <img class="img-responsive " src="{{getUploadsPath($row['user']['profile_pic'])}}"
                                     alt=""/>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                        <div class="col-md-5 text-center  area_leader_second ">
                            <span class="leder_cirlcle_jhon_text_second">{{$row['user']['name']}}</span>
                            <span class="leder_cirlcle_jhon_text_num_second">{{$row['score']}}</span>
                            <span class="leder_smaal_text_second">Current Points</span>
                        </div>

                        <div class="col-md-4 ">
                            <span class="leder_cirlcle_rank_text_second">0{{$key}}<span>Rank</span></span>
                        </div>

                    </div>
                    <?php }
                    $i++?>
                @endforeach

            </div>
       @endif

        </div>
    </div>

@endsection
@section('js')
    <script>
        $(function () {
            $('.itemsz').matchHeight('col-md-4');
        });

    </script>
@endsection