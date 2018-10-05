<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
	include('header.php');
?>
<?php
	include('sidebar.php');
?>
<?php
	include('connection.php');
?>
<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Order Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
      </ol>
    </section>
	<div class="box box-default">
        <div class="box-header with-border">
			<!-- /.box-header -->
			<div id="btn">
				<?php if($_SESSION['role']=='1'){?>
				<div class="connectedSortable">
					<div class="row">
						<div class="col-md-3">
							<input id='order' type='button' class="btn btn-primary" onclick="upload('order')" value='Order' />
						</div>
						<div class="col-md-3">
							<input id='uploadreport' type='button' class="btn btn-primary" onclick="upload('uploadreport')" value='Upload Report' /> 
						</div>
						<div class="col-md-3">
							<input id='uploadstatus' type='button' class="btn btn-primary" onclick="upload('uploadstatus')" value='Upload Status' /> 
						</div>
						<div class="col-md-3">
							<input id='uploadinvoice' type='button' class="btn btn-primary" onclick="upload('uploadinvoice')" value='Upload Invoice' /> 
						</div>
					</div>
				<!-- quick email widget -->
				</div>
				<?php }else{ ?>
				<!-- /.Left col -->
				<!-- right col (We are only adding the ID to make the widgets sortable)-->
				<div class="connectedSortable">
				  <!-- /.box -->
					<div class="row">
						<div class="col-md-4">
							<input id='uploadreport' type='button' class="btn btn-primary" onclick="upload('uploadreport')" value='Upload Report' /> 
						</div>
						<div class="col-md-4">
							<input id='uploadstatus' type='button' class="btn btn-primary" onclick="upload('uploadstatus')" value='Upload Status' /> 
						</div>
						<div class="col-md-4">
							<input id='uploadinvoice' type='button' class="btn btn-primary" onclick="upload('uploadinvoice')" value='Upload Invoice' /> 
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div id="uploadform">
				<form method="post" action="button1.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-4">
							<span class="btn btn-primary btn-file" id="fileup">Browse...<input type='file' name='file'  hidden />
								</span>
						</div>		
						<div class="col-md-4">
							<input type="hidden" name="user_id"  value="<?php echo $_SESSION['id'];?>"/>
							<button class="btn btn-primary" name="submit" value="Submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
			<div id="table">
				<table class="table table-bordered">
					<thead>
						<tr>
							<h3>Order Data Listing</h3>
							<th>Sample Name</th>
							<th>Testing Pharmaeopoeia</th>
							<th>Ref Date</th>
							<th>Test Description</th>
							<th>Exp Delivery Date</th>
							<th>Status</th>
							<th>Message</th>
						</tr>
					</thead>
					<?php
						$query="SELECT * FROM order_preview";
						$result=mysqli_query($conn,$query);
						while($row=mysqli_fetch_assoc($result))
						{
						echo "<tbody>";
							echo "<tr>";
								echo "<td>".$row['sample_name']."</td>";
								echo "<td>".$row['testing_pharmaeopoeia']."</td>";
								echo "<td>".$row['ref_date']."</td>";
								echo "<td>".$row['test_description']."</td>";
								echo "<td>".$row['exp_delivery_date']."</td>";
								echo "<td>".$row['status']."</td>";
								echo "<td>".$row['message']."</td>";
							echo "</tr>";
						echo "</tbody>";
						}
					?>
				</table>
				<div class="btn-toolbar">
						<button type="save" class="btn btn-primary" style="float:right" name="save" value="save" onclick="return confirm('Are you sure you want to Save')"><a href="listsave.php?save=true">Save</a></button>
						<button type="cancel" class="btn btn-primary" style="float:right" name="cancel" value="cancel">Cancel</button>
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
<!-- /.box-body -->
</div>
<?php
	include('footer.php');
?>
</body>
</html>