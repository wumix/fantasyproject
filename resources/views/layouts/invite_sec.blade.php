<?php
$headingInvite = 'Share and get 5000 points';
if (\Request::route()->getName() == 'challenges') {
    $headingInvite = 'No record found regarding your query,please invite your friend and get 5000 points';
}
?>
@if(!\Auth::check())
    <div class="login_share_wrapper">
        <a href="{{route('userdashboard')}}">
            <img src="{{URL::to('/')}}/img/refer-img.png"/>
        </a>
    </div>
@else
    {{--<h2 class="section-heading" style="margin-top: 30px; font-size: 21px;">--}}
    {{--{{$headingInvite}}--}}
    {{--<hr class="light">--}}
    {{--</h2>--}}
    <div class="row">
        <div class="login_share_wrapper">

            @if(Request::is('/'))
                <img src="{{URL::to('/')}}/img/refer-img.png"/>
            @else
                <img src="{{URL::to('/')}}/img/refer2.png"/>
            @endif
            <div class="col-md-12 login_share_btns_wrapper">
                {{--<div class="col-md-6 pull-left">--}}

                <a class="btn btn-default" href="javascript:void(0)" id="shareBtn">
                    {{--<i class="fa fa-facebook-square"></i> facebook share--}}
                    <img src="{{URL::to('/')}}/img/fb_share_icon.png"/>
                </a>

                {{--</div>--}}
                {{--<div class="col-md-6 pull-right">--}}

                <a class="btn btn-primary" href="javascript:sendEmailtoUser()">
                    {{--<i class="fa fa-envelope"></i> Share via email--}}
                    <img src="{{URL::to('/')}}/img/email_share_icon.png"/>
                </a>


                <div id="useremailform" style="display: none;" class="form-group">
                    <!-- by defualt hidden -->
                    <form id="senduseremailform">
                        <input id="userrefferalcode"
                               value="{{ URL::to('/')}}/signup/?referral_key={{\Auth::user()->referral_key}}"
                               type="hidden" class="form-control"
                               placeholder="Enter Your Email">

                        <div class="input-group">
                            <input required id="userrefferalemail" type="email" class="form-control"
                                   placeholder="Enter email of your friend">
                        <span class="input-group-addon">
                            <button class="btn btn-referel-send btn-primary" id="btnSendRefrelEmail" type="submit">
                                Send
                            </button>
                        </span>
                        </div>

                    </form>

                    <div id="referelMsg" style="display: none; margin-top: 10px;" class="alert">

                    </div>
                </div>
                {{--</div>--}}
            </div>
        </div>
    </div>
@endif