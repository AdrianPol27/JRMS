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

	if (isset($_POST['add_request'])) { // Kung ang add request button tuplokon
		$requisitionerId = $_POST['requisitioner_id'];
		$workOrderNum = $_POST['work_order_num'];
		$location = $_POST['location'];
		$space = $_POST['space'];
		$desc = $_POST['desc'];
		$priority = $_POST['priority'];
		$requestor = $_POST['requestor'];
		$requestedOn = $_POST['requested_on'];
		$requestedCompletion = $_POST['requested_completion'];

		$requestForm = $functions->requestForm($requisitionerId, $workOrderNum, $location, $space, $desc, $priority, $requestor, $requestedOn, $requestedCompletion);

		if ($requestForm) {
			array_push($errorSuccess, "Work request has been added successfully!");
		} else {
			array_push($errors, "An error occured when adding work request!");
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
					<a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addNewRequestModal">Add New Request</a>
					<?php include('../.././errors.php'); ?> 
					<div class="col-12">
						<div class="table-responsive">
							<table id="work-request-table" class="table table-bordered display nowrap w-100">
								<thead>
									<tr>
										<th>ID</th>
										<th>Work Order &num;</th>
										<th>Location</th>
										<th>Space</th>
										<th>Description</th>
										<th>Status</th>
										<th>Priority</th>
										<th>Assigned To</th>
										<th>Requestor</th>
										<th>Requested On</th>
										<th>Requested Completion</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$cnt = 1;
										$fetchRequestForm = $functions->fetchRequestFormUserId($userId);

										if ($fetchRequestForm -> num_rows > 0) {
											while ($row = $fetchRequestForm ->fetch_assoc()) {
									?>

									<tr>
										<td><?= $cnt ?></td>
										<td><?= $row['work_order_num'] ?></td>
										<td><?= $row['location'] ?></td>
										<td><?= $row['space'] ?></td>
										<td><?= $row['description'] ?></td>
										<td>To be added</td>
										<td><?= $row['priority'] ?></td>
										<td>To be added</td>
										<td><?= $row['requestor'] ?></td>
										<td><?= $row['requested_on'] ?></td>
										<td><?= $row['requested_completion'] ?></td>
										<td>
											<a href="#" class="btn btn-info">Edit</a>
											<a href="#" class="btn btn-danger">Delete</a>
										</td>
									</tr>

									<?php $cnt = $cnt + 1; } } ?>
								</tbody>
							</table>
						</div>
					</div>
				</main>
			</div>
		</div>

		<!-- Add new request modal -->
		<form action="" method="post">
			<div class="modal fade" id="addNewRequestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add New Request</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="form-floating">
								<input type="text" name="work_order_num" id="wordOrderNumber" class="form-control mb-2" placeholder="Work Order Number">
								<label for="workOrderNumber">Work Order Number</label>
							</div>
							<div class="d-flex">
								<div class="form-floating w-100 me-1">
									<input type="text" name="location" id="location" class="form-control" placeholder="Location">
									<label for="location">Location</label>
								</div>
								<div class="form-floating w-100 ms-1">
									<input type="text" name="space" id="space" class="form-control" placeholder="Space">
									<label for="space">Space</label>
								</div>
							</div>
							<div class="form-floating my-2">
								<textarea name="desc" id="desc" class="form-control" placeholder="Description" style="height: 150px; resize: none;"></textarea>
								<label for="desc">Description</label>
							</div>
							<div class="form-floating">
								<select name="priority" id="priority" class="form-select">
									<option value="high">High</option>
									<option value="medium">Medium</option>
									<option value="scheduled">Scheduled</option>
								</select>
								<label for="priority">Priority</label>
							</div>

							<!-- Hidden Values -->
							<input type="hidden" name="requisitioner_id" value="<?= $userId ?>">
							<input type="hidden" name="requestor" value="<?= $firstName . ' ' . $middleName . ' ' . $lastName?>">
              <input type='hidden' id="requestedOn" name="requested_on">
              
							<div class="form-floating mt-2">
                <input type='date' class="form-control" id="requestedCompletion" name="requested_completion">
                <label for="requestedCompletion">Requested Completion</label>
              </div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="add_request">Add Request</button>
						</div>
					</div>
				</div>
			</div>
		</form>

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