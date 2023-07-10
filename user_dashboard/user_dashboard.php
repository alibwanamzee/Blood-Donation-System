<?php
	include('user_header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<h2>Welcome, <span style="color: blue"><?php echo $_SESSION['membername']?></span></h2><br />
			<p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddonor">Request Blood Donation</button></p><br />
			
			<!-- add donor modal -->
			<div class="modal fade" id="adddonor" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add Donor Details</h4>
						</div>
						<div class="modal-body">
							<form action="add_donor.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name" required></input>
								</div>
								<div class="form-group">
									<select class="form-control" name="gender" id="gender">
										<option value="male">Select Gender</option>
										<option value="female">Female</option>
										<option value="other">Male</option>
									</select>
								</div>
					<div class="form-group">
									<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" required></input>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" name="email" id="email" placeholder="Enter email"></input>
								</div>
								<div class="form-group">
									<select class="form-control" name="state" id="state">
										<?php 
										$state = $connection->query("SELECT * FROM state");
										while($row = $state->fetch_array()){ ?>
											<option value="<?php echo $row['state_name'];?>"><?php echo $row['state_name'];?></option>
										<?php }
										?>
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" name="city" id="city" required>
										<?php 
										$state = $connection->query("SELECT * FROM city");
										while($row = $state->fetch_array()){ ?>
											<option value="<?php echo $row['city_name'];?>"><?php echo $row['city_name'];?></option>
										<?php }
										?>
									</select>
								</div>					
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="addmember">Add</button>
						</div>
						<?php
							$status = $_GET['status'] ?? '';

							if ($status === 'success') {
								echo '<script>alert("Request sent successfully!");</script>';
							} elseif ($status === 'error') {
								echo '<script>alert("Error occurred while requesting to donate blood.");</script>';
							}
						?>
						</form>
					</div>
				</div>
			</div>
			<!-- end of add donor modal -->
			
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Weekly Overview</h3>
					<p class="panel-subtitle">Period: Aug 20, 2023 - Aug 26, 2023</p>
				</div>
				<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-star"></i></span>
							<p>
								<span class="number">0</span>
								<span class="title">Reviews</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-gift"></i></span>
							<p>
								<span class="number">0</span>
								<span class="title">Rewards</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-eye"></i></span>
							<p>
								<span class="number">0</span>
								<span class="title">Visits</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-phone"></i></span>
							<p>
								<span class="number">Support</span>
								<span class="title">Contact</span>
							</p>
						</div>
					</div>
				</div>

				</div>
			</div>
			<!-- END OVERVIEW -->
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
<footer>
	<div class="container-fluid">
		<p class="copyright">&copy; 2018 Brought To You By <a href="http://code-projects.org/" target="_blank">Code-Projects</a>.
		</p>
	</div>
</footer>
</div>

<?php
	include('user_footer.php');
?>
