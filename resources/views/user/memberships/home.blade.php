@extends('layouts.app')
@section('title')
    Memberships
@stop
@section('css')
    <style>
        #plans, #plans ul, #plans ul li {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        #pricePlans:after {
            content: '';
            display: table;
            clear: both;
        }

        #pricePlans {
            zoom: 1;
        }

        #pricePlans {
            max-width: 69em;
            margin: 0 auto;
        }

        #pricePlans #plans .plan {
            background: #fff;
            float: left;
            width: 100%;
            text-align: center;
            border-radius: 5px;
            margin: 0 0 20px 0;

            -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .planContainer .title h2 {
            font-size: 2.125em;
            font-weight: 300;
            color: #3e4f6a;
            margin: 0;
            padding: .6em 0;
        }

        .planContainer .title h2.bestPlanTitle {
            background: #3e4f6a;

            background: -webkit-linear-gradient(top, #475975, #364761);
            background: -moz-linear-gradient(top, #475975, #364761);
            background: -o-linear-gradient(top, #475975, #364761);
            background: -ms-linear-gradient(top, #475975, #364761);
            background: linear-gradient(top, #475975, #364761);
            color: #fff;
            border-radius: 5px 5px 0 0;
        }

        .planContainer .price p {
            background: #3e4f6a;

            background: -webkit-linear-gradient(top, #475975, #364761);
            background: -moz-linear-gradient(top, #475975, #364761);
            background: -o-linear-gradient(top, #475975, #364761);
            background: -ms-linear-gradient(top, #475975, #364761);
            background: linear-gradient(top, #475975, #364761);
            color: #fff;
            font-size: 1.2em;
            font-weight: 700;
            height: 2.6em;
            line-height: 2.6em;
            margin: 0 0 1em;
        }

        .planContainer .price p.bestPlanPrice {
            background: #f7814d;
        }

        .planContainer .price p span {
            color: #8394ae;
        }

        .planContainer .options {
            margin-top: 10em;
        }

        .planContainer .options li {
            font-weight: 700;
            color: #364762;
            line-height: 2.5;
        }

        .planContainer .options li span {
            font-weight: 400;
            color: #979797;
        }

        .planContainer .button a {
            text-transform: uppercase;
            text-decoration: none;
            color: #3e4f6a;
            font-weight: 700;
            letter-spacing: 3px;
            line-height: 2.8em;
            border: 2px solid #3e4f6a;
            display: inline-block;
            width: 80%;
            height: 2.8em;
            border-radius: 4px;
            margin: 1.5em 0 1.8em;
        }

        .planContainer .button a.bestPlanButton {
            color: #fff;
            background: #f7814d;
            border: 2px solid #f7814d;
        }

        .bestPlanButton {
            color: #fff;
            background: #f7814d;
            border: 2px solid #f7814d;
            text-transform: uppercase;
            text-decoration: none;
            color: #3e4f6a;
            font-weight: 700;
            letter-spacing: 3px;
            line-height: 2.8em;
            border: 2px solid #3e4f6a;
            display: inline-block;
            width: 80%;
            height: 2.8em;
            border-radius: 4px;
            margin: 1.5em 0 1.8em;
            background: #00a65a; /* chage button backgoiurndnndndnddndndndn*/
        }

        #credits {
            text-align: center;
            font-size: .8em;
            font-style: italic;
            color: #777;
        }

        #credits a {
            color: #333;
        }

        #credits a:hover {
            text-decoration: none;
        }

        @media screen and (min-width: 481px) and (max-width: 768px) {

            #pricePlans #plans .plan {
                width: 49%;
                margin: 0 2% 20px 0;
            }

            #pricePlans #plans > li:nth-child(2n) {
                margin-right: 0;
            }

        }

        @media screen and (min-width: 769px) and (max-width: 1024px) {

            #pricePlans #plans .plan {
                width: 49%;
                margin: 0 2% 20px 0;
            }

            #pricePlans #plans > li:nth-child(2n) {
                margin-right: 0;
            }

        }

        @media screen and (min-width: 1025px) {

            #pricePlans {
                margin: 2em auto;
            }

            #pricePlans #plans .plan {
                width: 23%;
                margin: 0 1.33% 20px 0;

                -webkit-transition: all .25s;
                -moz-transition: all .25s;
                -ms-transition: all .25s;
                -o-transition: all .25s;
                transition: all .25s;
            }

            #pricePlans #plans > li:last-child {
                margin-right: 0;
            }

            #pricePlans #plans .plan:hover {
                -webkit-transform: scale(1.04);
                -moz-transform: scale(1.04);
                -ms-transform: scale(1.04);
                -o-transform: scale(1.04);
                transform: scale(1.04);
            }

            .planContainer .button a {
                -webkit-transition: all .25s;
                -moz-transition: all .25s;
                -ms-transition: all .25s;
                -o-transition: all .25s;
                transition: all .25s;
            }

            .planContainer .button a:hover {
                background: #3e4f6a;
                color: #fff;
            }

            .planContainer .button a.bestPlanButton:hover {
                background: #ff9c70;
                border: 2px solid #ff9c70;
            }

        }

    </style>
@endsection
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Membership Plans
                    </h1>
                    <hr class="light full">
                    <div class="page-content" style="margin-bottom: 80px;">


                        <!-- your content -->
                        <section id="pricePlans">
                            <ul id="plans">
                                @foreach($membership_plans as $plan)

                                    {!! Form::open(['method'=>'POST','url' => route('addmoney.paypal',['id'=>$plan['id']])]) !!}

                                    <li class="plan">
                                        <ul class="planContainer">
                                            <li class="title" class="bestPlanTitle"><h2> {{$plan['name']}}</h2></li>
                                            <li class="price" class="bestPlanPrice"><p>USD {{$plan['price']}}
                                                    /<span>year</span></p></li>
                                            <li>
                                                <ul class="options">
                                                    <li>2x <span>option 1</span></li>
                                                    <li>Free <span>option 2</span></li>
                                                    <li>Unlimited <span>option 3</span></li>
                                                    <li>Unlimited <span>option 4</span></li>
                                                    <li>1x <span>option 5</span></li>
                                                </ul>
                                            </li>
                                            <li class="button">
                                                <input type="hidden" name="amount" value="{{$plan['price']}}"/>
                                                <input value="purchase" class="bestPlanButton" type="submit"></li>
                                        </ul>
                                    </li>
                                    {!! Form::close() !!}
                                @endforeach

                                {{--<li class="plan">--}}
                                {{--<ul class="planContainer">--}}
                                {{--<li class="title"><h2 class="bestPlanTitle">Plan 2</h2></li>--}}
                                {{--<li class="price"><p class="bestPlanPrice">$20/month</p></li>--}}
                                {{--<li>--}}
                                {{--<ul class="options">--}}
                                {{--<li>2x <span>option 1</span></li>--}}
                                {{--<li>Free <span>option 2</span></li>--}}
                                {{--<li>Unlimited <span>option 3</span></li>--}}
                                {{--<li>Unlimited <span>option 4</span></li>--}}
                                {{--<li>1x <span>option 5</span></li>--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li class="button"><a class="bestPlanButton" href="#">Purchase</a></li>--}}
                                {{--</ul>--}}
                                {{--</li>--}}

                                {{--<li class="plan">--}}
                                {{--<ul class="planContainer">--}}
                                {{--<li class="title"><h2>Plan 3</h2></li>--}}
                                {{--<li class="price"><p>$30/<span>month</span></p></li>--}}
                                {{--<li>--}}
                                {{--<ul class="options">--}}
                                {{--<li>2x <span>option 1</span></li>--}}
                                {{--<li>Free <span>option 2</span></li>--}}
                                {{--<li>Unlimited <span>option 3</span></li>--}}
                                {{--<li>Unlimited <span>option 4</span></li>--}}
                                {{--<li>1x <span>option 5</span></li>--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li class="button"><a href="#">Purchase</a></li>--}}
                                {{--</ul>--}}
                                {{--</li>--}}

                                {{--<li class="plan">--}}
                                {{--<ul class="planContainer">--}}
                                {{--<li class="title"><h2>Plan 4</h2></li>--}}
                                {{--<li class="price"><p>$40/<span>month</span></p></li>--}}
                                {{--<li>--}}
                                {{--<ul class="options">--}}
                                {{--<li>2x <span>option 1</span></li>--}}
                                {{--<li>Free <span>option 2</span></li>--}}
                                {{--<li>Unlimited <span>option 3</span></li>--}}
                                {{--<li>Unlimited <span>option 4</span></li>--}}
                                {{--<li>1x <span>option 5</span></li>--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li class="button"><a href="#">Purchase</a></li>--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                            </ul> <!-- End ul#plans -->

                        </section>

                        <!-- your content -->


                    </div>
                </div>
            </div>
        </div>
        <br> <br> <br> <br> <br> <br> <br><br> <br> <br><br> <br><br> <br>
    </section>
@endsection
