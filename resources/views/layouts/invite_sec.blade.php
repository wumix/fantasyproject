<style>
    .rfral_code {
        width: 100%;
        display: inline-block;
        background: #fff;
        box-shadow: 0px 0px 27px rgba(0, 0, 0, 0.21);
        padding: 20px 20px;
        margin-bottom: 40px;
    }

    .new_form {
        width: 100% !important;
        border: 1px solid #92B713;
        background: #000 !important;
        border-radius: 10px;
        color: #fff;
        height: 42px;
    }

    .js-textareacopybtn {
        padding: 11px;
        width: 76px;
        background: #92B713;
        color: #fff;
    }

    .login_share_btns_wrapper a {
        width: 100%;
        font-weight: 600;
        height: 49px;
        font-size: 15px;
        line-height: 37px;
    }

    .login_share_btns_wrapper a:first-child {
        color: #fff;
        background: #3b5998;
        margin-bottom: 15px;
    }

    .login_share_btns_wrapper a:first-child:hover {
        background: #6d84b4 !important;
        color: #fff !important;
    }

    .login_share_btns_wrapper a i {
        display: inline-block;
        font-size: 18px;
        vertical-align: middle;
        margin-right: 7px;
    }

    .login_share_btns_wrapper a:last-child i {
        vertical-align: -1px;
    }

    #useremailform {
        clear: both;
        width: 100%;
        margin: 0 auto;
        /*background: #92B713;*/
        background: #efefef;
        padding: 10px 10px;
        position: relative;
    }

    #useremailform .input-group input[type=email] {
        box-shadow: none;
        border: 1px solid #92B713;
    }

    #useremailform .input-group .input-group-btn input[type=submit] {
        height: 34px !important;
        background: #92B713 !important;
        font-weight: 600 !important;
    }

    .btn-referel-send {
        border-radius: 0;
        height: 34px;
    }

    .input-group-addon {
        border: none;
        padding: 0;
    }
</style>
<?php
$headingInvite = 'Share and get 5000 points';
if (\Request::route()->getName() == 'challenges') {
    $headingInvite = 'No record found regarding your query,please invite your friend and get 5000 points';
}
?>
@if(!\Auth::check())
    <a href="{{route('userdashboard')}}">
        <img style="margin-top: 22px;"
             src="{{URL::to('/')}}/img/refer-img.png"/>
    </a>
@else
    <h2 class="section-heading" style="margin-top: 30px;
    font-size: 21px;">
        {{$headingInvite}}
        <hr class="light">
    </h2>
    <div class="row">
        <div class="col-md-12 login_share_btns_wrapper">
            {{--<div class="col-md-6 pull-left">--}}
            <a class="btn btn-default" href="javascript:void(0)" id="shareBtn">
                <i class="fa fa-facebook-square"></i> facebook share
            </a>
            {{--</div>--}}
            {{--<div class="col-md-6 pull-right">--}}
            <a class="btn btn-primary" href="javascript:sendEmailtoUser()">
                <i class="fa fa-envelope"></i> Share via email
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
@endif