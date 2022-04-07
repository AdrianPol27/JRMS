<?php

	session_start();

	include_once("../.././functions.php"); // Include functions.php
  $functions = new Functions(); // Create function object
  $errors = array();
	$errorSuccess = array();

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

	if (isset($_POST['submit'])) {
		$requestedBy = $firstName . ' ' . $middleName . ' ' . $lastName;
		$department = $_POST['department'];
		$requestedDate = date('Y-m-d');
		$completionDate = $_POST['completion_date'];
		$file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName); 
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('doc', 'docx', 'pdf');

		if (empty($department)) {
			array_push($errors, "Department should not be empty!");
		}
		if (empty($completionDate)) {
			array_push($errors, "Completion date should not be empty!");
		}
    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        $fileNewName = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = '../.././assets/files/uploads/' . $fileNewName;
        $documentNewName = $fileNewName;
        $sql = $functions->requestForm($fileDestination, $requestedBy, $department, $requestedDate, $completionDate);
        if ($sql) {
          move_uploaded_file($fileTmpName, $fileDestination);
          array_push($errorSuccess, "Request Successfully Submitted!");
        }
      } else {
        array_push($errors, "There was an error uploading your request!");
      }
    } else {
      array_push($errors, "You cannot upload file of this type!");
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
								<a class="nav-link active" aria-current="page" href="index.php">
									Dashboard
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="work-request.php">
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
						<h1>Dashboard</h1>
					</div>

					<div class="row">
						<?php include('../.././errors.php'); ?>  
						<div class="col-lg-6">
							<div class="card">
								<div class="card-body">
									<p>Download description</p>
								</div>
								<div class="card-footer">
									<a href="../.././assets/files/forms/GSO-SAMPLE-FORM.docx" class="btn btn-primary w-100">Download</a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<form action="index.php" method="post" enctype="multipart/form-data">
								<input type="hidden" name="requested_by" value="<?= $firstName . ' ' . $middleName . ' ' . $lastName ?>">
								<div class="card">
									<div class="card-body">
										<p>Upload description</p>
										<input type="file" class="form-control" id="file-document" name="file" placeholder="File">
										<div class="form-floating my-2">
											<input type="text" class="form-control" id="department" name="department" placeholder="Department">
											<label for="department">Department</label>
										</div>
										<div class="form-floating">
											<input type="date" class="form-control" id="completionDate" name="completion_date">
											<label for="completionDate">Completion Date</label>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" class="btn btn-primary w-100" name="submit">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</main>
			</div>
		</div>
	</body>
</html>