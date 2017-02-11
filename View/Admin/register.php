<body>

	<?php 
		require_once 'navigation.php';
	?>
	
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">

					<form id='register' action='registration' method='post'>
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="fname" id="fname"  placeholder="Enter your first name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Last Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="lname" id="lname"  placeholder="Enter your last name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password_confirm" id="password_confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<input type='submit' name='Submit' value='Register' />
						</div>
						
					</form>
				</div>
			</div>
		</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!--   <form id='register' action='registration' method='post'>
		<fieldset >
		
			<legend>Register</legend>
			
			<input type='hidden' name='submitted' id='submitted' value='1'/>
			<div>
				<label for='fname' >First Name*: </label>
				<input type='text' name='fname' id='fname' maxlength="50" />
			</div>
			
			<div>
				<label for='lname' >Last Name*: </label>
				<input type='text' name='lname' id='lname' maxlength="50" />
			</div>

			<div>
				<label for='email' >Email Address*:</label>
				<input type='text' name='email' id='email' maxlength="50" />
			</div>

			<div>
				<label for='username' >Username*:</label>			
				<input type='text' name='username' id='username' maxlength="50" />
			</div>

			<div>
				<label for='password' >Password*:</label>
				<input type='password' name='password' id='password' maxlength="50" />
			</div>

			<div>
				<label for='password_confirm' >Confirm Password*:</label>
				<input type='password' name='password_confirm' id='password_confirm' maxlength="50" />
			</div>
			
			<div>
				<input type='submit' name='Submit' value='Register' />
			</div>
		 
		</fieldset>
	</form> -->

</body>