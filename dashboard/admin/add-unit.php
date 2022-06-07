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

	//Update Request
	if (isset($_POST['add_unit'])) {

		$unitName = $_POST['unit_name'];
		$unitHead = $_POST['unit_head'];

		if (empty($unitName)) {
			array_push($errors, "Unit Name should not be empty!");
		}
		if (empty($unitHead)) {
			array_push($errors, "Unit Head should not be empty!");
		} else {
				$addUnit = $functions->addUnit($unitName, $unitHead);
				if ($addUnit) {
					header("Location: unit.php");
				}
			}
	}
	
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin - Create Unit</title>

	<!-- Custom fonts for this template-->
	<link href="../.././vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="../.././css/sb-admin-2.min.css" rel="stylesheet">
	
	<!-- Custom styles for this page -->
	<link href="../.././vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

			<!-- Sidebar -->
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

					<!-- Sidebar - Brand -->
					<a class="sidebar-brand d-flex align-items-center justify-content-center">
							<div class="sidebar-brand-icon rotate-n-15">
									<i class="fas fa-laugh-wink"></i>
							</div>
							<div class="sidebar-brand-text mx-3">ADMIN</div>
					</a>

					<!-- Divider -->
					<hr class="sidebar-divider my-0">

					<!-- Nav Item - Dashboard -->
					<li class="nav-item">
							<a class="nav-link" href="index.php">
									<i class="fas fa-fw fa-tachometer-alt"></i>
									<span>Dashboard</span>
							</a>
					</li>
					<li class="nav-item">
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
									aria-expanded="true" aria-controls="collapseTwo">
									<i class="fas fa-fw fa-table"></i>
									<span>Work Request</span>
							</a>
							
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
									<div class="bg-white py-2 collapse-inner rounded">
											<a class="collapse-item" href="work-request.php">Manage Request</a>
									</div>
							</div>
					</li>
					<li class="nav-item">
                		<a class="nav-link" href="feedback.php">
							<i class="fas fa-fw fa-tachometer-alt"></i>
							<span>Feedback</span>
						</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="unit.php">
						<i class="fas fa-fw fa-comment"></i>
							<!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
							<span>Units</span>
						</a>
					</li>

					<!-- Divider -->
					<hr class="sidebar-divider">

					<!-- Heading -->
					<div class="sidebar-heading">
							Account
					</div>

			</ul>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

					<!-- Main Content -->
					<div id="content">

							<!-- Topbar -->
							<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

									<!-- Sidebar Toggle (Topbar) -->
									<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
											<i class="fa fa-bars"></i>
									</button>

									<!-- Topbar Search -->
									<form
											class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
											<div class="input-group">
													<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
															aria-label="Search" aria-describedby="basic-addon2">
													<div class="input-group-append">
															<button class="btn btn-primary" type="button">
																	<i class="fas fa-search fa-sm"></i>
															</button>
													</div>
											</div>
									</form>

									<!-- Topbar Navbar -->
									<ul class="navbar-nav ml-auto">

											<!-- Nav Item - Search Dropdown (Visible Only XS) -->
											<li class="nav-item dropdown no-arrow d-sm-none">
													<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
															data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="fas fa-search fa-fw"></i>
													</a>
													<!-- Dropdown - Messages -->
													<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
															aria-labelledby="searchDropdown">
															<form class="form-inline mr-auto w-100 navbar-search">
																	<div class="input-group">
																			<input type="text" class="form-control bg-light border-0 small"
																					placeholder="Search for..." aria-label="Search"
																					aria-describedby="basic-addon2">
																			<div class="input-group-append">
																					<button class="btn btn-primary" type="button">
																							<i class="fas fa-search fa-sm"></i>
																					</button>
																			</div>
																	</div>
															</form>
													</div>
											</li>

											<div class="topbar-divider d-none d-sm-block"></div>

											<!-- Nav Item - User Information -->
											<li class="nav-item dropdown no-arrow">
													<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
															data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
															<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $firstName . ' ' . $lastName?></span>
													</a>
													<!-- Dropdown - User Information -->
													<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
															aria-labelledby="userDropdown">
															<!-- <a class="dropdown-item" href="#">
																	<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
																	Profile
															</a>
															<a class="dropdown-item" href="#">
																	<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
																	Settings
															</a>
															<a class="dropdown-item" href="#">
																	<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
																	Activity Log
															</a> -->
															<div class="dropdown-divider"></div>
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
																	<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
																	Logout
															</a>
													</div>
											</li>

									</ul>

							</nav>
							<!-- End of Topbar -->

							<!-- Begin Page Content -->
							<div class="container-fluid">

								<!-- Page Heading -->
								<div class="d-sm-flex align-items-center justify-content-center mb-4">
									<h1 class="h3 mb-0 text-gray-800">Add Unit</h1>
								</div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-6">
										<?php include('../../errors.php') ?>
										<form action="add-unit.php" method="post">
											<div class="card mt-2">
												<div class="card-header">
													<h6 class="m-0">Add Unit</h6>
												</div>
												<div class="card-body">
													<div class="form-floating mb-1">
														<strong>Unit Name:</strong>
														<input type="text" name="unit_name" class="form-control" placeholder="Enter Unit Name">
													</div>
													<div class="form-floating mb-1 mt-2">
														<strong>Unit Head:</strong>
														<input type="text" name="unit_head" class="form-control" placeholder="Enter Unit Head">
													</div>
													<button type="submit" class="mt-1 btn btn-primary w-100" name="add_unit">Add Unit</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								

							</div>
							<!-- /.container-fluid -->

					</div>
					<!-- End of Main Content -->

					<!-- Footer -->
					<footer class="sticky-footer bg-white">
							<div class="container my-auto">
									<div class="copyright text-center my-auto">
											<span>Copyright &copy; Your Website 2022</span>
									</div>
							</div>
					</footer>
					<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
					<div class="modal-content">
							<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
									</button>
							</div>
							<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
							<div class="modal-footer">
									<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
									<a class="btn btn-primary" href="../.././logout.php">Logout</a>
							</div>
					</div>
			</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="../.././vendor/jquery/jquery.min.js"></script>
	<script src="../.././vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../.././vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../.././js/sb-admin-2.min.js"></script>
	
	<!-- Page level plugins -->
	<script src="../.././vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="../.././vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="../.././js/demo/datatables-demo.js"></script>

	<script>
		var dataTable = $('#dataTable').DataTable({});

		$("#onProcess").click(function(e){
			dataTable.search("On-Process").draw();
		});
	</script>

</body>

</html>

<script>
	$(document).ready( function () {

		// Display Current Date
		let today = new Date().toISOString().substr(0, 10);
		document.querySelector("#requestedDate").value = today; // Requested date

	});

</script>