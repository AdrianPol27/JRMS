
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

					<div class="col-12 pb-3">
						<div class="card">
							<div class="card-header">
								<h5 class="m-0">Total Work Order</h5>
							</div>
							<div class="card-body">
								<div class="col-lg-3">
									<div class="form-floating">
										<select id="sort-by" class="form-select">
											<option value="">Year</option>
											<option value="">Month</option>
											<option value="">Week</option>
										</select>
										<label for="sort-by"> Sort By</label>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<!-- Pending -->
						<div class="col-lg-3 col-md-4 col-sm-6 my-1 my-lg-0 text-center">
							<div class="card bg-warning">
								<div class="card-header">Pending</div>
								<div class="card-body">
									<h1 class="display-4">0</h1>
								</div>
							</div>
						</div>
						<!-- Ongoing -->
						<div class="col-lg-3 col-md-4 col-sm-6 my-1 my-lg-0 text-center">
							<div class="card bg-info">
								<div class="card-header">Ongoing</div>
								<div class="card-body">
									<h1 class="display-4">0</h1>
								</div>
							</div>
						</div>
						<!-- Rejected -->
						<div class="col-lg-3 col-md-4 col-sm-6 my-1 my-lg-0 text-center">
							<div class="card bg-danger text-white">
								<div class="card-header">Rejected</div>
								<div class="card-body">
									<h1 class="display-4">0</h1>
								</div>
							</div>
						</div>
						<!-- Completed -->
						<div class="col-lg-3 col-md-4 col-sm-6 my-1 my-lg-0 text-center">
							<div class="card bg-success text-white">
								<div class="card-header">Completed</div>
								<div class="card-body">
									<h1 class="display-4">0</h1>
								</div>
							</div>
						</div>
					</div>
					
				</main>
			</div>
		</div>
	</body>
</html>
