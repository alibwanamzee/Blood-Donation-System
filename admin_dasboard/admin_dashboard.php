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
						<p class="panel-subtitle">Period: July 14, 2023 - <?php $currentDate = date('F d, Y');echo $currentDate;?></p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<div class="metric">
									<span class="icon"><i class="fa fa-map"></i></span>
									<p>
										<span class="title">0</span>
										<span class="number">States</span>
									</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="metric">
									<span class="icon"><i class="fa fa-home"></i></span>
									<p>
										<span class="title">0</span>
										<span class="number">Cities</span>
									</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="metric">
									<span class="icon"><i class="fa fa-user-md"></i></span>
									<p>
										<span class="title">0</span>
										<span class="number">Doctors</span>
									</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="metric">
									<span class="icon"><i class="fa fa-heartbeat"></i></span>
									<p>
										<span class="title">0</span>
										<span class="number">Donors</span>
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