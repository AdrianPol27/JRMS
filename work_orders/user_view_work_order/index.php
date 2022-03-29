<!DOCTYPE html>
<html>
	<head>
		<title>New Work Orders</title>
		<?php require "../../require_files.php" ?>
		<link rel="stylesheet" type="text/css" href="/css/user_view.css">
	</head>
	<body>	
		<div class="d-flex flex-wrap fluid-container">
			<?php require "../../nav.php" ?>
			<div class="fluid-container col-8" id="table_container">
				<!--<div>
					<table class="table table-success table-striped table-hover">
						<thead>
							<tr>
								<th colspan="9">New Work Order Requests</th>
							</tr>
							<tr>
								<th>WORK ORDER #</th>
								<th>LOCATION</th>
								<th>DEPARTMENT</th>
								<th>UNIT</th>
								<th>DESCRIPTION</th>
								<th>REQUISITIONER</th>
								<th>PRIORITY</th>
								<th>DATE</th>
								<th>STATUS</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>385</td>
								<td>Duplex</td>
								<td></td>
								<td>Ref and aircon unit</td>
								<td>Aircon malfunction</td>
								<td>Johhny Bravo</td>
								<td>Medium</td>
								<td>3/15/22</td>
								<td>Completed</td>
							</tr>
							<tr>
								<td>386</td>
								<td>Engineering</td>
								<td>Department of Engineering</td>
								<td>Plumbing and sewerage unit</td>
								<td>Clogged toilets</td>
								<td>Charles Angel</td>
								<td>Scheduled</td>
								<td>3/15/22</td>
								<td>Pending</td>
							</tr>
							<tr>
								<td>387</td>
								<td>CMU Campus</td>
								<td>Department of Veterinary Medicine</td>
								<td></td>
								<td>Clean restrooms</td>
								<td>Coleen Garcia</td>
								<td>Scheduled</td>
								<td>3/15/22</td>
								<td>Pending</td>
							</tr>
						</tbody>
					</table>
					Make Content Here -->
					<h5>New Work Order Requests</h5>
					<table class="table text-center text-capitalize" id="req_table">
						<thead>
							<tr>
								<th>#</th>
								<th>Req. College</th>
								<th>Unit Required</th>
								<th>Date Requested</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><a href="#">1</a></td>
								<td>COE</td>
								<td>Plumbing unit</td>
								<td>March 04, 2022</td>
								<td>Pending</td>
								<td class="d-flex flex-wrap justify-content-center">
									<a href="" class="btn view_button">View</a>
								</td>	
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>