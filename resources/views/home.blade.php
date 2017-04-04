@extends('layouts.app')

@section('content')

<!-- ..........................Banner Start ............................-->
<section>
    <div class="container-fluid " id="ban" >
        <div class="row" id="rrh">
            <div class="col-md-6" id="headt">

                <h1 class="ht1">Welcome</h1>
                <h3 class="ht2">TO GAMITHON</h3>
            </div>
            <div class="col-md-6" >
                <div class="container" id="uocming">
                    <h3 id="uph">UPCOMING TOURNAMENT</h3>
                    <h4 id="up4">

                        {{$tournaments_list[0]['name']}}

                    </h4>
                    <div class="perant row">
                        <div id="getting-started" class="child col-md-4">10</div>
                        <div id="getting-started1" class="child col-md-4"> 20</div>
                        <div id="getting-started2" class="child col-md-4"> 30</div>
                        <div id="getting-started3" class="child col-md-4"> 40</div>



                    </div>
                    <div class="pt row">
                        <div class="ct col-md-4">Days</div>
                        <div class="ct col-md-4">Hours</div>
                        <div class="ct col-md-4">Min</div>
                        <div class="ct col-md-4">Sec</div>

                    </div>



                </div>
            </div>



        </div></div>

</section>
<!-- ............................Banner End.................... -->
<!-- .........................................Google Add Start........................ -->
<!--<section>
    <div class="container-fluid" id="googlec">
        <div class="container" id="googlel">
            <h1>GOOGLE ADD</h1>
        </div>
    </div>
</section>-->
<!-- ......................................Google Add End................................. -->
<!-- ..............................Table Start................................... -->
<section>
    <div class="container-fluid main-t">
        <div class="container">
            <h3 class="ah3">ACTIVE TOURNAMENTS</h3>


            <table class="table"  id="bgcol">
                <thead class="main-taible-head" >


                    <tr >
                        <th class="border-r th1">TOURNAMENT NAME</th>
                        <th class="border-r">VENUE</th>
                        <th class="border-r">STARTING DATE</th>
                        <th class="th2">ENDING DATE</th>
                    </tr>
                </thead>
                <tbody class="main-taible-body">
                    @if(!empty($tournaments_list))
                    @foreach ($tournaments_list as $row)
                    <tr class="trr">
                        <td class="border-r"><a
                                href="{{route('showTournament', ['tournament_id'=>$row['id']])}}">{{$row['name']}}</a>
                        </td>
                        <td class="border-r">{{$row['venue']}}</td>
                        <td class="border-r">{{$row['start_date']}}</td>
                        <td >{{$row['end_date']}}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr class="trr">
                        <td class="border-r" colspan="4">NO LISTING YET</td>
                    </tr>

                    @endif


                </tbody>
            </table>






        </div>
    </div>
</section>
<!-- ...............Table End.............................. -->
<!-- LETS PLAY AT GAMITHON  Start-->
<section>
    <div class="container-fluid lets-play-gamithone">
        <div class="container">
            <h4>LETS PLAY AT GAMITHON</h4>
            <div class="row">
                <div class="col-md-3">
                    <h1>1</h1>
                    <i id="i1" class="fa fa-user-plus" aria-hidden="true"><h3>SIGN UP FOR A <br>FREE GAMITHONE<br>
                            ACCOUNT</h3></i>

                </div>
                <div class="col-md-1">
                    <i id="arow" class="fa fa-arrow-right"></i>
                </div>

                <div id="i2" class="col-md-3">
                    <h1>2</h1>
                    <i class="fa fa-users"><h3>CHOOSE A LEAGUE <br>FREE GAMITHONE<br> ACCOUNT</h3></i>
                </div>
                <div class="col-md-1">
                    <i id="arow" class="fa fa-arrow-right"></i>
                </div>

                <div class="col-md-4">
                    <h1>3</h1>
                    <i id="i3" class="fa fa-trophy"><h3>SELECT PLAYERS<br>AND WIN!</h3></i>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- LETS PLAY AT GAMITHON  End-->
<!-- .................Gallery Sart .........................
<section>
    <div class="container-fluid bgimg">

        <div class="container gal ">
            <div class="row">
                <h3>GAMITHON GALLERY</h3>
                <ul class="galeria">
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                    <li><a href="http://placehold.it/640x480.png"><img src="http://placehold.it/320x320.png"/></a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</section>
-->
<!-- .........................Gallery End .................................-->
<!-- ...............................News start.........................
<div class="container-fluid lnews">
    <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="gallery-title">LATEST NEWS</h3>
        </div>


        <br/>
        <div class=" col-md-10 col-md-offset-1">
            <div class=" col-md-12 ">

                <div class="row">

                    <div class="gallery_product col-md-5 ">
                        <div class="col-md-6 ">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                        </div>
                        <div class="col-md-6 nt">
                            <span class="nt1">10 March 2017</span>
                            <br>

                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <br>
                            <p class="nt3">
                                ishflkskfjksjkfjs;lfjs.
                                lkfjlsjflkjsdl;fkd.4

                                sfklsfjks
                                sfjsj
                            </p>


                        </div>

                    </div>

                    <div class="gallery_product col-md-5 ">
                        <div class="col-md-6 ">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                        </div>
                        <div class="col-md-6 nt">
                            <span class="nt1">10 March 2017</span>
                            <br>

                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <br>
                            <p class="nt3">
                                ishflkskfjksjkfjs;lfjs.
                                lkfjlsjflkjsdl;fkd.4

                                sfklsfjks
                                sfjsj
                            </p>


                        </div>

                    </div>

                </div>
                <div class="row ">

                    <div class="gallery_product col-md-5 ">
                        <div class="col-md-6 ">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                        </div>
                        <div class="col-md-6 nt">
                            <span class="nt1">10 March 2017</span>

                            <br>
                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <br>
                            <p class="nt3">
                                ishflkskfjksjkfjs;lfjs.
                                lkfjlsjflkjsdl;fkd.4

                                sfklsfjks
                                sfjsj
                            </p>


                        </div>

                    </div>

                    <div class="gallery_product col-md-5 ">
                        <div class="col-md-6">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                        </div>
                        <div class="col-md-6 nt">
                            <span class="nt1">10 March 2017</span>

                            <br>
                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <br>
                            <p class="nt3">
                                ishflkskfjksjkfjs;lfjs.
                                lkfjlsjflkjsdl;fkd.4

                                sfklsfjks
                                sfjsj
                            </p>


                        </div>

                    </div>

                </div>
                <div class="row">

                    <div class="gallery_product col-md-5 ">
                        <div class="col-md-6">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                        </div>
                        <div class="col-md-6 nt">
                            <span class="nt1">10 March 2017</span>

                            <br>
                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <br>
                            <p class="nt3">
                                ishflkskfjksjkfjs;lfjs.
                                lkfjlsjflkjsdl;fkd.4

                                sfklsfjks
                                sfjsj
                            </p>


                        </div>
                    </div>
                    <div class="gallery_product col-md-5 ">
                        <div class="col-md-6">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive imgn">
                        </div>
                        <div class="col-md-6 nt">
                            <span class="nt1">10 March 2017</span>

                            <br>
                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <span class="nt2">lidihflhaijf</span>
                            <br>
                            <br>
                            <p class="nt3">
                                ishflkskfjksjkfjs;lfjs.
                                lkfjlsjflkjsdl;fkd.4

                                sfklsfjks
                                sfjsj
                            </p>


                        </div>

                    </div>

                </div>

            </div>
            <center>
                <button class="btn btn-md btn-default" id="nbton">VIEW MORE</button>
            </center>
        </div>
    </div>
</div>
</section>
-->

<!-- /.....................footer Start......................../ -->
@endsection
{{--@if(!empty( $data['tournaments_list']))--}}
@section('js')
@php($date= '00-00-00 00:00:00')    
@if(!empty($tournaments_list[0]['start_date']))
@php($date= $tournaments_list[0]['start_date']);    
@endif
{{Html::script('js/moment.js')}}
<script type="text/javascript">
    var dateObj = new Date();
    var userTimeZone = dateObj.getTimezoneOffset();
    //Time zone is in negatinv i.e. forward from GMT
    userTimeZone = (userTimeZone < 0) ? Math.abs(userTimeZone) : userTimeZone;
    var tournamentDateTime = moment('{{$date}}').add('m', userTimeZone).format('YYYY/MM/DD hh:mm:ss a');

    console.log(tournamentDateTime);
    $("#getting-started").countdown(tournamentDateTime, function (event) {
        $(this).text(
                event.strftime('%D')
                );
    });
    $("#getting-started1")
            .countdown(tournamentDateTime, function (event) {
                $(this).text(
                        event.strftime('%H')
                        );
            });
    $("#getting-started2")
            .countdown(tournamentDateTime, function (event) {
                $(this).text(
                        event.strftime('%M')
                        );
            });
    $("#getting-started3")
            .countdown(tournamentDateTime, function (event) {
                $(this).text(
                        event.strftime('%S')
                        );
            });

</script>
{{--@endif--}}
@stop