

	<nav class="navbar navbar-inverse navbar-fixed-top">
	
		<div class="container-fluid">
		
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			  <a class="navbar-brand" href="#">TinyFrame Administration</a>
			</div>
			
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
				<li><a href="#">
					<?php
						if(isset($_SESSION['username'])){
							echo trim($_SESSION['username']);
							?>
							<li><a href="admin/logout">Logout</a></li>
							<?php
						}	
						else{
							?>
							</a>
							</li>
							<li><a href="admin/login">Login</a></li>
							<li><a href="admin/register">Register</a></li>
							<?php
						}
					?>
					<li><a href="<?= configs()['AppRoot']; ?>">View Site</a></li>
					<li><a href="#">Settings</a></li>
					
				</ul>
			</div>
			
		</div>
		
    </nav>