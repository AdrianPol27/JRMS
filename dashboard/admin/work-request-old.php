<?php

	session_start();

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object
	$errors = array();

	if (isset($_GET['request_id'])) {
		$requestId = $_GET['request_id'];

		$approveRequest = $functions->onProcessRequest($requestId);
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
										<th>Department</th>
										<th>Requested Date</th>
										<th>Requested By</th>
										<th>Work To Be Done</th>
										<th>Quantity</th>
										<th>Unit Cost</th>
										<th>Total Cost</th>
										<th>Labor Needed</th>
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
										<td><?= $row['department'] ?></td>
										<td><?= $row['requested_date'] ?></td>
										<td><?= $row['requested_by'] ?></td>
										<td><?= $row['work_to_be_done'] ?></td>
										<td><?= $row['quantity'] ?></td>
										<td><?= $row['unit_cost'] ?></td>
										<td><?= $row['total_cost'] ?></td>
										<td><?= $row['labor_needed'] ?></td>
										<td><?= $row['completion_date'] ?></td>
										<td><?= $row['status'] ?></td>
										<td>
											<!-- Pending -->
											<?php if ($row['status'] == 'Pending') { ?>
												<a href="work-request.php?request_id=<?= $row['request_id'] ?>" class="btn btn-primary btn-sm w-100 mb-1">Approve</a> <br>
											<?php	} ?>
											<!-- Approved -->
											<?php if ($row['status'] == 'Approved') { ?>
												<a href="update-work-request.php?request_id=<?= $row['request_id'] ?>" class="btn btn-primary btn-sm w-100 mb-1" data-bs-toggle="modal" data-bs-target="#updateModal">Update</a>
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

		<!-- Modal -->
		<div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<form action="">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Update Work Request</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="form-floating mb-1">
								<input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity">
								<label for="quantity">Quantity</label>
							</div>
							<div class="form-floating mb-1">
								<input type="number" name="unit_cost" id="untiCost" class="form-control" placeholder="Unit Cost">
								<label for="unitCost">Unit Cost</label>
							</div>
							<div class="form-floating mb-1">
								<input type="text" name="labor_needed" id="laborNeeded" class="form-control" placeholder="Labor Needed">
								<label for="laborNeeded">Labor Needed</label>
							</div>
							<div class="form-floating">
								<input type="date" name="completion_date" id="completionDate" class="form-control" placeholder="Completion Date">
								<label for="completionDate">Completion Date</label>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Done</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
	$(document).ready( function () {
    $('#work-order-table').DataTable();
} );
</script>
