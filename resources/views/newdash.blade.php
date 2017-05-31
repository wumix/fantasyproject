@extends('layouts.app')
{{--{{dd($matches->t)}}--}}
@section('title')
    <title>Gamithon Fantasy</title>
@stop
@section('css')
<style>
.section_area{
    background: url("{{URL::to('/img/topbanner.png')}}");
    height: 200px;
}
.circle_area_for{
    width: 279px;
    height: 279px;
    line-height: 279px;
    display: inline-block;
    border-radius: 50%;
        margin-top: 41px;
}
.circle_area_for img{
    width: 279px;
    height: 279px;
    line-height: 279px;
    display: inline-block;
    border-radius: 50%;
    border:8px solid #fff;
}
.whole_area_section{
    width: 100%;
    display: inline-block;
     margin-top: 150px;

}
.abot_me{
    width: 100%;
    display: inline-block;
    background: #fff;
   box-shadow: 0px 0px 27px rgba(0,0,0,0.21);
       padding: 0 29px;
       position: relative;
}
.abot_me_sec{
    width: 100%;
    display: inline-block;
    background: #fff;
    box-shadow: 0px 0px 27px rgba(0,0,0,0.21);
    padding: 0 29px;
    margin-top: 50px;
    
}
.text_abot_me{
    width: 100%;
    display: inline-block;
    font-family: Montserrat-Regular;
    font-size: 15px;
    color: #030303;
    text-transform: uppercase;
    padding: 25px 0;
}
.parah_abot{
     width: 100%;
    display: inline-block;
    font-family: Montserrat-Regular;
    font-size: 15px;
    color: #a8a8a8;
    text-transform: uppercase;  
    border-bottom: 1px solid #b7b7b7;
    padding-bottom:25px; 
}
.parah_abot1{
     width: 100%;
    display: inline-block;
    font-family: Montserrat-Regular;
    font-size: 15px;
    color: #a8a8a8;
    text-transform: uppercase;  
}
.friends{
    width: 100%;
    display: inline-block;
    font-family: Montserrat-Regular;
    font-size: 15px;
    color: #030303;
    text-transform: uppercase;
    margin-bottom: 20px;
}
.small_circle{
    width: 50px;
    height: 50px;
    line-height: 50px;
    display: inline-block;
    border-radius:50%; 
    margin-right: 16px;
}
.small_circle img{
    width: 50px;
    height: 50px;
    line-height: 50px;
    display: inline-block;
    border-radius:50%; 
}
.img_area{
    width: 100%;
    display: inline-block;
    text-align: center;
        margin-bottom: 50px;
}
.jhone{
    display: inline-block;
    font-family: Lato-Regular;
    font-size: 12px;
    color: #4b4b4b;
}
.btn_club{
    width: 174px;
    display: block;
    background: #28b23c;
    padding: 12px 0;
    text-align: center;
    color: #fff;
    margin: 0 auto;
    border-radius: 38px;
    position: absolute;
    bottom: -17px;
    left: 83px;
}
.img_area_area{
    width: 100%;
    display: inline-block;
    float: left;
    margin: 0;
        -webkit-margin-before: 0em;
    -webkit-margin-after: 0em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
    -webkit-padding-start: 0px;
}
.img_area_area li{
    width: 25%;
    display: inline-block;
    float: left;
    margin-bottom: 14px;
}
.right_sec{
    width: 100%;
    display: inline-block;
    background: #fff;
     box-shadow: 0px 0px 27px rgba(0,0,0,0.21);
     padding: 22px 10px 0px 10px;
}
.trophies{
    width: 100%;
    display: inline-block;
    font-family: Montserrat-Regular;
    font-size: 15px;
    color: #030303;
    text-transform: uppercase;
    border-bottom: 1px solid #b7b7b7;
    padding-bottom: 25px;
}
.plyer_one{
    display: inline-block;
    font-family: Montserrat-Regular;
    font-size: 15px;
    color: #030303;
    text-transform: uppercase;
    font-weight: bold;
    margin-left: 16px;
    padding-top: 38px;
}
.number_sec{
        display: inline-block;
    font-family: Montserrat-Regular;
    font-size: 70px;
    color: #8b8b8c;
    font-weight: bold;
    float: right;
}
.medal{
    width: 100%;
    display: inline-block;
    float: left;
    text-align: center;
}
.medal li{
    width: 33%;
    display: inline-block;
    float: left;
}
.medal li span{
    width: 100%;
    display: inline-block;
    text-align: center;
    font-family: Montserrat-ExtraBold;
    font-size: 15px;
    font-weight: bold;
}
.upcoming_sec{
    width: 100%;
    display: inline-block;
    background: #fff;
    box-shadow: 0px 0px 27px rgba(0,0,0,0.21);
    padding: 27px 24px 35px 30px;
    margin-top: 30px;
}
.text_abot_me_upcome{
    width: 100%;
    display: inline-block;
    border-bottom: 1px solid #b7b7b7;
    font-family: Montserrat-Regular;
    font-size: 15px;
    color: #030303;
    text-transform: uppercase;
}
.upcomin_list{
    width: 100%;
    display: inline-block;
    float: left;
        margin: 0;
        -webkit-margin-before: 0em;
    -webkit-margin-after: 0em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
    -webkit-padding-start: 0px;
}
.upcomin_list li{
    width: 100%;
    display: inline-block;
    float: left;
    margin-top: 30px;
    margin-bottom: 45px;   
    border-bottom: 1px solid #b7b7b7;
        padding-bottom: 20px;
}
.upcomin_list li:nth-child(2){
        border-bottom: none;
        padding-bottom: 0px;
}
.right_upcoming{
    display: inline-block;
    margin-left: 24px;
    float: right;
    width: 62%;
}

.text_abot_me_upcome_tour{
       width: 100%;
    display: inline-block;
    font-family: Montserrat-Regular;
    font-size: 15px;
    color: #030303;
    text-transform: uppercase;

}
.clor_text{
           width: 100%;
    display: inline-block;
    font-family: Montserrat-Regular;
    font-size: 12px;
    color: #818181;
    padding: 7px 0;
}
.time_area{
    width: 100%;
    display: inline-block;
    font-family: Montserrat-ExtraBold;
    font-size: 21px;
    font-weight: bold;
    color: #28b23c;
    margin-bottom: 13px;
}
.more_btn{
               width: 100%;
    display: inline-block;
    font-family: Montserrat-Regular;
    font-size: 12px;
    color: #818181;
}
.nine_area{
    
}
</style>
@endsection
@section('content')
<div class="section_area">
<div class="container">
    <div class="row">
        <span class="circle_area_for">
            <img src={{URL::to('/img/circle-img-for.png')}} alt=""/>
        </span>
    </div>
</div>
</div>  
<div class="whole_area_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="abot_me">
                    <span class="text_abot_me">
                        A Little about me
                    </span>
                    <p class="parah_abot">
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ma

gna aliqua. Ut enim ad minim veniam, quis             
                    </p>
                    <span class="friends">
                        Friends</span>
                    <div class="img_area">
                         <span class="small_circle">
            <img src={{URL::to('/img/small_circle.png')}} alt=""/>
            <span class="jhone">Jhon Doe</span>
        </span>
                        
                    <span class="small_circle">
            <img src={{URL::to('/img/small_circle.png')}} alt=""/>
            <span class="jhone">Jhon Doe</span>
        </span>
                    <span class="small_circle">
            <img src={{URL::to('/img/small_circle.png')}} alt=""/>
            <span class="jhone">Jhon Doe</span>
        </span>
                    <span class="small_circle">
            <img src={{URL::to('/img/small_circle.png')}} alt=""/>
            <span class="jhone">Jhon Doe</span>
        </span>
                    </div> 
                    <a href="#" class="btn_club">View more</a>
                </div>
                <div class="abot_me_sec">
                    <span class="text_abot_me">
                        Club Owend
                    </span>
                    <p class="parah_abot1">
                        Asghar Mall Scheme, Satellite Town, Rawalpindi
                        <ul class="img_area_area">
                         <li>
                             <span class="small_circle"><img src={{URL::to('/img/diff_logo.png')}} alt=""/></span>
        </li>
                        
                    <li>
            <span class="small_circle"><img src={{URL::to('/img/diff_logo.png')}} alt=""/></span>
        </li>
                    <li>
           <span class="small_circle"><img src={{URL::to('/img/diff_logo.png')}} alt=""/></span>
        </li>
                    <li>
            <span class="small_circle"><img src={{URL::to('/img/diff_logo.png')}} alt=""/></span>
        </li>
                            <li>
             <span class="small_circle"><img src={{URL::to('/img/diff_logo.png')}} alt=""/></span>
        </li>
                    </ul> 
                    </p>
                </div>
            </div>
            <div class="col-md-8 no-padding">
                <div class="right_sec">
                    <div class="col-md-6">
                    <span class="trophies">Trophies</span>
                            <img src={{URL::to('/img/star.png')}} alt=""/>
                            <span class="plyer_one">Level 1 Player</span>
                            <span class="number_sec">30</span>
                    </div>
                    <div class="col-md-6">
                            <ul class="medal">
                                <li>
                           <img src={{URL::to('/img/gold-medal.png')}} alt=""/>
                           <span>20</span>
                                </li>
                                <li>
                           <img src={{URL::to('/img/gold-medal1.png')}} alt=""/>
                           <span>10</span>
                                </li>
                                <li>
                           <img src={{URL::to('/img/gold-medal2.png')}} alt=""/>
                           <span>00</span>
                                </li>
                            </ul>
                        
                    </div>
                </div>
                <div class="upcoming_sec">
                    <span class="text_abot_me_upcome">Upcoming Matches</span>
                    <div class="col-md-10">
                        <ul class="upcomin_list">
                            <li>
                                <span ><img src={{URL::to('/img/upcomin_img.png')}} alt=""/></span>
                                <div class="right_upcoming">
                                    <span class="text_abot_me_upcome_tour">Tournament of Football</span>
                                    <span class="clor_text">Asghar Mall Scheme, Satellite Town, Rawalpindi</span>
                                    <span class="time_area">09:00 - 10:45 pm</span>
                                    <a href="#" class="more_btn">More Info  ></a>
                                </div>
                             </li>
                              <li>
                                <span ><img src={{URL::to('/img/upcomin_img.png')}} alt=""/></span>
                                <div class="right_upcoming">
                                    <span class="text_abot_me_upcome_tour">Tournament of Football</span>
                                    <span class="clor_text">Asghar Mall Scheme, Satellite Town, Rawalpindi</span>
                                    <span class="time_area">09:00 - 10:45 pm</span>
                                    <a href="#" class="more_btn">More Info  ></a>
                                </div>
                             </li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <span class="nine_area">
                            09
                            <span>APR</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection