<?php

	session_start();

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object
	$errors = array();

	if (isset($_GET['request_id'])) {
		$requestId = $_GET['request_id'];

		$approveRequest = $functions->approveRequest($requestId);
		if ($approveRequest) {
			array_push($errorSuccess, "Request Has Been Approved!");
		}

	}

?>
<!doctype html>
<html lang="en">
	<head>
    <?php include ('../.././includes/header.php') ?>
    <title>Dashboard</title>
	</head>
  <body>
    
		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">JRMS</a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
			<div class="navbar-nav">
				<div class="nav-item text-nowrap">
					<a class="nav-link px-3" href="../.././logout.php">Sign out</a>
				</div>
			</div>
		</header>

		<div class="container-fluid">
			<div class="row">
				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
					<div class="position-sticky pt-3">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link" aria-current="page" href="index.php">
									Dashboard
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="work-order.php">
									Work Order
								</a>
							</li>
						</ul>

						<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
							<span>Account</span>
						</h6>
						
						<ul class="nav flex-column mb-2">
							<li class="nav-item">
								<a class="nav-link" href="#">
									<span data-feather="file-text"></span>
									Current month
								</a>
							</li>
						</ul>
					</div>
				</nav>

				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">Work Order</h1>
					</div>

					<?php include('../.././errors.php'); ?>  
					<div class="col-12">
						<div class="table-responsive">
							<table id="work-order-table" class="table table-bordered display nowrap w-100">
								<thead class="text-center">
									<tr>
										<th>ID</th>
										<th>Requested By</th>
										<th>Department</th>
										<th>Requested Date</th>
										<th>Completion Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody class="text-center">
									<?php
										$cnt = 1;
										$fetchRequestForm = $functions->fetchRequestForm();
										while($row = mysqli_fetch_array($fetchRequestForm)) {
									?>
									<tr>
										<td><?= $cnt ?></td>
										<td><?= $row['requested_by'] ?></td>
										<td><?= $row['department'] ?></td>
										<td><?= $row['requested_date'] ?></td>
										<td><?= $row['completion_date'] ?></td>
										<td><?= $row['status'] ?></td>
										<td>
											<a href="<?= $row['destination'] ?>" class="btn btn-info btn-sm w-100 mb-1">View</a> <br>
											<a href="work-order.php?request_id=<?= $row['request_id'] ?>" class="btn btn-primary btn-sm w-100 mb-1">Approve</a> <br>
											<?php if ($row['status'] == 'Approved') { ?>
												<a href="download.php?request_id=<?= $row['request_id'] ?>" class="btn btn-secondary btn-sm w-100">Download</a>
											<?php	} ?>
										</td>
									</tr>
									<?php $cnt=$cnt+1;} ?>
								</tbody>
							</table>
						</div>
					</div>
				</main>
			</div>
		</div>
	</body>
</html>

<script>
	$(document).ready( function () {
    $('#work-order-table').DataTable();
} );
</script>
