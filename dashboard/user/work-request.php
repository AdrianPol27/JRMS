<?php

	session_start();

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object

	if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
  }
  if (isset($_SESSION['first_name'])) {
    $firstName = $_SESSION['first_name'];
  }
	if (isset($_SESSION['middle_name'])) {
    $middleName = $_SESSION['middle_name'];
  }
  if (isset($_SESSION['last_name'])) {
    $lastName = $_SESSION['last_name'];
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
								<a class="nav-link active" href="work-request.php">
									Work Request
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
						<h1>Work Request</h1>
					</div>
					<a href="add-new-request.php" class="btn btn-primary mb-3">Add New Request</a>
					<?php include('../.././errors.php'); ?> 
					<div class="col-12">
						<div class="table-responsive">
							<table id="work-request-table" class="table table-bordered display nowrap w-100">
								<thead>
									<tr>
										<th>ID</th>
										<th>Department</th>
										<th>Requested Date</th>
										<th>Completion Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$cnt = 1;
										$fetchRequestUserId = $functions->fetchRequestUserId($userId);
										while($row = mysqli_fetch_array($fetchRequestUserId)) {
									?>

									<tr>
										<td><?= $cnt ?></td>
										<td><?= $row['department'] ?></td>
										<td><?= $row['requested_date'] ?></td>
										<td><?= $row['completion_date'] ?></td>
										<td><?= $row['status'] ?></td>
										<td>
											<?php
												if ($row['status'] == 'Approved') { ?>
												<button class="btn btn-danger w-100" disabled>Cancel</button>
											<?php	} else { ?>
												<form action="cancel-request.php" method="post">
													<input type="hidden" name="request_id" value="<?= $row['request_id'] ?>">
													<input type="hidden" name="file" value="<?= $row['destination'] ?>">
												
													<button type="submit" class="btn btn-danger w-100" name="cancel_btn">Cancel</button>
												</form>
											<?php } ?>
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
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Add New Request</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-floating">
									<input type="text" name="department" id="department" class="form-control" placeholder="Department">
									<label for="department">Department</label>
								</div>
								<div class="card mt-2">
									<div class="card-header">
										<h6 class="m-0">Nature of Work</h6>
									</div>
									<div class="card-body">
										<div class="form-floating">
											<input type="text" name="work_to_be_done" id="workToBeDone" class="form-control mt-1" placeholder="Work To Be Done">
											<label for="workToBeDone">Work To Be Done</label>
										</div>
										<div class="d-flex">
											<div class="form-floating me-1 w-50">
												<input type="number" name="qty" id="qty" class="form-control mt-1" placeholder="Quantity">
												<label for="qty">Quantity</label>
											</div>
											<div class="form-floating w-50">
												<input type="number" name="unit_cost" id="unitCost" class="form-control mt-1" placeholder="Unit Cost">
												<label for="unitCost">Unit Cost</label>
											</div>
										</div>
										<div class="form-floating mt-1">
											<input type="number" name="total_cost" id="totalCost" class="form-control mt-1" placeholder="Total Cost">
											<label for="totalCost">Total Cost</label>
										</div>
										<div class="form-floating mt-1">
											<input type="text" name="labor_needed" id="laborNeeded" class="form-control mt-1" placeholder="Labor Needed">
											<label for="laborNeeded">Labor Needed</label>
										</div>
									</div>
								</div>
							</div>
						</div>
	
						
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Understood</button>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>

<script>
	$(document).ready( function () {
    $('#work-request-table').DataTable();
	});

	// Display Current Date
	let today = new Date().toISOString().substr(0, 10);
  document.querySelector("#requestedOn").value = today; // Requested on
	document.querySelector("#requestedCompletion").value = today; // Requested completion

</script>