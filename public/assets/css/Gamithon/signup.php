<?php
include 'header.php';
?> 
<section class="loginc">
	<div class="text-center col-md-10 col-md-offset-1">
	<h3 class="slh">SIGN UP FORM</h3>
	
	<hr class="signupline">
	</div>
</section>
<!-- .....................Login Form Start............................... -->
<section>
		<div class="container">
			<div class="row smain">
			 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						
						<div class="form-group" id="sformbox">
							
							<div class="cols-md-12" id="withbox">
								<div class="input-group">
									<span id="fbg" class="input-group-addon">
									<i id="lgfico"  class="fa fa-user fa-lg" aria-hidden="true"></i>
									</span>
									<input type="text" class="form-control" name="fullname" id="fullname"  placeholder=" Full Name"/>
								</div>
							</div>
						</div>

						<div class="form-group" id="sformbox">
							
							<div class="cols-md-12" id="withbox">
								<div class="input-group">
									<span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-envelope fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder=" Email"/>
								</div>
							</div>
						</div>

						
						<div class="form-group">
						
							<div class="cols-md-10"  id="withbox">
								<div class="input-group">
									<span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-key fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
								</div>
							</div>
						</div>
						<div class="form-group" id="sformbox">
							
							<div class="cols-md-12" id="withbox">
								<div class="input-group">
									<span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-key fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="retypepassword" id="retypepassword"  placeholder=" Retype Password"/>
								</div>
							</div>
						</div>
						<div class="form-group " id="withbox">
							 <label class="form-check-label">
							      <input type="checkbox" class="form-check-input">
							     <span  id="remberbox"> I agreeto Gamithon's</span> <a href="" id="termlink"> Terms of Service Privacy Policy</a>
							    </label>
						</div>

						<div class="form-group " id="withbox">
						<a class="signuplink" href="">Already have an account</a>
							<button type="button" class="btn  btn-lg btn-block login-button">REGISTER</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
<!-- .....................Login Form End............................... -->

	
</section>
<?php
include 'footer.php';
?> 