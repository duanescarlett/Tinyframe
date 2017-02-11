<body>

<div class="container-fluid full">
	<?php 
		require_once 'navigation.php';
	?>
      <div class="row myScreen">
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"></h1>

			<div class="inner cover">
				<h1 class="cover-heading">Cover your page.</h1>
				<p class="lead">

					<form id='login' action="authenticate" method="post">
			
						<div>
							<label><b>Username</b></label>
							<input type="text" placeholder="Enter Username" id="username" name="username" required>
						</div>

						<div>
							<label><b>Password</b></label>
							<input type="password" placeholder="Enter Password" id="loginpassword" name="loginpassword" required>
						</div>

						<div>
							<button type="submit">Login</button>
							<input type="checkbox" name="remember" id="remember" value="on"> Remember me
						</di>

						<div>
							<button type="button" class="cancelbtn" name="submit">Cancel</button>
							<span class="psw">Forgot <a href="#">password?</a></span>
						</div>

						<input type="hidden" name="csrf_token" value="">
						
					</form> 
				</p>
			</div>
			
        </div>
      </div>
    </div>
	
  <script src="Public/js/bootstrap.min.js"></script>
  