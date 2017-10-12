@extends('layouts.app')
@section('title')
    Memberships
@stop
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
                                <input type="hidden" name="plan_price" id="plan_price" value="{{$plan['price']}}"/>
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
            $("#plan_price").val(planPrice);


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
