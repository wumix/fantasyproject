@extends('layouts.app')
@section('title')
    Memberships
@stop
@section('css')
    <style>
        .cl-pricetable-wrap {
            background: #f9f9f9;
            font-family: 'Open Sans', sans-serif;
        }

        .cl-pricetable-wrap .bottom .btn-table {
            padding: 15px;
            width: 100%;
            border: 2px solid #F8930E;
            display: block;
            font-size: 16px;
            font-weight: 700;
            text-align: center;
            text-transform: uppercase;
            color: #ffffff !important;
            background: #F8930E;
            text-decoration: none !important;
        }

        .cl-pricetable-wrap .bottom .btn-table:hover {
            border: 2px solid #F8930E !important;
            background: #fff;
            color: #F8930E !important;
        }

        .cl-header h4 {
            font-size: 23px;
        }

        .cl-pricetable-wrap .top {
            text-align: center;
            color: #92B713;
            padding: 40px 8px 0;
        }

        .cl-pricetable-wrap .top .cl-header h4 {
            font-size: 23px;
            font-weight: 600;
            line-height: 24px;
            margin-bottom: 0;
            margin-top: 0;
            padding: 5px 0 0;
            text-transform: uppercase;

        }

        .cl-pricetable-wrap .top .popular {
            background: #F8930E;
            color: #ffffff;
            font-size: 11px;
            left: -43px;
            padding: 18px 34px 6px;
            position: absolute;
            text-transform: lowercase;
            top: -6px;
            transform: rotate(-50deg);
        }

        .cl-pricetable-wrap .top h5 {
            font-size: 18px;
            font-weight: 600;
            text-transform: lowercase;
            display: inline-block;
        }

        .cl-pricetable-wrap .bottom ul {
            text-align: left;
            padding: 0;
            margin: 0;
        }

        .top h3 .dolar {
            bottom: 24px;
            font-size: 22px;
            font-weight: 800;
            padding-right: 3px;
            position: relative;
        }

        .cl-pricetable-wrap .top h3 {
            margin: 4px 0 30px;
            display: inline-block;
            font-size: 60px;
            font-weight: 300;
            line-height: 60px;
        }

        .bottom li {
            color: #365260;
            font-size: 15px;
            font-weight: 600;
            text-transform: uppercase;
            list-style: none;
            padding: 10px 12px;
        }

        .bottom li:nth-child(odd) {
            background: #efefef;
        }

        .bottom li:nth-child(even) {

        }

        .pkg-paert {
            max-width: 180px;
            display: block;
            font-size: 14px;
            float: left;
            font-weight: 400;
            text-transform: none;
        }
        .pkg-values{
            font-weight: 400;
            font-size: 14px;
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
                    <div class="page-content price-table style1" style="margin-bottom: 80px;">
                        <!-- your content -->
                        <section id="pricePlans">
                            <?php
                            // debugArr($membership_plans);
                            ?>
                            {!! Form::open(['method'=>'POST','id'=>'member_frm','url' => route('addmoney.paypal')]) !!}
                            @foreach($membership_plans as $plan)
                                <div class="col-md-3 col-lg-3 col-sm-2 col-xs-12">
                                    <div class="cl-pricetable-wrap price-2">
                                        <div class="top">
                                            {{--<span class="popular">Popular</span>--}}
                                            <div class="cl-header">
                                                <h4>{{$plan['name']}}</h4>
                                            </div>
                                            <div class="cl-subheader">
                                                <h3>
                                                    <span class="dolar">$</span>{{$plan['price']}}
                                                </h3>
                                                @if($plan['price'] > 0)
                                                    <h5> / Year</h5>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bottom">
                                            <ul>
                                                @foreach($plan['membership_details'] as $key => $val)
                                                    <li>
                                                        <span class="pkg-paert pull-left">
                                                            {{ucfirst(str_replace('_', ' ', $val['feature']))}}
                                                        </span>
                                                        <span class="pull-right pkg-values">
                                                            {{  $val['value'] }}
                                                        </span>
                                                        <div class="clear clearfix"></div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <a href="javascript:selectMemberShip('{{$plan['id']}}', '{{$plan['name']}}', '{{$plan['price']}}')"
                                               class="btn-table btn-1 hvr-sweep-to-right">
                                                Select
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <input type="hidden" name="plan_id" id="plan_id" value=""/>
                                <input type="hidden" name="plan_price" id="plan_price" value=""/>
                            {!! Form::close() !!}
                        </section>
                        <!-- your content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="height: 40px;"></div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script>
        function selectMemberShip(memberShipId, planName,planPrice) {
            $("#plan_id").val(memberShipId);
            $("#plan_price").val(memberShipId);


            bootbox.confirm({
                title: "Select membership packege",
                message: "Do you want to purchase " + planName + " packege?.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function (result) {
                    if (result) {
                        $("#member_frm").submit();
                    }
                }
            });
        }
    </script>
@stop
