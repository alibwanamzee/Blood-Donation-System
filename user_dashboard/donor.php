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
			<h2>Welcome, <span style="color: blue"><?php echo $_SESSION['membername']?></span></h2><br />
			<p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddonor">Donate Blood</button></p><br />
		</div>
	</div>

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
							<input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name"></input>
						</div>
						<div class="form-group">
							<select class="form-control" name="gender" id="gender">
								<option value="male">Select Gender</option>
								<option value="female">Female</option>
								<option value="other">Male</option>
							</select>
						</div>
            <div class="form-group">
							<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone"></input>
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
							<select class="form-control" name="city" id="city">
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
				</form>
			</div>
		</div>
	</div>
	<!-- end of add donor modal -->

	<?php
		include('user_footer.php');
	?>
</div>
