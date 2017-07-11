@extends('layouts.app')
@section('title')
   Payments
@stop
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        payment Details
                    </h1>
                    <hr class="light full">
                    <div class="page-content" style="margin-bottom: 80px;">


                        <!-- your content -->

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped ">
                                <thead class="main-taible-head">
                                <tr>

                                    <th class="border-r">Payment ID</th>
                                    {{--<th class="border-r">Points Required To Play</th>--}}
                                    <th class="th2">Intent</th>
                                    <th class="th2">amount</th>
                                    <th class="th2">Description</th>
                                    <th class="th2">Date</th>
                                </tr>
                                </thead>
                                <tbody id="selected-player" class="main-taible-body">
                                @foreach($payments as $payment)
                                    <tr>
                                        <td class="border-r1" style="min-width: 100px;">
                                            {{$payment['paypal_payment_id']}}
                                        </td>
                                        <td class="border-r1" style="min-width: 100px;">
                                            {{$payment['intent']}}
                                        </td>
                                        <td class="border-r1" style="min-width: 100px;">
                                            {{$payment['amount']}} {{$payment['currency']}}
                                        </td>


                                        {{--<td class="border-r1">--}}
                                        {{--<p class="myteamtt"--}}
                                        {{--style="padding-top:34px;">{{$row['tournament_price']}}</p></td>--}}
                                        <td class="border-r1">
                                            {{$payment['description']}}

                                        </td>
                                        <td class="border-r1">
                                            {{$payment['date']}}

                                        </td>
                                    </tr>
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
