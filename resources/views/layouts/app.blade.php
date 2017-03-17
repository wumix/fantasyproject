<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  
  <script type="text/javascript" href="nav.js"></script>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Gamithon Fantasy</title>
    <!-- Bootstrap -->
	<!-- <link href="../../../../xampp/htdocs/shop1/css/bootstrap.css" rel="stylesheet"> -->
  <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="psl-images/gf.ico" type="image/x-icon"/>
    {!! Html::style('assets/css/nav.css') !!}
    {!! Html::style('assets/css/bootstrap.css') !!}
     {!! Html::script('assets/js/nav.js') !!}


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
     
  </head>
  <div class="container-fluid" id="mhead">
  <div class="container">
      <div class="row">
        
        <div class="col-md-6" style="text-align:left;">
          <h6>Hello Welcomw To Gamithon Fantasy</h6>
        </div>

        <div class="col-md-6" style="padding-top: 5px; text-align:right;">
            <a class="at" href="#">Help <span class="mhline">|</span></a>
          <a class="at" href="#">Login <span class="mhline">|</span></a>
          <a class="at" href="#">Register</a>
        </div>
      </div>  </div>
</div>
<body>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<!-- <script src="../../../../xampp/htdocs/shop1/js/jquery-1.11.2.min.js"></script> -->
        <script src="js/jquery-1.11.2.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
<!-- ..............................Nav Bar Start................................ -->
<section>
<nav class="navbar navbar-default navbar-fixed-top" id="nav1">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          <a class="navbar-brand" href="#">
              <img src="{{URL::asset('assets/images/gamithon-logo1.png')}}"></a></div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="topFixedNavbar1">
          <ul class="nav navbar-nav" style="color:white; padding-top:45px" >
            <li><a href="#" class="at">Home <span class="spn" style="padding-left:20px;">|</span></a></li>
            <li> <a href="#">About Us  <span class="spn">|</span></a></li>
            <li> <a  href="#" >Leagues  <span class="spn">|</span></a></li>
            <li>  <a  href="#" >Tournaments  <span class="spn">|</span></a></li>
            <li>  <a  href="#">Gallery  <span class="spn">|</span></a></li>
           <li>   <a  href="#" >Contact Us</a></li>
            
              </ul>
            
          
       

        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
</nav>
</section>
<!-- ..................Nav Bar End .................................-->
            @yield('content')
        <!-- /.....................footer Start......................../ -->


<footer>
    <div class="container-fluid">
        
        <div class="row" style="background-color: black;opacity: 0.7;">
            
           <div class="col-md-6 text-center cop">
               <p> @2017 Gamithon Fantasy.All Reserved</p>
           </div>
               

                <div class="col-md-6 text-center">
                    <div   id="sz">
                        <a class="fnt" href="#"><i class="fa fa-twitter-square fa-icon " class="sz"></i></a>
                        <a href="#"><i class="fa fa-skype fa-icon" class="sz"></i></a>
                        <a href="#"><i class="fa fa-facebook-square fa-icon" class="sz"></i></a>
                    </div>
                    <img src="{{URL::asset('psl-images/logo-footer.png')}}" class="logof" >    
                    
                </div>
        
        </div>
    </div>
    <div class="container-fluid fgreen"></div>
</footer>
<!--/.......................... Footer End............................../ -->
<script src="js/bootstrap.js">

 
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>
