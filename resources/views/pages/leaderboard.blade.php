@extends('layouts.app')
{{--{{dd($leaders)}}--}}
@section('title')
    Leaderboard {{$tournamet}}
@stop
@section('meta-keywords')

    <meta name="description" content="Gamithon fantasy is a cricket fantasy game where you can create your own team and win 50$ in every tournament…">
@endsection
@section('content')
    <div class="container" style="min-height: 100%;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-heading">
                    @if(count($leaders)>3)
                        Top Players of {{$tournamet}}
                    @else
                        Nothing to show
                    @endif
                </h1>
                <hr class="light full">
            </div>

            @if(count($leaders)>3)
                <div class="col-md-12">
                    <div class="leader_bord_section leader_bord_section_wrapper">

                        <div class="col-md-7">
                            <div class="col-md-4 col-sm-12">
                                <div class="cnter_liez">
                                    <img class="img-responsive "
                                         src="
                              @if("http://www.gamithonfantasy.com/assets-new/img/default-profile-pic.png"==getUploadsPath($leaders[0]['user']['profile_pic']))
                                         {{getUploadsPath($leaders[0]['user']['profile_pic'])}}
                                         @else
                                         <?php
                                         $check=explode(".",$leaders[0]['user']['profile_pic']);
                                         if($check[1]=="facebook"){
                                             echo $leaders[0]['user']['profile_pic'];
                                         }else{
                                             echo Croppa::url(getUploadsPath($leaders[0]['user']['profile_pic']),156,134);
                                         }

                                         ?>



                                         @endif" alt=""/>
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
                        <div class="col-md-5 no-padding  area_heandel">
                            <div class="pull-left">
                                <span class="leader_curnt_text vcenter">CURRENT LEADER</span>
                            </div>
                            <div class="pull-right">
                                <span class="leader_cup_image"><img src={{URL::to('/img/leader_bord_cu.png')}} alt=""/></span>
                            </div>
                            <div class="clear clearfix"></div>
                        </div>
                    </div>
                </div>


                <div class="section_leader_secnd col-md-12">
                    <div class="col-md-6 col-sm-12 back_white_leader leader_bord_section_wrapper pull-left">
                        <div class="col-md-12 pull-left">
                            <div class="col-md-4">
                                <div class="cnter_liez">
                                    <img class="img-responsive "  src="
                              @if("http://www.gamithonfantasy.com/assets-new/img/default-profile-pic.png"==getUploadsPath($leaders[1]['user']['profile_pic']))
                                    {{getUploadsPath($leaders[1]['user']['profile_pic'])}}
                                    @else
                                    <?php
                                            if(!empty($leaders[1]['user']['profile_pic'])){
                                    $check=explode(".",$leaders[1]['user']['profile_pic']);
                                    if($check[1]=="facebook"){
                                        echo $leaders[1]['user']['profile_pic'];
                                    }else{
                                        echo Croppa::url(getUploadsPath($leaders[1]['user']['profile_pic']),156,134);
                                    }
                                    }

                                    ?>
                                    @endif" alt=""/>
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
                    <div class="col-md-6 col-sm-12 back_white_leader leader_bord_section_wrapper pull-right">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="cnter_liez">
                                    <img class="img-responsive" src="
                               @if("http://www.gamithonfantasy.com/assets-new/img/default-profile-pic.png"==getUploadsPath($leaders[2]['user']['profile_pic']))
                                    {{getUploadsPath($leaders[2]['user']['profile_pic'])}}
                                    @else
                                    <?php
                                    $check=explode(".",$leaders[2]['user']['profile_pic']);
                                    // if($check[1]=="facebook"){
                                    if(1){
                                        echo $leaders[2]['user']['profile_pic'];
                                    }else{
                                        echo Croppa::url(getUploadsPath($leaders[2]['user']['profile_pic']),156,134);
                                    }

                                    ?>
                                    @endif" alt=""/>
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

                        <?php if($i>=3){?>
                        <div class="col-md-4 itemsz col-sm-12 leader_small_sec leader_bord_section_wrapper no-padding">
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
                            <span class="leder_cirlcle_rank_text_second">

                               <?php if(checksingledigit($key+1)) echo '0';?>{{$key+1}}<span>Rank</span></span>
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