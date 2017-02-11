
<body>

	<script src="Public/js/bootstrap.min.js"></script>

    <div class="container-fluid full">
	<?php 
		require_once 'navigation.php';
	?>
      <div class="row myScreen">
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"></h1>


          <h2 class="sub-header">System Users</h2>
          <div class="table-responsive">
			
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Active</th>
				  <th>Admin</th>
                  <th>User Since</th>
                </tr>
              </thead>
              <tbody>
			  
                
				<?php 
					$n = 1;
					foreach ($data as $value) {

						for ($x = 1; $x <= $value->count(); $x++) {
							?><tr><?php
							if($roles = $value->find($x)->username){
								//echo $roles;
								?><td><?php echo $roles; ?></td><?php
								?><td><?php echo $value->find($x)->firstname; ?></td><?php
								?><td><?php echo $value->find($x)->lastname; ?></td><?php
								?><td><?php echo $value->find($x)->email; ?></td><?php
								?><td><?php echo $value->find($x)->active; ?></td><?php
								?><td><?php echo $value->find($x)->admin; ?></td><?php
								?><td><?php echo $value->find($x)->reg_date; ?></td><?php
							}
							?></tr><?php
						} 

					}
					
					
					
				?>
                  
                  
                
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    