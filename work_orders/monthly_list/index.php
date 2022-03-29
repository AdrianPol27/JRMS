<!DOCTYPE html>
<html>
	<head>
		<title>Monthly List of Work Orders</title>
		<?php require "../../require_files.php"?>
		<link rel="stylesheet" type="text/css" href="/css/monthly_list.css">
	</head>	
	<body>	
		<div class="d-flex d-wrap fluid-container">
			<?php require "../../nav.php"?>
			<div class="fluid-container col-8">
				<table class="table table-success table-striped table-hover">
					<thead>
						<tr>
							<th colspan="6">Monthly Lists of Work Order Requests</th>
						</tr>
						<tr>
							<th>MONTH</th>
							<th>WORK ORDER #</th>
							<th>LOCATION</th>
							<th>DEPARTMENT</th>
							<th>UNIT</th>
							<th>STATUS</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>3/13/22</td>
							<td>385</td>
							<td>Duplex</td>
							<td></td>
							<td>Ref and aircon unit</td>
							<td>Completed</td>
						</tr>
						<tr>
							<td>3/14/22</td>
							<td>386</td>
							<td>Engineering</td>
							<td>Department of Engineering</td>
							<td>Plumbing and sewerage unit</td>
							<td>Pending</td>
						</tr>
						<tr>
							<td>3/15/22</td>
							<td>387</td>
							<td>CMU Campus</td>
							<td>Department of Veterinary Medicine</td>
							<td>
							<td>Pending</td>
						</tr>
					</tbody>
				</table>
				<!-- Make Content Here -->
			</div>
		</div>
	</body>
</html>