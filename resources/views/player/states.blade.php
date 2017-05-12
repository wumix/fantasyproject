<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

     <link rel="shortcut icon" href="../img/gamithon-fevi.ico" type="image/x-icon"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gamithon Fantasy</title>

    <!-- Bootstrap Core CSS -->
{!! Html::style('assets-new/vendor/bootstrap/css/bootstrap.min.css') !!}
{!! Html::style('assets-new/css/bootstrap-tour.css') !!}
{!! Html::style('assets-new/css/jquery.mCustomScrollbar.css') !!}
{!! Html::style('https://fonts.googleapis.com/css?family=Raleway') !!}
{!! Html::style('assets-new/vendor/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800') !!}
{!! Html::style('https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic') !!}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {!! Html::style('assets-new/vendor/magnific-popup/magnific-popup.css') !!}
    {!! Html::style('assets/css/slicknav.css') !!}
    {!! Html::style('assets-new/css/creative.css') !!}
    {!! Html::style('assets-new/css/style.css') !!}
    {!! Html::style('assets-new/css/fixtures.css') !!}


    {!! Html::style('assets-new/vendor/basic-table/basictable.css') !!}
    <style>


        .slick_nav li {
            list-style: none;
            overflow: hidden;
            padding: 0;
            margin: 0 0 0 0;

        }
    </style>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-98453424-1', 'auto');
        ga('send', 'pageview');

    </script>
<style>
/******************************************************/
.pop_up_one{
	background: #2c2c2c url("{{URL::to('/img/gamithon-back-img.png')}}") no-repeat right center;
	background-position: 83% 2%;
	height:660px;
}
.plyer_name{  
	width:100%;
    font-family: 'Raleway', sans-serif;
	font-size:15px;
	color:#92b713;
	display:inline-block;
}
.plyer_name span{	
	color:#a9a9a8;
}
.plyer_name2{  
	width:100%;
    font-family: 'Raleway', sans-serif;
	font-size:15px;
	color:#92b713;
	margin-top:16px;
	display:inline-block;
}
.plyer_name2 span{	
	color:#a9a9a8;
}
.orange_outline{	
	width:100%;
	display:inline-block;
	border:2px solid #f8930e;
	border-radius:10px;
	text-align:center;
}
.test_text{
	width:100%;
	display:inline-block;
	font-family: 'Raleway', sans-serif;	
	color:#92b713;
	font-size:15px;
	text-transform:uppercase;
	padding:10px 0 19px 0;
}
.match_detail{
	width:100%;
	display:inline-block;
	font-family: 'Raleway', sans-serif;	
	color:#a9a9a8;
	font-size:15px;
	margin-top:3px;	
}
.no_padding{
display:inline-block;
margin-top:7px;
}
.plyer_name3{
	width:100%;
    font-family: 'Raleway', sans-serif;
	font-size:15px;
	color:#92b713;
	margin-top:16px;
	display:inline-block;
display:inline-block;
margin-bottom:7px;
}
.match_detail_sec{
	width:100%;
	display:inline-block;
	font-family: 'Raleway', sans-serif;	
	color:#a9a9a8;
	font-size:15px;
	margin-top:3px;
	margin-bottom:20px;	
}
.shahid_img{
display:inline-block;
margin-top:32px;
}
/**********************************************************/
@media all and (min-width: 961px) and (max-width: 1200px) {
.orange_outline{
margin-bottom:20px !important;
}
.responcve_type{
	width:100%;
	text-align:center;
}
.equal_locate{
	width:100%;
	text-align:center;
}
.pop_up_one{
	height:auto !important;
}
.plyer_name{
	margin-top:23px;
}
}

@media all and (min-width: 768px) and (max-width: 960px) {
.orange_outline{
margin-bottom:20px !important;
}
.plyer_name{
	margin-top:23px;
}
.responcve_type{
	width:100%;
	text-align:center;
}
.pop_up_one{
	height:auto !important;
}
.equal_locate{
	width:100%;
	text-align:center;
}
}
@media all and (min-width: 100px) and (max-width: 768px) {
.orange_outline{
margin-bottom:20px !important;
}
.plyer_name{
	margin-top:23px;
}
.pop_up_one{
	height:auto !important;
}
.responcve_type{
	width:100%;
	text-align:center;
}
.equal_locate{
	width:100%;
	text-align:center;
}
.pop_up_one{
	height:auto !important;
}
}

</style>

</head>
<body>
    <div class="pop_up_one">
<div class="container">
		<div class="back-ground clearfix" style="padding-top:32px;">

			<div class="col-md-3 responcve_type">
				<img src="/img/khan's-pic.png" alt="no-img">
			</div>
			<div class="col-md-9 equal_locate">
				<span class="plyer_name">Name: <span>Shahid Khan Afridi</span></span>
				<span class="plyer_name2">Born: <span>March 1, 1980</span></span>
				<span class="plyer_name2">Player Role: <span>Allrounder</span></span>
				<span class="plyer_name2">Batting Statistics</span>
				<div class="" style="margin-top:20px;">
					<div class="col-md-4">
						<div class="orange_outline">
							<span class="test_text">Tests</span>
							<span class="match_detail">Matches: 27</span>
							<span class="match_detail">Ave: 36.51</span>
							<span class="match_detail_sec">SR: 86.97</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="orange_outline">
							<span class="test_text">ODIs</span>
							<span class="match_detail">Matches: 398</span>
							<span class="match_detail">Ave: 23.57</span>
							<span class="match_detail_sec">SR: 117.00</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="orange_outline">
							<span class="test_text">T20Is</span>
							<span class="match_detail">Matches: 98</span>
							<span class="match_detail">Ave: 18.01</span>
							<span class="match_detail_sec">SR: 150.75</span>
						</div>
					</div>
					<span class="plyer_name3">Bowling Statistics</span>
					<div style="margin-top:20px">
						<div class="col-md-4">
						<div class="orange_outline">
							<span class="test_text">ODIs</span>
							<span class="match_detail">Wkts: 395</span>
							<span class="match_detail">Econ: 4.62</span>
								<span class="match_detail_sec">SR: 44.7</span>
						</div>
					</div>
						<div class="col-md-4">
						<div class="orange_outline">
							<span class="test_text">Tests</span>
							<span class="match_detail">Wkts: 97</span>
							<span class="match_detail">Econ: 6.61</span>
								<span class="match_detail_sec">SR: 22.1</span>
						</div>
					</div>
						<div class="col-md-4">
						<div class="orange_outline">
							<span class="test_text">T20Is</span>
							<span class="match_detail">Matches: 97</span>
							<span class="match_detail">Ave: 6.61</span>
							<span class="match_detail_sec">SR: 22.1</span>
						</div>
					</div>	
					</div>
					
					
				</div>
			</div>
			
        </div>
		<div class="clearfix clear"></div>
	</div>	
</div>
</body>
</html>