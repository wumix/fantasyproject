<?php
include 'header.php';
?> 
<section class="loginc">
	<div class="text-center col-md-10 col-md-offset-1">
	<h3 class="lh">LOGIN WITH</h3>
	<div class="gbtn">
	<button id="fb" class="btn btn-sm">Login with Facebook</button>
	<button id="tw" class="btn btn-sm">Login with Twitter</button>
	<button id="googleb" class="btn btn-sm">Login with Google+</button>
	</div>
	<div class="lines">
	<hr class="lgline"><h4 class="linor">OR</h4><hr class="lgline">
	</div>
	</div>
</section>
<!-- .....................Login Form Start............................... -->
<section>
		<div class="container">
			<div class="row main">
			 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						
						

						<div class="form-group" id="formbox">
							
							<div class="cols-md-12" id="withbox">
								<div class="input-group">
									<span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder=" Email"/>
								</div>
							</div>
						</div>

						
						<div class="form-group">
						
							<div class="cols-md-10"  id="withbox">
								<div class="input-group">
									<span id="fbg" class="input-group-addon"><i id="lgfico" class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
								</div>
							</div>
						</div>
						<div class="form-group " id="withbox">
							 <label class="form-check-label">
							      <input type="checkbox" class="form-check-input">
							     <span  id="remberbox"> Rember Me</span> <a href="" id="forgetlink"> Forget Your Password?</a>
							    </label>
						</div>

						<div class="form-group " id="withbox">
						<a class="signuplink" href="">Sign up for new account</a>
							<button type="button" class="btn  btn-lg btn-block login-button">LOGIN</button>
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