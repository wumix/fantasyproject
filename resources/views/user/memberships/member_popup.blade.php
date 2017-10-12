<?php
$membership_plans = \App\Membership::all();
?>
<section id="pricePlans">
    <ul id="plans">
        @foreach($membership_plans as $plan)

            {!! Form::open(['method'=>'POST','url' => route('addmoney.paypal',['id'=>$plan['id']])]) !!}
            <li class="plan">
                <ul class="planContainer">
                    <li class="title" class="bestPlanTitle">
                        <h2> {{$plan['name']}}</h2></li>
                    <li class="price" class="bestPlanPrice"><p>
                            USD {{$plan['price']}}
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
                        <input type="hidden" name="amount"
                               value="{{$plan['price']}}"/>
                        <input value="purchase" class="bestPlanButton"
                               type="submit"></li>
                </ul>
            </li>
            {!! Form::close() !!}
        @endforeach
    </ul> <!-- End ul#plans -->
</section>