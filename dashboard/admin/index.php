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

    if (isset($_GET['request_id'])) {
		$requestId = $_GET['request_id'];
		$onProcessRequest = $functions->onProcessRequest($requestId);
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

    <title>Admin - Dashboard</title>

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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="feedback.php">
                <i class="fas fa-fw fa-comment"></i>
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span>Feedback</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user.php">
                <i class="fas fa-fw fa-comment"></i>
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span>User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="unit.php">
                <i class="fas fa-fw fa-comment"></i>
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span>Units</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="college.php">
                <i class="fas fa-fw fa-comment"></i>
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span>College</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="department.php">
                <i class="fas fa-fw fa-comment"></i>
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span>Department</span>
                </a>
            </li>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <button class="btn btn-lg w-100" id="pending">
                            <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Pending
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $fetchRequestPending = $functions->fetchRequestPending();
                                                        $rowcount = mysqli_num_rows($fetchRequestPending);
                                                        printf($rowcount);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <button class="btn btn-lg w-100" id="onProcess">
                            <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    On-Process
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $fetchRequestOnProcess = $functions->fetchRequestOnProcess();
                                                        $rowcount = mysqli_num_rows($fetchRequestOnProcess);
                                                        printf($rowcount);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <button class="btn btn-lg w-100" id="done">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    
                                                    Done
                                                </div>
                                               
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $fetchRequestDone = $functions->fetchRequestDone();
                                                        $rowcount = mysqli_num_rows($fetchRequestDone);
                                                        printf($rowcount);
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>

                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
                            <button class="btn btn-lg w-100" id="cancelled">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Cancelled
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $fetchRequestCancelled = $functions->fetchRequestCancelled();
                                                        $rowcount = mysqli_num_rows($fetchRequestCancelled);
                                                        printf($rowcount);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>

                    </div>
                    <!-- Content Row -->

				    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-between">

                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#generateModal">Generate Monthly List</a>
                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#generateDateModal">Generate By Date</a>
                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#generateStatusModal">Generate By Status</a>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Request Id</th>
                                            <th>Job Order #</th>
                                            <th>Unit</th>
                                            <th>College</th>
                                            <th>Department</th>
                                            <th>Requested Date</th>
                                            <th>Month</th>
                                            <th>Requested By</th>
                                            <th>Work To Be Done</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Total Cost</th>
                                            <th>Labor Needed</th>
                                            <th>Completion Date</th>
                                            <th>To Be Done Outside</th>
                                            <th>Status</th>
                                            <th>Days Done</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $fetchRequestForm = $functions->fetchRequestForm();
                                            while($row = mysqli_fetch_array($fetchRequestForm)) {
                                        ?>
                                        <tr>
                                            <td><?= $row['request_id'] ?></td>
                                            <td><?= $row['job_order_number'] ?></td>
                                            <td><?= $row['unit'] ?></td>
                                            <td><?= $row['college'] ?></td>
                                            <td><?= $row['department'] ?></td>
                                            <td><?= $row['requested_date'] ?></td>
                                            <td><?= $row['requested_month'] ?></td>
                                            <td><?= $row['requested_by'] ?></td>
                                            <td><?= $row['work_to_be_done'] ?></td>
                                            <td><?= $row['quantity'] ?></td>
                                            <td><?= $row['unit_cost'] ?></td>
                                            <td><?= $row['total_cost'] ?></td>
                                            <td><?= $row['labor_needed'] ?></td>
                                            <td><?= $row['completion_date'] ?></td>
                                            <td><?= $row['outside'] ?></td>
                                            <td>
                                                <?php
                                                    if ($row['status'] == 'Cancelled') {
                                                        echo '<p class="text-danger">Cancelled</p>';
                                                    }
                                                    if ($row['status'] == 'On-Process') {
                                                        echo '<p class="text-info">On-Process</p>';
                                                    } 
                                                    if ($row['status'] == 'Done') {
                                                        echo '<p class="text-success">Cancelled</p>';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($row['status'] == 'Done') {
                                                        echo $row['days_done'];
                                                    } else {
                                                        echo 'Computing';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($row['status'] == 'Cancelled') { ?>
                                                    <button class="btn btn-danger w-100" disabled>Cancel</button>
                                                <?php } ?>
                                                <!-- Pending -->
                                                <?php if ($row['status'] == 'Pending') { ?>
                                                    <a href="index.php?request_id=<?= $row['request_id'] ?>" class="btn btn-primary btn-sm w-100 mb-1">Process</a> <br>
                                                    <a href="cancel-request.php?request_id=<?= $row['request_id'] ?>" class="btn btn-danger btn-sm w-100 mb-1" onclick="myFunction()"> Cancel</a>
                                                <?php } ?>
                                                <!-- Approved -->
                                                <?php if ($row['status'] == 'On-Process') { ?>
                                                    <a href="update-request.php?request_id=<?= $row['request_id'] ?>&unit=<?= $row['unit'] ?>&unit_head=<?= $row['unit_head'] ?>&outside=<?= $row['outside'] ?>&from_date=<?= $row['requested_date'] ?>" class="btn btn-primary btn-sm w-100 mb-1">Update</a>
                                                    <a href="download.php?request_id=<?= $row['request_id'] ?>" class="btn btn-primary btn-sm w-100 mb-1" id="download" target="blank">Download</a>
                                                    <script>
                                                        document.getElementById("download").click();
                                                    </script>
                                                <?php } ?>
                                                <!-- Done -->
                                                <?php if ($row['status'] == 'Done') { ?>
                                                    <a href="download-final.php?request_id=<?= $row['request_id'] ?>" class="btn btn-primary btn-sm w-100 mb-1" id="download" target="blank">Download</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Work Request</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-floating mb-1">
                            <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity">
                        </div>
                        <div class="form-floating mb-1">
                            <input type="number" name="unit_cost" id="untiCost" class="form-control" placeholder="Unit Cost">
                        </div>
                        <div class="form-floating mb-1">
                            <input type="text" name="labor_needed" id="laborNeeded" class="form-control" placeholder="Labor Needed">
                        </div>
                        <div class="form-floating">
                            <input type="date" name="completion_date" id="completionDate" class="form-control" placeholder="Completion Date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button  class="btn btn-primary" type="submit">Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="generateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generate Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <form action="generate.php" method="post" target="blank">
                    <div class="modal-body">On which month do you want to generate?
                        <select name="month" id="" class="form-control">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>                
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="generateDateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generate Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <form action="generate-date.php" method="post" target="blank">
                    <div class="modal-body">Select from to date to generate
                        <div class="form-floating">
                            From Date
                            <input type="date" name="from_date" class="form-control" placeholder="From Date">
                        </div>
                        <div class="form-floating">
                            To Date
                            <input type="date" name="to_date" class="form-control" placeholder="To Date">
                        </div>
                    </div>                
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="generateStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generate Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <form action="generate-status.php" method="post" target="blank">
                    <div class="modal-body">Select status to generate
                        <div class="form-floating">
                            <select name="status" class="form-control">
                                <option value="Pending">Pending</option>
                                <option value="On-Process">On-Process</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>
                    </div>                
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
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

        $("#pending").click(function(e){
            dataTable.search("Pending").draw();
        });
        $("#onProcess").click(function(e){
            dataTable.search("On-Process").draw();
        });
        $("#done").click(function(e){
            dataTable.search("Done").draw();
        });
        $("#cancelled").click(function(e){
            dataTable.search("Cancelled").draw();
        });

        // Monthly List
        $("#January").click(function(e){
            dataTable.search("January").draw();
        });
        $("#February").click(function(e){
            dataTable.search("February").draw();
        });
        $("#March").click(function(e){
            dataTable.search("March").draw();
        });
        $("#April").click(function(e){
            dataTable.search("April").draw();
        });
        $("#May").click(function(e){
            dataTable.search("May").draw();
        });
        $("#June").click(function(e){
            dataTable.search("June").draw();
        });
        $("#July").click(function(e){
            dataTable.search("July").draw();
        });
        $("#August").click(function(e){
            dataTable.search("August").draw();
        });
        $("#September").click(function(e){
            dataTable.search("September").draw();
        });
        $("#October").click(function(e){
            dataTable.search("October").draw();
        });
        $("#November").click(function(e){
            dataTable.search("November").draw();
        });
        $("#December").click(function(e){
            dataTable.search("December").draw();
        });
        
        function myFunction() {
            alert("Work request has been deleted!");
        }
    </script>

</body>

</html>
