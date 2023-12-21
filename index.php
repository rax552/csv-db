<!DOCTYPE html>
<?php 
	include 'db.php';
?>	
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Import Excel To MySQL Database Using PHP </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Import Excel File To MySql Database Using php">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">


	</head>
	<body>    

	<!-- Navbar
    ================================================== -->

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Import Excel To MySQL Database Using PHP</a>
				
			</div>
		</div>
	</div>

	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<form class="form-horizontal well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file</legend>
						<div class="control-group">
							<div class="control-label">
								<label>CSV/Excel File:</label>
							</div>
							<div class="controls">
								<input type="file" name="file" id="file" class="input-large">
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="span3 hidden-phone"></div>
		</div>
		

		<table class="table table-bordered">
			<thead>
					<tr>
						<th>Branch Name Serial </th>
						<th>BRNP</th>
						<th>Customer Name</th>
						<th>Nature of Advance</th>
						<th>CL</th>
						<th>BCL</th>
						<th>LMTAMP</th>
						<th>Outstanding</th>
						<th>Eligible Sec</th>
						<th>Interest Sus</th>
						<th>Required Provision</th>
						<th>Base for Provision</th>
					</tr>

				  </thead>
			<?php
				$SQLSELECT = "SELECT * FROM subject ";
				$result_set =  mysqli_query($conn, $SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
			
					<tr>
						
						<td><?php echo $row['branch']; ?></td>
						<td><?php echo $row['brnp']; ?></td>
						<td><?php echo $row['customer_name']; ?></td>
						<td><?php echo $row['nature_of_advance']; ?></td>
						<td><?php echo $row['cl']; ?></td>
						<td><?php echo $row['bcl']; ?></td>
						<td><?php echo $row['lmtamp']; ?></td>
						<td><?php echo $row['outstanding']; ?></td>
						<td><?php echo $row['eligible_sec']; ?></td>
						<td><?php echo $row['interest_sus']; ?></td>
						<td><?php echo $row['required_provision']; ?></td>
						<td><?php echo $row['base_for_provision']; ?></td>
					</tr>

				<?php
				}
			?>
		</table>
	</div>

	</div>

	</body>
</html>