<?php

	session_start();

  include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object
	$errors = array();

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

	// Add work
	if (isset($_POST['add_work'])) {
		$department = $_POST["department"];
		$workToBeDone = $_POST["work_to_be_done"];

		if (empty($department)) {
      array_push($errors, "Department should not be empty!"); // Mag push og error kung empty ang username
    }
		if (empty($workToBeDone)) {
      array_push($errors, "Work To Be Done should not be empty!"); // Mag push og error kung empty ang username
    }
		else {
			if (!empty($department) && !empty($workToBeDone)) {
				$addWork = $functions->addWork($userId, $department, $workToBeDone);
				if ($addWork) {
					array_push($errorSuccess, "Work added successfully!");
				}
			}
		}
	}

	// Submit Work
	if (isset($_POST['submit_work'])) {
		$department = $_POST["department"];
		$requestedDate = $_POST["requested_date"];
		$work = []; // Create items as an array
		$allWork = ''; // Set default value for all work
		$totalCost = '0'; 

		// CONCAT ORDER INFO
		$fetchWorkInfo = $functions->fetchWorkInfo($userId);
		while ($row = $fetchWorkInfo->fetch_assoc()) {
			$totalCost += $row['total_cost'];
			$work[] = $row['works'];
		}
		$allWork = implode(', ', $work);

		$submitRequest = $functions->submitRequest($userId, $allWork, $firstName, $lastName, $department, $requestedDate);
		if ($submitRequest) {
			array_push($errorSuccess, "Request submitted successfully!");
			$removeWork = $functions->removeWork($userId);
			header("Location: work-request.php");
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

					<?php include('../.././errors.php'); ?> 
		
					<div class="row">
						<div class="col-lg-5">
							<form action="add-new-request.php" method="post">
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
										<button type="submit" class="mt-1 btn btn-primary w-100" name="add_work">Add Work</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-lg-7">
							<form action="add-new-request.php" method="post">
								<div class="card">
									<div class="card-header">
										<h6 class="m-0">Work To Be Done</h6>
									</div>
									<div class="card-body">
										<table class="table">
											<div class="table-responsive">
												<thead>
													<th>ID</th>
													<th>Work</th>
													<th>Action</th>
												</thead>
												<tbody>
													<?php
														$cnt = 1;
														$fetchWorkUserId = $functions->fetchWorkUserId($userId);
														while($row = mysqli_fetch_array($fetchWorkUserId)) {
													?>
													<tr>
														<td><?= $cnt ?></td>
														<td><?= $row['work_to_be_done'] ?></td>
														<td>
															<a href="delete-work.php?work_id=<?= $row['work_id'] ?>" class="btn btn-danger btn-sm w-100">Delete</a>
														</td>
													</tr>
													
													<?php 
															$cnt=$cnt+1; 
															$workToBeDone = $row['work_to_be_done'];
															$department = $row['department'];
														} 
													?>
												</tbody>
											</div>
										</table>
									</div>
									<input type="hidden" name="department" value="<?= $department ?>">
									<input type="hidden" name="requested_date" id="requestedDate">
								</div>
								<?php 
									if (empty($workToBeDone)) {
										echo "<button class='btn btn-primary mt-1 w-100' disabled>Submit</button>";
									} else {
										echo "<button type='submit' class='btn btn-primary mt-1 w-100' name='submit_work'>Submit</button>";
									}
								?>
							</form>
						</div>
					</div>
			
				</main>
			</div>
		</div>

	</body>
</html>

<script>
	$(document).ready( function () {
    $('#work-request-table').DataTable();

		// Display Current Date
		let today = new Date().toISOString().substr(0, 10);
		document.querySelector("#requestedDate").value = today; // Requested date
		document.querySelector("#requestedCompletion").value = today; // Requested completion

	});



</script>