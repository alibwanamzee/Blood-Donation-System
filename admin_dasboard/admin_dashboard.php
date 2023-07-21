<?php
	include('../header.php');
?>

	<!-- END LEFT SIDEBAR -->
	<!-- MAIN -->
	<div class="main">
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<!-- OVERVIEW -->
				<div class="panel panel-headline">
					<div class="panel-heading">
						<h3 class="panel-title"><b>System Management</b></h3>
						<p class="panel-subtitle">Period: July 04, 2023 - <?php $currentDate = date('F d, Y');echo $currentDate;?></p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<div class="metric">
									<span class="icon"><i class="fa fa-map"></i></span>
									<p>
										<span class="number">
											<?php
												$num_states= $connection->query("SELECT COUNT(*) AS num_states FROM state");
												while($row = $num_states->fetch_array()) {
												 echo $row['num_states'];	
												}
											?></span>
										<span class="title">States</span>
									</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="metric">
									<span class="icon"><i class="fa fa-home"></i></span>
									<p>
										<span class="number">
										<?php
											$num_cities= $connection->query("SELECT COUNT(*) AS num_cities FROM city");
											while($row = $num_cities->fetch_array()) {
												echo $row['num_cities'];	
											}
										?>
										</span>
										<span class="title">Cities</span>
									</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="metric">
									<span class="icon"><i class="fa fa-user-md"></i></span>
									<p>
										<span class="number">
										<?php
												$num_users= $connection->query("SELECT COUNT(*) AS num_users FROM users");
												while($row = $num_users->fetch_array()) {
												 echo $row['num_users'];	
												}
											?>
										</span>
										<span class="title">Users</span>
									</p>
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-9">
								<div id="headline-chart" class="ct-chart"></div>
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
				<p class="copyright">&copy; 2023.</p>
			</div>
		</footer>
	</div>

	<?php
	include('../footer.php');
	?>